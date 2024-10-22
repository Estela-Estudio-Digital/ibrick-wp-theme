<?php
if ( ! wp_next_scheduled( 'update_model_list' ) ) {
  wp_schedule_event( time(), 'daily', 'update_model_list' );
}
add_action( 'update_model_list', 'update_models_data' );
add_action( 'wp_ajax_nopriv_update_models_data', 'update_models_data' );
add_action( 'wp_ajax_update_models_data', 'update_models_data' );

function update_models_data() {
  // Inicializar o recuperar contadores de la sesión
  $stats = get_option('planok_sync_stats', array(
    'total_plantas' => 0,
    'actualizadas' => 0,
    'drafts' => 0,
    'errores' => 0,
    'start_time' => time()
  ));

  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $access_token = login_api();

  if (!$access_token) {
    increment_stat('errores');
    plan_ok_models_log('Failed login or missing access token');
    return false;
  }

  $args = array(
    'post_type'      => 'plantas_api',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
  );

  $planta = get_posts($args);
  $current_plant = !empty($_POST['current_plant']) ? (int)$_POST['current_plant'] : 0;

  // Primera ejecución
  if ($current_plant === 0) {
    $stats['total_plantas'] = count($planta);
    update_option('planok_sync_stats', $stats);
  }

  if (empty($planta)) {
    increment_stat('errores');
    plan_ok_models_log('No hay plantas publicadas');
    log_final_summary();
    return false;
  }

  if (count($planta) <= $current_plant) {
    plan_ok_models_log('Proceso completado - No hay más plantas para procesar - Total:' . count($planta) . ' - Procesadas:' . $current_plant);
    log_final_summary();
    return false;
  }

  $plant_id = get_field('id_planta', $planta[$current_plant]->ID);
  if (!$plant_id) {
    increment_stat('errores');
    plan_ok_models_log('ID de planta no encontrado para: ' . $planta[$current_plant]->ID);
    process_next_plant($current_plant);
    return false;
  }

  $response = wp_remote_get($BASE_URL . '/modelos/' . $plant_id . '/productos-principales', array(
    'headers' => array(
      'accept' => 'application/json',
      'Content-Type' => 'application/json',
      'Authorization' => $access_token
    )
  ));

  if (is_wp_error($response)) {
    increment_stat('errores');
    plan_ok_models_log('Error en la llamada API: ' . $response->get_error_message());
    process_next_plant($current_plant);
    return false;
  }

  $results = json_decode(wp_remote_retrieve_body($response), true);

  if (isset($results['message'])) {
    increment_stat('drafts');
    plan_ok_models_log('Modelo no encontrado: ' . $results['message']);
    update_plant_status($planta[$current_plant]->ID, 'draft');
    process_next_plant($current_plant);
    return false;
  }

  $firstPlanta = find_first_available_plant($results);
  
  if (!empty($firstPlanta)) {
    update_plant_fields_from_model($firstPlanta, $planta[$current_plant]->ID);
    increment_stat('actualizadas');
  } else {
    increment_stat('errores');
    plan_ok_models_log('No hay planta disponible para: ' . $plant_id);
  }

  process_next_plant($current_plant);
}

function increment_stat($key) {
  $stats = get_option('planok_sync_stats');
  $stats[$key]++;
  update_option('planok_sync_stats', $stats);
}

function log_final_summary() {
  $stats = get_option('planok_sync_stats');
  $tiempo_total = time() - $stats['start_time'];
  $minutos = floor($tiempo_total / 60);
  $segundos = $tiempo_total % 60;

  $resumen = "\n=== RESUMEN DE SINCRONIZACIÓN ===\n";
  $resumen .= "Total de plantas procesadas: {$stats['total_plantas']}\n";
  $resumen .= "Plantas actualizadas exitosamente: {$stats['actualizadas']}\n";
  $resumen .= "Plantas pasadas a draft: {$stats['drafts']}\n";
  $resumen .= "Errores encontrados: {$stats['errores']}\n";
  $resumen .= "Tiempo total de proceso: {$minutos}m {$segundos}s\n";
  $resumen .= "================================\n";

  plan_ok_models_log($resumen);

  // Limpiar estadísticas para la próxima sincronización
  delete_option('planok_sync_stats');
}

// Resto de funciones auxiliares se mantienen igual...
function update_plant_status($post_id, $status) {
  wp_update_post(array(
    'ID' => $post_id,
    'post_status' => $status
  ));
  plan_ok_models_log('Post actualizado a ' . $status . ': ' . $post_id);
}

function find_first_available_plant($results) {
  if (!is_array($results)) {
    plan_ok_models_log('Resultados no válidos');
    return null;
  }

  foreach ($results as $item) {
    if ($item['disponibleWeb'] && $item['estado'] === 'Disponible') {
      return $item;
    }
  }
  return null;
}

function update_plant_fields_from_model($plant_data, $post_id) {
  $fields = array(
    'superficie_total' => number_format($plant_data['superficies']['total'], 0, ',', '.'),
    'superficie_construida' => number_format($plant_data['superficies']['util'], 0, ',', '.'),
    'superficie_terraza' => number_format($plant_data['superficies']['terraza'], 0, ',', '.'),
    'unidades' => $plant_data['nombre'],
    'valor' => $plant_data['precio'],
    'corresponde' => $plant_data['id'],
    'nombre_comercial' => $plant_data['programa'] . " - " . $plant_data['nombreModelo']
  );

  foreach ($fields as $key => $value) {
    update_field($key, $value, $post_id);
  }
  
  plan_ok_models_log('Campos actualizados para post: ' . $post_id);
}

function process_next_plant($current_plant) {
  $next_plant = $current_plant + 1;
  wp_remote_post(admin_url('admin-ajax.php?action=update_models_data'), [
    'blocking' => false,
    'sslverify' => false,
    'body' => [
      'current_plant' => $next_plant
    ]
  ]);
}

// Log de eventos fallidos
if ( ! function_exists( 'plan_ok_models_log' ) ) {
  function plan_ok_models_log( $entry, $mode = 'a', $file = 'modelosLog' ) { 
    // Get WordPress uploads directory.
    $upload_dir = wp_upload_dir();
    $upload_dir = $upload_dir['basedir'];
    // If the entry is array, json_encode.
    if ( is_array( $entry ) ) { 
      $entry = json_encode( $entry ); 
    } 
    // Write the log file.
    $file  = $upload_dir . '/' . $file . '.log';
    $file  = fopen( $file, $mode );
    $bytes = fwrite( $file, current_time( 'mysql' ) . "::" . $entry . "\n" ); 
    fclose( $file ); 
    return $bytes;
  }
}

function trigger_model_update() {
  $success = update_models_data(); // Replace with your actual cron function name
  esc_html_e( 'Update Test - '. time() . ' - ' . $success, 'textdomain' );	
}

 add_action('admin_menu', 'register_model_update_link');

function register_model_update_link() {
  add_menu_page(
		__( 'Custom Menu Title', 'textdomain' ), // page_title
		'Update Models', // menu_title
		'manage_options', // capability
		'custommodelpage', // menu_slug
		'trigger_model_update', // callback
    'dashicons-admin-settings', // icon
		6 // position
  );
}

?>