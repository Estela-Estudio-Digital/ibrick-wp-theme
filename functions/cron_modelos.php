<?php
if ( ! wp_next_scheduled( 'update_model_list' ) ) {
  wp_schedule_event( time(), 'daily', 'update_model_list' );
}
add_action( 'update_model_list', 'update_models_data' );
add_action( 'wp_ajax_nopriv_update_models_data', 'update_models_data' );
add_action( 'wp_ajax_update_models_data', 'update_models_data' );

function update_models_data() {
  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $access_token = login_api();

  if (!$access_token) {
    plan_ok_models_log( 'Failed login or missing access token: ' . $access_token );
    return;
  }
  $args = array(
    'post_type'         => 'plantas_api',
    'posts_per_page'    => -1,
    'post_status'       => 'publish',
  );

  $planta = get_posts( $args );
  $current_plant = ( ! empty( $_POST['current_plant'] ) ) ? (float)$_POST['current_plant'] : 0;
  plan_ok_models_log( 'current_plant: ' . $current_plant );

  if ( count($planta) == $current_plant ) {
    plan_ok_models_log( 'No hay planta' );
    return false;
  }

  $plant_id  = get_field( 'id_planta', $planta[$current_plant]->ID);

  $body = wp_remote_get( $BASE_URL . '/modelos/' . $plant_id . '/productos-principales', array(
    'headers' => array(
        'accept' => 'application/json',
        'Content-Type' => 'application/json',
        "Authorization" => $access_token
    )
  ))['body'];

  $results = json_decode($body, true) ;

  if( !is_array( $results ) || empty( $results ) ){
    plan_ok_models_log( 'if: ' . json_encode( $results) . ' - ' . json_encode( $current_plant ) . ' - ' . json_encode( count($planta) ) );
    return false;
  }

  foreach ($results as $item) {
    if ($item['disponibleWeb'] && $item['estado'] === 'Disponible') {
        $firstPlanta = $item;
        break; // Break out of the loop once the first item is found
    }
  }
  plan_ok_models_log( 'First: ' . json_encode($firstPlanta) );

  update_field( 'superficie_total', number_format($firstPlanta['superficies']['total'], 0, ',', '.'),$planta[$current_plant]->ID );
  update_field( 'superficie_construida', number_format($firstPlanta['superficies']['util'], 0, ',', '.'),$planta[$current_plant]->ID );
  update_field( 'superficie_terraza', number_format($firstPlanta['superficies']['terraza'], 0, ',', '.'),$planta[$current_plant]->ID );
  update_field( 'unidades', $firstPlanta['nombre'],$planta[$current_plant]->ID );
  update_field( 'valor', $firstPlanta['precio'],$planta[$current_plant]->ID );
  update_field( 'corresponde', $firstPlanta['id'],$planta[$current_plant]->ID );

  $current_plant = $current_plant + 1;
  wp_remote_post( admin_url('admin-ajax.php?action=update_models_data'), [
    'blocking' => false,
    'sslverify' => false, // we are sending this to ourselves, so trust it.
    'body' => [
      'current_plant' => $current_plant
    ]
  ] );
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