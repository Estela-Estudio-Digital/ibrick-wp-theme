<?php

function upload_base64_image($base64_string) {
  // Remove data:image/format;base64, prefix
  $data = base64_decode(str_replace('data:image/', '', $base64_string));
  $filename = 'image_' . time() . '.jpg'; // Adjust file extension based on image type

  // Get upload directory details
  $upload_dir = wp_upload_dir();
  $upload_path = $upload_dir['path'] . '/' . $filename;

  // Write decoded data to the upload directory
  file_put_contents($upload_path, $data);

  // Get image mime type
  $filetype = wp_check_filetype(basename($filename), null);

  // Create attachment data
  $attachment = array(
    'guid' => $upload_dir['url'] . '/' . $filename,
    'post_mime_type' => $filetype['type'],
    'post_title' => preg_replace('/\.[^.]+$/', '', $filename), // Remove extension from title
  );

  // Insert attachment and generate metadata
  $attach_id = wp_insert_attachment($attachment, $upload_path);
  require_once(ABSPATH . 'wp-admin/includes/image.php');
  $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
  wp_update_attachment_metadata($attach_id, $attach_data);

  // Return attachment ID for further use
  return $attach_id;
}

function update_images_data() {
  // 1-. Setup de API.
  $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
  $access_token = login_api();

  if (!$access_token) {
    // Handle failed login or missing access token
    plan_ok_img_log( 'Failed login or missing access token: ' . $access_token );
    return;
  }
  // 2-. Seleccionar Proyectos con ID de plan Ok.
  $args = array(
    'post_type'         => 'plantas_api',
    'posts_per_page'    => -1,
    'post_status'       => 'publish',
  );

  $proyectos = get_posts( $args );
  // plan_ok_img_log( 'proyectos: ' . json_encode( $proyectos ) );

  // 3-. Recorrer los proyectos.
  foreach ( $proyectos as $post ) {
    $currentImage = get_field( 'imagen_principal_url', $post->ID );
    $ficha =  get_field( 'ficha_url', $post->ID );

    if ($currentImage !== null) {
      $imageResponse  = wp_remote_get( str_replace('http', 'https', $currentImage), array(
          'headers' => array(
              'accept' => 'application/json',
              'Content-Type' => 'application/json',
              "Authorization" => $access_token
          )
      ))['body'];
      $id = upload_base64_image(base64_encode($imageResponse));
      set_post_thumbnail( $post->ID, $id );
    }

    if ($ficha !== null) {
        $fichaResponse = wp_remote_get( $ficha, array(
            'headers' => array(
                'accept' => 'application/json',
                'Content-Type' => 'application/json',
                "Authorization" => $access_token
            )
        ))['body'];
        $fichaId = upload_base64_image(base64_encode($imageResponse));
        update_field( 'ficha', $fichaId, $post->ID );
    }
  }

  return json_encode( $proyectos, JSON_PRETTY_PRINT );
}

// Agregar la acción al cron
// add_action( 'wp_cron_daily', 'update_images_data' );

// // Programar el cron
// if ( ! wp_next_scheduled( 'wp_cron_daily' ) ) {
//   wp_schedule_event( strtotime( '4:00am' ), 'daily', 'wp_cron_daily' );
// do it every year
//   // wp_schedule_event( strtotime( '4:00am' ), 'yearly', 'wp_cron_daily' );
//   // wp_schedule_event(time(), 'daily', 'wp_cron_daily');
// }

// Log de eventos fallidos
if ( ! function_exists( 'plan_ok_img_log' ) ) {
  function plan_ok_img_log( $entry, $mode = 'a', $file = 'plugin' ) { 
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

function trigger_images_update() {
  $success = update_images_data(); // Replace with your actual cron function name
  esc_html_e( 'Update Test - '. time() . ' - ' . $success, 'textdomain' );	
}

add_action('admin_menu', 'register_images_update_link');

function register_images_update_link() {
  add_menu_page(
		__( 'Custom Menu Title', 'textdomain' ), // page_title
		'Update images', // menu_title
		'manage_options', // capability
		'customimagepage', // menu_slug
		'trigger_images_update', // callback
    'dashicons-format-gallery', // icon
		6 // position
  );
}

?>