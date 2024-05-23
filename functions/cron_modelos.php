<?php

function update_models_data() {
  // 1-. Setup de API.
  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $access_token = login_api();

  if (!$access_token) {
    // Handle failed login or missing access token
    plan_ok_models_log( 'Failed login or missing access token: ' . $access_token );
    return;
  }
  // 2-. Seleccionar Proyectos con ID de plan Ok.
  $args = array(
    'post_type'         => 'plantas_api',
    'posts_per_page'    => -1,
    'post_status'       => 'publish',
  );

  $proyectos = get_posts( $args );
  // plan_ok_models_log( 'proyectos: ' . json_encode( $proyectos ) );

  // 3-. Recorrer los proyectos.
  foreach ( $proyectos as $post ) {
    $plant_id  = get_field( 'id_planta', $post->ID );
    
    // plan_ok_models_log( 'posts: ' . $plant_id . '' );
    // 4-. Si tiene Id de planOk llamar al API modelos.
    $body = wp_remote_get( $BASE_URL . '/modelos/' . $plant_id . '/productos-principales', array(
      'headers' => array(
          'accept' => 'application/json',
          'Content-Type' => 'application/json',
          "Authorization" => $access_token
      )
    ))['body'];

    $firstPlanta = null;
    foreach (json_decode($body, true) as $item) {
        if ($item['disponibleWeb'] && $item['estado'] === 'Disponible') {
            $firstPlanta = $item;
            break; // Break out of the loop once the first item is found
        }
    }

    update_field( 'superficie_total', number_format($firstPlanta['superficies']['total'], 0, ',', '.'), $post->ID );
    update_field( 'superficie_construida', number_format($firstPlanta['superficies']['util'], 0, ',', '.'), $post->ID );
    update_field( 'superficie_terraza', number_format($firstPlanta['superficies']['terraza'], 0, ',', '.'), $post->ID );
    update_field( 'unidades', $firstPlanta['nombre'], $post->ID );
    update_field( 'valor', $firstPlanta['precio'], $post->ID );
  }

  return json_encode( $firstPlanta, JSON_PRETTY_PRINT );
}

// Agregar la acción al cron
add_action( 'wp_cron_daily', 'update_models_data' );

// Programar el cron
if ( ! wp_next_scheduled( 'wp_cron_daily' ) ) {
  wp_schedule_event( strtotime( '3:00am' ), 'daily', 'wp_cron_daily' );
  // wp_schedule_event(time(), 'daily', 'wp_cron_daily');
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

// add_action('admin_menu', 'register_model_update_link');

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