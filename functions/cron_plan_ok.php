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


function update_plants_data() {
  // 1-. Setup de API.
  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $access_token = login_api();

  if (!$access_token) {
    // Handle failed login or missing access token
    plan_ok_log( 'Failed login or missing access token: ' . $access_token );
    return;
  }
  // 2-. Seleccionar Proyectos con ID de plan Ok.
  $args = array(
    'post_type'         => 'proyectos',
    'posts_per_page'    => -1,
    'post_status'       => 'publish',
    'meta_query' => array(
      array(
          'key' => 'id_planok',
          'compare' => 'EXISTS'
      )
  ));

  $query = get_posts( $args );
  // plan_ok_log( 'query: ' . json_encode( $query ) );

  $all_plants = array();
  // 3-. Recorrer los proyectos.
  foreach ( $query as $post ) {
    $plan_ok_id = get_field( 'id_planok', $post->ID );
    $project = $post->post_title;
    
    // plan_ok_log( 'posts: ' . $plan_ok_id . '' );

    // 4-. Si tiene Id de planOk llamar al API modelos.
    $body = wp_remote_get( $BASE_URL . '/proyectos/' . $plan_ok_id .'/modelos', array(
      'headers' => array(
          'accept' => 'application/json',
          'Content-Type' => 'application/json',
          "Authorization" => $access_token
      )
    ))['body'];

    foreach (json_decode($body, true) as $model) {
      $all_plants[] = [
        'id' => $model['id'],
        'nombre' => $project . ' - ' . $model['nombre'],
        'dormitorios' => $model['dormitorios'],
        'banos' => $model['banos'],
        'imagenes' => $model['imagenes'],
      ];
    }
  }

  // plan_ok_log( 'Plantas: ' . json_encode( $all_plants ) );
  // 5-. Crear o actualizar planta.

  foreach ($all_plants as $plant) {
    $plant_id = $plant['nombre'];

    // $existing_plant = get_post($plant_id, 'plantas_api');
    $existing_plant = get_page_by_title( $plant_id, OBJECT, 'plantas_api' );

    
    if ($existing_plant) {
      wp_update_post($existing_plant->ID, array(
        'post_title' => $plant_id,
        'meta_input' => [
          'dormitorios' => $plant['dormitorios'],
          'banos' => $plant['banos'],
          'imagenes' => $plant['imagenes'],
          ]
        ));
      } else {
      plan_ok_log( 'Nombre planta: ' . json_encode($existing_plant) );
      wp_insert_post(array(
        'post_type' => 'plantas_api',
        'post_title' => $plant_id,
        'post_status' => 'publish',
      ));
    }

  }
  return json_encode( $all_plants, JSON_PRETTY_PRINT );
}

// Agregar la acción al cron
add_action( 'wp_cron_daily', 'update_plants_data' );

// Programar el cron
if ( ! wp_next_scheduled( 'wp_cron_daily' ) ) {
  wp_schedule_event( strtotime( '2:27pm' ), 'daily', 'wp_cron_daily' );
  // wp_schedule_event(time(), 'daily', 'wp_cron_daily');
}

// Log de eventos fallidos
if ( ! function_exists( 'plan_ok_log' ) ) {
  function plan_ok_log( $entry, $mode = 'a', $file = 'plugin' ) { 
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
  esc_html_e( 'Update Test - '. time() . ' - ' . $success, 'textdomain' );	
}

add_action('admin_menu', 'register_plant_update_link');

function register_plant_update_link() {
  add_menu_page(
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