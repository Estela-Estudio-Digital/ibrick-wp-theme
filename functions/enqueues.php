<?php
/*
 * Enqueues
 */
$url = 'https://code.jquery.com/jquery-3.4.1.min.js';
$test_url = @fopen($url, 'r');
if ($test_url !== false) {
	function load_external_jQuery()
	{
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://code.jquery.com/jquery-3.4.1.min.js');
		wp_enqueue_script('jquery');
	}
	add_action('wp_enqueue_scripts', 'load_external_jQuery');
} else {
	function load_local_jQuery()
	{
		wp_deregister_script('jquery');
		wp_register_script('jquery', get_bloginfo('template_url') . '/assets/js/jquery-3.4.1.min.js');
		wp_enqueue_script('jquery');
	}
	add_action('wp_enqueue_scripts', 'load_local_jQuery');
}

if ( ! function_exists('bk_enqueues') ) {
	function bk_enqueues() {

		// Styles

		wp_register_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css', false, '4.3.1', null);
		wp_enqueue_style('bootstrap');

		wp_register_style('fontawesome5', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css', false, '5.8.1', null);
		wp_enqueue_style('fontawesome5');

		wp_enqueue_style( 'gutenberg-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

		wp_register_style('bk', get_template_directory_uri() . '/assets/css/bk.css', false, null);
		wp_enqueue_style('bk');

		wp_register_style('fancibox-css', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
		wp_enqueue_style('fancibox-css');

		wp_register_style('owl-carousel-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css');
		wp_enqueue_style('owl-carousel-css');
	
		wp_register_style('owl-carousel-theme-css', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css');
		wp_enqueue_style('owl-carousel-theme-css');

		
		wp_register_style('animete-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css');
		wp_enqueue_style('animete-css');
		
		wp_register_style('main', get_template_directory_uri() . '/assets/css/main-dist.css', false, null);
		wp_enqueue_style('main');
	
		
		// Scripts
		wp_register_script('validate-js', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', false, null, true);
		wp_enqueue_script('validate-js');

		wp_register_script('valid-method-js', get_template_directory_uri() . '/assets/js/additional-methods.min.js', false, null, true);
		wp_enqueue_script('valid-method-js');

		wp_register_script('rut-js', get_template_directory_uri() . '/assets/js/rut.js', false, null, true);
		wp_enqueue_script('rut-js');
		
		wp_register_script('modernizr', 'https://cdn.jsdelivr.net/npm/sweetalert2@9', false, '2.8.3', true);
		wp_enqueue_script('modernizr');
		
		wp_register_script('bootstrap-bundle', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js', false, '4.3.1', true);
		wp_enqueue_script('bootstrap-bundle');
		// (The Bootstrap JS bundle contains Popper JS.)
		
		wp_register_script('owl-carousel-js', 'https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js', false, null, true);
		wp_enqueue_script('owl-carousel-js');

		wp_register_script('fancybox', 'https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js', false, null, true);
		wp_enqueue_script('fancybox');

		wp_register_script('sbjs', get_template_directory_uri() . '/assets/js/sourcebuster.min.js', false, null, true);
		wp_enqueue_script('sbjs');

		wp_register_script('main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);

		$script_link = array(
			'data' => ""
		);

		if(is_archive('proyectos')){
			$taxonomy = 'ubicaciones';
			$terms_args = array(
			'orderby' => 'title',
			'hide_empty' => true,
			);
			
			//Se declara una variable como un Array vacío
			$projects_arr = array();
			$cats = get_terms( $taxonomy, $terms_args );
			foreach ($cats as $cat) {
				if( 0 != $cat->parent ) {
					$parent = $cat->parent;
					$lugar = $cat->name;
					$cat_id= $cat->term_id;
					$term_slug = $cat->slug;

					$args = array(
						'post_type' => 'proyectos',
						'posts_per_page' => -1,
						'post_status' => 'publish',
						'orderby' => 'title',
						'order' => 'ASC',
						'tax_query' => array(
							array(
							'taxonomy' => $taxonomy,
							'field'    => 'slug',
							'terms'    => $term_slug
							),
						),
					);
					
					$proyectos = new WP_Query($args);
					if ($proyectos->have_posts()) {
						while ($proyectos->have_posts()) : $proyectos->the_post();
						
						$postid = get_the_ID();
						$slug = $proyectos->post->post_name;
						$thumbnail = get_the_post_thumbnail_url($postid ,'medium');
						$logo = get_field( 'logo_del_proyecto' );
						$imagen_slider = get_field( 'detalles_img' );
						$descripcion_general = get_field('descripcion_general');
						$detalles = get_field('detalles_txt');
						$detalles_img = get_field('detalles_img');
						$tag_del_ptroyecto = get_field('tag_del_ptroyecto');
						$terms = get_the_terms( $post->ID, 'estado' );
						if (!empty($terms)) {
							foreach($terms as $term) {
								$estado = $term->slug;
							}
						}
							array_push( 
								$projects_arr, array(
									'title' => get_the_title(),
									'slug' => $slug,
									'url' => get_the_permalink(),
									'region_parent' =>  $parent,
									'region' =>  $lugar,
									'estado' => $estado,
									'thumbnail' => $thumbnail,
									'detalles_img' => $detalles_img['url'],
									'tag_del_ptroyecto' => $tag_del_ptroyecto['label'],
									'tag_color' => $tag_del_ptroyecto['value'] 
								) 
							);
							
						endwhile;
						wp_reset_postdata(); //Reseteamos la consulta del post
					}
				}
			}
			//Cargamos nuestros datos obtenidos en un nuevo Array
			$script_link = array(
				'data' => $projects_arr
			);
		}
		if(is_singular('proyectos') || is_singular('plantas')){
			$single_arr = array();
			$postid = (is_singular('proyectos')) ? get_the_ID() : get_field('vincular_planta_a_proyecto')->ID;
			$infoSv = get_field('sala_de_ventas', $postid);
			$nombreProyecto = get_the_title($postid);
			$imagenDestacada = get_field('slider', $postid );
			$imagenDestacadaUno = $imagenDestacada[0]['proyecto_rp_mobile']['link'];
			$imagenDestacadaDos = $imagenDestacada[1]['proyecto_rp_mobile']['link'];
			$imagenDestacadaTres = $imagenDestacada[2]['proyecto_rp_mobile']['link'];
			$direccionSv = $infoSv['ubicacion_sala_de_ventas'];
			$comuna = wp_get_post_terms($postid, 'ubicaciones');
			$telefonoSv = $infoSv['telefonos_sv'];
			$emailSv = $infoSv['correos_sv'];
			

			array_push( 
				$single_arr, array(
					"nombreProyecto" => $nombreProyecto,
					"textoProyecto" => get_field('grupo_de_datos', $postid)['bloque_descriptivo'],
					"imagenDestacadaUno" => $imagenDestacadaUno ,
					"imagenDestacadaDos" => $imagenDestacadaDos,
					"imagenDestacadaTres" => $imagenDestacadaTres,
					"direccionSv" => $direccionSv ,
					"comuna" => $comuna[0]->name,
					"telefonoSv" => $telefonoSv,
					"emailSv" => $emailSv,
				) 
			);

			$script_link = array(
				'data' => $single_arr
			);
		}
		wp_localize_script(
			'main',//Nombre del js donde guardaremos los datos
			'project_data',//Nombre de la variable para consultar los datos más adelante
			$script_link //Nombre de la variable de donde obtenemos los datos
		);

		wp_enqueue_script('main');


		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}
}
add_action('wp_enqueue_scripts', 'bk_enqueues', 100);
