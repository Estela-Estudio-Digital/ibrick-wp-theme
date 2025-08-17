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

add_action( 'wp_ajax_planok_plants_get_stats', 'planok_plants_get_stats' );
add_action( 'wp_ajax_nopriv_planok_plants_get_stats', 'planok_plants_get_stats' );
add_action( 'wp_ajax_nopriv_planok_plants_stop_sync', 'planok_plants_stop_sync' );
add_action( 'wp_ajax_planok_plants_stop_sync', 'planok_plants_stop_sync' );

function update_plants_data() {
  // Check for manual stop flag
  if ( get_option('planok_plants_sync_stop') ) {
    delete_option('planok_plants_sync_stop');
    plan_ok_plants_log('Proceso detenido manualmente');
    log_plants_summary();
    return false;
  }

  // Inicializar estadísticas
  $stats = get_option('planok_plants_sync_stats', array(
    'total_proyectos' => 0,
    'plantas_actualizadas' => 0,
    'plantas_creadas' => 0,
    'errores' => 0,
    'start_time' => time(),
    'current_project_title' => '',
    'current_project_index' => 0,
    'access_token' => '',
    'token_expires_at' => 0
  ));

  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  
  // Get access token only if we don't have one or if it's expired (reuse for performance)
  $access_token = '';
  $current_time = time();
  
  if (!empty($stats['access_token']) && $current_time < $stats['token_expires_at']) {
    // Reuse existing token
    $access_token = $stats['access_token'];
    plan_ok_plants_log('Reutilizando token de acceso existente');
  } else {
    // Get new token
    $access_token = login_api();
    
    if (!$access_token) {
      increment_plant_stat('errores');
      plan_ok_plants_log('Failed login or missing access token');
      return false;
    }
    
    // Store token in stats for reuse (assume 1 hour expiry)
    $stats['access_token'] = $access_token;
    $stats['token_expires_at'] = $current_time + 3600; // 1 hour
    update_option('planok_plants_sync_stats', $stats);
    plan_ok_plants_log('Nuevo token de acceso obtenido y almacenado');
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
  
  // Update current project stats
  $stats['current_project_title'] = $proyecto->post_title;
  $stats['current_project_index'] = $current_project;
  $stats['last_update'] = time();
  update_option('planok_plants_sync_stats', $stats);
  
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
  
  // Add token usage info to summary
  if (isset($stats['access_token']) && !empty($stats['access_token'])) {
    $resumen .= "Token de acceso: Reutilizado durante el proceso\n";
  }
  
  $resumen .= "==========================================\n";

  plan_ok_plants_log($resumen);
  
  // Clean up all sync data including cached token
  delete_option('planok_plants_sync_stats');
  plan_ok_plants_log('Token y estadísticas de sincronización limpiadas');
}

// Log de eventos fallidos
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


/**
 * AJAX endpoint to get current sync stats and recent log entries
 */
function planok_plants_get_stats() {
  // Security check for privileged users
  if (defined('DOING_AJAX') && DOING_AJAX && current_user_can('manage_options')) {
    // Privileged user, proceed
  } else {
    // For non-privileged, we could add nonce check here if needed
    wp_die('Unauthorized', 403);
  }

  $stats = get_option('planok_plants_sync_stats', array());
  
  // Check if sync process is actually running
  $is_sync_running = is_sync_process_running($stats);
  
  if (!$is_sync_running) {
    // No sync process running, return idle state
    wp_send_json_success(array(
      'sync_running' => false,
      'message' => 'No sync process currently running',
      'stats' => array(),
      'progress' => 0,
      'is_completed' => false,
      'log_entries' => array(),
      'elapsed_time' => '0m 0s',
      'processed_projects' => 0
    ));
    return;
  }
  
  // Calculate progress percentage
  $progress = 0;
  $is_completed = false;
  if (isset($stats['total_proyectos']) && $stats['total_proyectos'] > 0) {
    $processed = isset($stats['current_project_index']) ? $stats['current_project_index'] + 1 : 0;
    $progress = min(100, ($processed / $stats['total_proyectos']) * 100);
    $is_completed = $processed >= $stats['total_proyectos'];
  }
  
  // Get recent log entries (last 50 lines)
  $log_entries = get_recent_log_entries(50);
  
  // Calculate elapsed time
  $elapsed_time = isset($stats['start_time']) ? time() - $stats['start_time'] : 0;
  $elapsed_minutes = floor($elapsed_time / 60);
  $elapsed_seconds = $elapsed_time % 60;
  
  wp_send_json_success(array(
    'sync_running' => true,
    'stats' => $stats,
    'progress' => $progress,
    'is_completed' => $is_completed,
    'log_entries' => $log_entries,
    'elapsed_time' => "${elapsed_minutes}m ${elapsed_seconds}s",
    'processed_projects' => isset($stats['current_project_index']) ? $stats['current_project_index'] + 1 : 0
  ));
}

/**
 * AJAX endpoint to stop the sync process
 */
function planok_plants_stop_sync() {
  // Security check for privileged users
  if (!current_user_can('manage_options')) {
    wp_die('Unauthorized', 403);
  }
  
  update_option('planok_plants_sync_stop', true);
  plan_ok_plants_log('Señal de parada enviada por el usuario');
  
  wp_send_json_success(array(
    'message' => 'Sync stop signal sent'
  ));
}

/**
 * Helper function to determine if sync process is actually running
 */
function is_sync_process_running($stats) {
  // No stats means no sync running
  if (empty($stats) || !is_array($stats)) {
    return false;
  }
  
  // Must have essential sync data  
  if (!isset($stats['start_time'])) {
    return false;
  }
  
  $current_time = time();
  $start_time = $stats['start_time'];
  $time_since_start = $current_time - $start_time;
  
  // During startup phase (first 60 seconds), be more lenient
  if ($time_since_start < 60) {
    // Just started - consider it running if we have start_time
    return true;
  }
  
  // After startup, check if we have total_proyectos (should be set by now)
  if (!isset($stats['total_proyectos']) || $stats['total_proyectos'] == 0) {
    // No projects to process - sync is effectively complete
    return false;
  }
  
  // CRITICAL: Only consider sync completed if we've processed ALL projects
  if (isset($stats['current_project_index']) && isset($stats['total_proyectos'])) {
    $processed = $stats['current_project_index'] + 1;
    if ($processed >= $stats['total_proyectos']) {
      // All projects processed - sync is truly completed (100%)
      return false;
    }
  }
  
  // Check if sync is stale (no updates for 15 minutes = probably stuck/stopped)
  $last_update = isset($stats['last_update']) ? $stats['last_update'] : $stats['start_time'];
  $time_since_update = $current_time - $last_update;
  
  if ($time_since_update > 900) { // 15 minutes (increased for stability)
    return false; // Sync appears stale/stopped
  }
  
  return true; // Sync is actively running
}

/**
 * Helper function to get recent log entries
 */
function get_recent_log_entries($lines = 50) {
  $upload_dir = wp_upload_dir();
  $log_file = $upload_dir['basedir'] . '/planOkPlantsLog.log';
  
  if (!file_exists($log_file)) {
    return array();
  }
  
  // Read last N lines efficiently
  $file = file($log_file);
  if (!$file) {
    return array();
  }
  
  $total_lines = count($file);
  $start_line = max(0, $total_lines - $lines);
  $recent_lines = array_slice($file, $start_line);
  
  // Clean up the lines and return as array
  return array_map('trim', $recent_lines);
}

/**
 * Main UI function for plant sync admin page
 */
function trigger_plant_update() {
  // Enqueue scripts and styles for this page only
  wp_enqueue_script('jquery');
  wp_enqueue_script('plants-sync-js', get_template_directory_uri() . '/assets/js/plants-sync.js', array('jquery'), '1.0.0', true);
  wp_enqueue_style('plants-sync-css', get_template_directory_uri() . '/assets/css/plants-sync.css', array(), '1.0.0');
  
  // Localize script with AJAX data
  wp_localize_script('plants-sync-js', 'plantsSync', array(
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('plants_sync_nonce'),
    'poll_interval' => 2000 // 2 seconds
  ));
  
  // Output the UI HTML
  ?>
  <div class="wrap">
    <h1><?php _e('Plant Synchronization', 'textdomain'); ?></h1>
    
    <div id="plants-sync-app" class="plants-sync-container">
      <div class="sync-controls">
        <button id="start-sync" class="button button-primary" type="button">
          <span class="dashicons dashicons-update" style="margin-top: 3px; margin-right: 5px;"></span>
          <?php _e('Start Sync', 'textdomain'); ?>
        </button>
        <button id="stop-sync" class="button button-secondary" type="button" disabled>
          <span class="dashicons dashicons-no" style="margin-top: 3px; margin-right: 5px;"></span>
          <?php _e('Stop Sync', 'textdomain'); ?>
        </button>
      </div>
      
      <div class="progress-section">
        <h3><?php _e('Progress', 'textdomain'); ?></h3>
        <div class="progress-wrap">
          <div id="progress-bar" class="progress-bar"></div>
          <div id="progress-text" class="progress-text">0%</div>
        </div>
      </div>
      
      <div class="stats-section">
        <h3><?php _e('Statistics', 'textdomain'); ?></h3>
        <div id="stats" class="stats-grid">
          <div class="stat-item">
            <span class="stat-label"><?php _e('Current Project:', 'textdomain'); ?></span>
            <span id="current-project" class="stat-value">-</span>
          </div>
          <div class="stat-item">
            <span class="stat-label"><?php _e('Processed:', 'textdomain'); ?></span>
            <span id="projects-processed" class="stat-value">0 / 0</span>
          </div>
          <div class="stat-item">
            <span class="stat-label"><?php _e('Plants Updated:', 'textdomain'); ?></span>
            <span id="plants-updated" class="stat-value">0</span>
          </div>
          <div class="stat-item">
            <span class="stat-label"><?php _e('Plants Created:', 'textdomain'); ?></span>
            <span id="plants-created" class="stat-value">0</span>
          </div>
          <div class="stat-item">
            <span class="stat-label"><?php _e('Errors:', 'textdomain'); ?></span>
            <span id="errors-count" class="stat-value">0</span>
          </div>
          <div class="stat-item">
            <span class="stat-label"><?php _e('Elapsed Time:', 'textdomain'); ?></span>
            <span id="elapsed-time" class="stat-value">0m 0s</span>
          </div>
        </div>
      </div>
      
      <div class="log-section">
        <h3><?php _e('Sync Log', 'textdomain'); ?></h3>
        <pre id="sync-log" class="sync-log"></pre>
        <button id="clear-log" class="button button-small" type="button"><?php _e('Clear Log', 'textdomain'); ?></button>
      </div>
    </div>
  </div>
  <?php
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
