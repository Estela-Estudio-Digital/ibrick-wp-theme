<?php
/**
 * Clase para tracking de estadísticas del proceso de imágenes
 */
class ImageProcessingStats {
  private static $instance = null;
  private $stats = [
      'created' => 0,
      'updated' => 0,
      'skipped' => 0,
      'errors' => [],
      'start_time' => null,
  ];
  
  private function __construct() {
      $this->stats['start_time'] = time();
  }
  
  public static function getInstance() {
      if (self::$instance === null) {
          self::$instance = new self();
      }
      return self::$instance;
  }
  
  public function incrementCreated() {
      $this->stats['created']++;
  }
  
  public function incrementUpdated() {
      $this->stats['updated']++;
  }
  
  public function incrementSkipped() {
      $this->stats['skipped']++;
  }
  
  public function addError($error) {
      $this->stats['errors'][] = $error;
  }
  
  public function getStats() {
      return $this->stats;
  }
  
  public function generateSummary() {
      $duration = time() - $this->stats['start_time'];
      $total_processed = $this->stats['created'] + $this->stats['updated'] + $this->stats['skipped'];
      
      return sprintf(
          "Proceso completado en %d segundos\n" .
          "Total de imágenes procesadas: %d\n" .
          "- Imágenes nuevas creadas: %d\n" .
          "- Imágenes actualizadas: %d\n" .
          "- Imágenes omitidas (ya existentes): %d\n" .
          "Errores encontrados: %d\n%s",
          $duration,
          $total_processed,
          $this->stats['created'],
          $this->stats['updated'],
          $this->stats['skipped'],
          count($this->stats['errors']),
          $this->formatErrors()
      );
  }
  
  private function formatErrors() {
      if (empty($this->stats['errors'])) {
          return "Sin errores.";
      }
      
      return "Detalle de errores:\n- " . implode("\n- ", $this->stats['errors']);
  }
}

/**
* Verifica si una imagen ya existe en la biblioteca de medios basándose en su URL o contenido
*/
function check_existing_image($image_url, $image_content = null) {
  global $wpdb;
  $stats = ImageProcessingStats::getInstance();
  
  // Primero buscar por URL
  $attachment_id = $wpdb->get_var($wpdb->prepare(
      "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_source_url' AND meta_value = %s LIMIT 1",
      $image_url
  ));
  
  if ($attachment_id) {
      $stats->incrementSkipped();
      return $attachment_id;
  }
  
  // Si tenemos el contenido, verificar por hash MD5
  if ($image_content) {
      $content_hash = md5($image_content);
      $attachment_id = $wpdb->get_var($wpdb->prepare(
          "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_content_hash' AND meta_value = %s LIMIT 1",
          $content_hash
      ));
      
      if ($attachment_id) {
          $stats->incrementSkipped();
          return $attachment_id;
      }
  }
  
  return false;
}

/**
* Sube una imagen en base64 a la biblioteca de medios de WordPress
*/
function upload_base64_image($base64_string, $original_url = '') {
  $stats = ImageProcessingStats::getInstance();
  
  try {
      // Decodificar la imagen
      $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64_string));
      
      // Verificar si la imagen ya existe
      $existing_image = check_existing_image($original_url, $data);
      if ($existing_image) {
          return $existing_image;
      }
      
      // Generar nombre único para el archivo
      $filename = 'image_' . uniqid() . '.jpg';
      
      // Obtener directorio de uploads
      $upload_dir = wp_upload_dir();
      $upload_path = $upload_dir['path'] . '/' . $filename;
      
      // Guardar archivo
      if (!file_put_contents($upload_path, $data)) {
          throw new Exception("No se pudo guardar la imagen en: " . $upload_path);
      }
      
      // Verificar tipo de archivo
      $filetype = wp_check_filetype(basename($filename), null);
      
      // Preparar datos del attachment
      $attachment = array(
          'guid'           => $upload_dir['url'] . '/' . $filename,
          'post_mime_type' => $filetype['type'],
          'post_title'     => preg_replace('/\.[^.]+$/', '', $filename),
          'post_status'    => 'inherit'
      );
      
      // Insertar attachment
      $attach_id = wp_insert_attachment($attachment, $upload_path);
      
      if (!$attach_id) {
          throw new Exception("No se pudo crear el attachment para: " . $filename);
      }
      
      // Generar metadata
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata($attach_id, $upload_path);
      wp_update_attachment_metadata($attach_id, $attach_data);
      
      // Guardar metadatos adicionales
      update_post_meta($attach_id, '_source_url', $original_url);
      update_post_meta($attach_id, '_content_hash', md5($data));
      
      $stats->incrementCreated();
      return $attach_id;
      
  } catch (Exception $e) {
      $stats->addError($e->getMessage());
      plan_ok_img_log('Error en upload_base64_image: ' . $e->getMessage());
      return false;
  }
}

/**
* Procesa las imágenes de una planta específica
*/
function process_plant_images($planta, $access_token) {
  $stats = ImageProcessingStats::getInstance();
  
  $ficha = get_field('imagen_principal_url', $planta->ID);
  $currentImage = get_field('ficha_url', $planta->ID);
  
  $headers = array(
      'accept' => 'application/json',
      'Content-Type' => 'application/json',
      'Authorization' => $access_token
  );
  
  // Procesar imagen actual
  if ($currentImage) {
      try {
          $response = wp_remote_get(
              str_replace('http', 'https', $currentImage),
              array('headers' => $headers)
          );
          
          if (is_wp_error($response)) {
              throw new Exception('Error al obtener imagen actual: ' . $response->get_error_message());
          }
          
          $imageResponse = wp_remote_retrieve_body($response);
          $id = upload_base64_image(base64_encode($imageResponse), $currentImage);
          
          if ($id) {
              set_post_thumbnail($planta->ID, $id);
          }
          
      } catch (Exception $e) {
          $stats->addError("Error en imagen actual de planta {$planta->ID}: " . $e->getMessage());
      }
  }
  
  // Procesar ficha
  if ($ficha) {
      try {
          $response = wp_remote_get(
              str_replace('http', 'https', $ficha),
              array('headers' => $headers)
          );
          
          if (is_wp_error($response)) {
              throw new Exception('Error al obtener ficha: ' . $response->get_error_message());
          }
          
          $fichaResponse = wp_remote_retrieve_body($response);
          $fichaId = upload_base64_image(base64_encode($fichaResponse), $ficha);
          
          if ($fichaId) {
              update_field('ficha', $fichaId, $planta->ID);
          }
          
      } catch (Exception $e) {
          $stats->addError("Error en ficha de planta {$planta->ID}: " . $e->getMessage());
      }
  }
}

/**
* Actualiza las imágenes de los posts de tipo plantas_api
*/
function update_images_data() {
  $stats = ImageProcessingStats::getInstance();
  
  try {
      // Setup de API
      $BASE_URL = 'https://api-gci-rest.integracionplanok.io/api';
      $access_token = login_api();
      
      if (!$access_token) {
          throw new Exception('Failed login or missing access token');
      }
      
      $current = (!empty($_POST['current'])) ? (int)$_POST['current'] : 0;
      
      // Obtener plantas
      $args = array(
          'post_type' => 'plantas_api',
          'posts_per_page' => 1,
          'post_status' => 'publish',
          'offset' => $current
      );
      
      $planta = get_posts($args);
      
      if (empty($planta)) {
          // Proceso completado, generar log final
          $summary = $stats->generateSummary();
          plan_ok_img_log($summary);
          wp_send_json_success('Process completed');
          return;
      }
      
      // Procesar planta actual
      process_plant_images($planta[0], $access_token);
      
      // Programar siguiente iteración
      $next = $current + 1;
      wp_remote_post(
          admin_url('admin-ajax.php?action=update_images_data'),
          [
              'blocking' => false,
              'sslverify' => false,
              'body' => ['current' => $next]
          ]
      );
      
      wp_send_json_success('Images processed successfully');
      
  } catch (Exception $e) {
      $stats->addError($e->getMessage());
      plan_ok_img_log('Error crítico: ' . $e->getMessage());
      wp_send_json_error($e->getMessage());
  }
}

// Registrar endpoints AJAX
add_action('wp_ajax_nopriv_update_images_data', 'update_images_data');
add_action('wp_ajax_update_images_data', 'update_images_data');

// Log de eventos fallidos
if ( ! function_exists( 'plan_ok_img_log' ) ) {
  function plan_ok_img_log( $entry, $mode = 'a', $file = 'imageLogs' ) { 
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