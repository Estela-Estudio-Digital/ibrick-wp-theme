<?php
function login_api() {
  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $planOk_options = get_option( 'wporg_options' );
  $API_KEY = $planOk_options['api-key'];
  $username = (int) $planOk_options['user-id'];
  $password = $planOk_options['password'];

  $loginApiUrl = $BASE_URL . '/login?apikey=' . $API_KEY;
  $loginBody = [
    "username" => 97077422,
    "password" => $password,
  ];
  $loginBody = wp_json_encode( $loginBody );
  $loginResponse = wp_remote_post( $loginApiUrl,
      [
          'body'      => $loginBody,
          'method'    => 'POST',
          'headers'   => [
              'content-type' => 'application/json',
              'accept' => 'application/json',
          ],
      ]
  );

  $data = wp_remote_retrieve_body($loginResponse);
  $decoded_data = json_decode($data, true);

  if (empty($decoded_data['token'])) {
    return false;
  }

  return "Bearer " . $decoded_data['token'];
}
if ( ! wp_next_scheduled( 'update_plants_list' ) ) {
  wp_schedule_event( time(), 'daily', 'update_plants_list' );
}
add_action( 'update_plants_list', 'update_plants_data' );
add_action( 'wp_ajax_nopriv_update_plants_data', 'update_plants_data' );
add_action( 'wp_ajax_update_plants_data', 'update_plants_data' );

function update_plants_data() {
  // Inicializar estadísticas
  $stats = get_option('planok_plants_sync_stats', array(
    'total_proyectos' => 0,
    'plantas_actualizadas' => 0,
    'plantas_creadas' => 0,
    'errores' => 0,
    'start_time' => time()
  ));

  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $access_token = login_api();

  if (!$access_token) {
    increment_plant_stat('errores');
    plan_ok_plants_log('Failed login or missing access token');
    return false;
  }

  $args = array(
    'post_type'      => 'proyectos',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'meta_query'     => array(
      array(
        'key'     => 'id_planok',
        'compare' => 'EXISTS'
      )
    )
  );

  $proyectos = get_posts($args);
  $current_project = !empty($_POST['current_project']) ? (int)$_POST['current_project'] : 0;

  // Primera ejecución
  if ($current_project === 0) {
    $stats['total_proyectos'] = count($proyectos);
    update_option('planok_plants_sync_stats', $stats);
  }

  if (empty($proyectos)) {
    plan_ok_plants_log('No hay proyectos para procesar');
    log_plants_summary();
    return false;
  }

  if (count($proyectos) <= $current_project) {
    plan_ok_plants_log('Proceso completado - No hay más proyectos para procesar');
    log_plants_summary();
    return false;
  }

  $proyecto = $proyectos[$current_project];
  $plan_ok_id = get_field('id_planok', $proyecto->ID);
  
  // Validar ID de PlanOk
  if (!$plan_ok_id) {
    increment_plant_stat('errores');
    plan_ok_plants_log("ID PlanOk no encontrado para proyecto: {$proyecto->post_title}");
    process_next_project($current_project);
    return false;
  }

  // Obtener modelos de la API
  $response = wp_remote_get($BASE_URL . '/proyectos/' . $plan_ok_id . '/modelos', array(
    'headers' => array(
      'accept' => 'application/json',
      'Content-Type' => 'application/json',
      'Authorization' => $access_token
    )
  ));

  if (is_wp_error($response)) {
    increment_plant_stat('errores');
    plan_ok_plants_log('Error en la llamada API: ' . $response->get_error_message());
    process_next_project($current_project);
    return false;
  }

  $results = json_decode(wp_remote_retrieve_body($response), true);

  if (!is_array($results) || empty($results)) {
    increment_plant_stat('errores');
    plan_ok_plants_log("No hay modelos para el proyecto: {$proyecto->post_title}");
    process_next_project($current_project);
    return false;
  }

  // Procesar modelos
  $all_plants = prepare_plants_data($results, $proyecto);
  
  foreach ($all_plants as $plant) {
    $plant_id = $plant['nombre'];
    $existing_plant = get_page_by_title($plant_id, OBJECT, 'plantas_api');

    if ($existing_plant && $plant_id === $existing_plant->post_title) {
      update_existing_plant($existing_plant, $plant);
      increment_plant_stat('plantas_actualizadas');
    } else {
      create_new_plant($plant);
      increment_plant_stat('plantas_creadas');
    }
  }

  process_next_project($current_project);
}

function prepare_plants_data($results, $proyecto) {
  $all_plants = array();
  foreach ($results as $model) {
    $all_plants[] = [
      'id' => $model['id'],
      'nombre' => $proyecto->post_title . ' - ' . $model['nombre'],
      'dormitorios' => $model['dormitorios'],
      'banos' => $model['banos'],
      'imagenes' => $model['imagenes'],
      'proyecto' => $proyecto->post_title,
      'project_id' => get_field('id_planok', $proyecto->ID),
      'project_id_wp' => $proyecto->ID,
      'tipo' => $model['nombre'] === 'ESTUDIO' ? 'estudio' : $model['dormitorios'] . 'dorm',
    ];
  }
  return $all_plants;
}

function update_existing_plant($existing_plant, $plant) {
  plan_ok_plants_log('Actualizando planta: ' . $plant['nombre']);
  
  // Actualizar post
  wp_update_post(array(
    'ID' => $existing_plant->ID,
    'post_title' => $plant['nombre'],
    'post_excerpt' => "{$plant['dormitorios']} dormitorios, {$plant['banos']} baños, " . count($plant['imagenes']) . " imágenes.",
  ));

  // Actualizar campos
  update_plant_fields($existing_plant->ID, $plant);
}

function create_new_plant($plant) {
  plan_ok_plants_log('Creando nueva planta: ' . $plant['nombre']);
  
  $post_id = wp_insert_post(array(
    'post_type' => 'plantas_api',
    'post_title' => $plant['nombre'],
    'post_status' => 'publish',
    'post_excerpt' => "{$plant['dormitorios']} dormitorios, {$plant['banos']} baños, " . count($plant['imagenes']) . " imágenes.",
  ));

  if ($post_id) {
    update_plant_fields($post_id, $plant);
  }
}

function update_plant_fields($post_id, $plant) {
  $value = get_field('vincular_proyecto', $post_id, false) ?: array();
  $value[] = $plant['project_id_wp'];
  $value = array_unique($value); // Evitar duplicados

  $fields = array(
    'dormitorios_para_filtrar' => $plant['tipo'],
    'cantidad_de_banos' => $plant['banos'],
    'id_proyecto' => $plant['project_id'],
    'id_planta' => $plant['id'],
    'imagen_principal_url' => $plant['imagenes'][0] ?? '',
    'ficha_url' => $plant['imagenes'][1] ?? '',
    'vincular_proyecto' => $value,
  );

  foreach ($fields as $key => $value) {
    update_field($key, $value, $post_id);
  }
}

function process_next_project($current_project) {
  $next_project = $current_project + 1;
  wp_remote_post(admin_url('admin-ajax.php?action=update_plants_data'), [
    'blocking' => false,
    'sslverify' => false,
    'body' => [
      'current_project' => $next_project
    ]
  ]);
}

function increment_plant_stat($key) {
  $stats = get_option('planok_plants_sync_stats');
  $stats[$key]++;
  update_option('planok_plants_sync_stats', $stats);
}

function log_plants_summary() {
  $stats = get_option('planok_plants_sync_stats');
  $tiempo_total = time() - $stats['start_time'];
  $minutos = floor($tiempo_total / 60);
  $segundos = $tiempo_total % 60;

  $resumen = "\n=== RESUMEN DE SINCRONIZACIÓN DE PLANTAS ===\n";
  $resumen .= "Total de proyectos procesados: {$stats['total_proyectos']}\n";
  $resumen .= "Plantas actualizadas: {$stats['plantas_actualizadas']}\n";
  $resumen .= "Plantas nuevas creadas: {$stats['plantas_creadas']}\n";
  $resumen .= "Errores encontrados: {$stats['errores']}\n";
  $resumen .= "Tiempo total de proceso: {$minutos}m {$segundos}s\n";
  $resumen .= "==========================================\n";

  plan_ok_plants_log($resumen);
  delete_option('planok_plants_sync_stats');
}

// Log de eventos fallidos
if ( ! function_exists( 'plan_ok_plants_log' ) ) {
  function plan_ok_plants_log( $entry, $mode = 'a', $file = 'planOkPlantsLog' ) { 
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

function trigger_plant_update() {
  $success = update_plants_data(); // Replace with your actual cron function name
  esc_html_e( 'Update Test - '. date("h:i:sa") . ' - ' . $success, 'textdomain' );	
}

add_action('admin_menu', 'register_plant_update_link');

function register_plant_update_link() {
  add_submenu_page(
    'edit.php?post_type=proyectos',
		__( 'Custom Menu Title', 'textdomain' ), // page_title
		'Update Plants', // menu_title
		'manage_options', // capability
		'custompage', // menu_slug
		'trigger_plant_update', // callback
    'dashicons-welcome-widgets-menus', // icon
		6 // position
  );
}

?>