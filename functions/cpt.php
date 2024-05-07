<?php
// Register Custom Post Type Proyecto
function create_proyecto_cpt() {

	$labels = array(
		'name' => _x( 'Proyectos', 'Post Type General Name', 'brick' ),
		'singular_name' => _x( 'Proyecto', 'Post Type Singular Name', 'brick' ),
		'menu_name' => _x( 'Proyectos', 'Admin Menu text', 'brick' ),
		'name_admin_bar' => _x( 'Proyecto', 'Add New on Toolbar', 'brick' ),
		'archives' => __( 'Archivos Proyecto', 'brick' ),
		'attributes' => __( 'Atributos Proyecto', 'brick' ),
		'parent_item_colon' => __( 'Padres Proyecto:', 'brick' ),
		'all_items' => __( 'Todas Proyectos', 'brick' ),
		'add_new_item' => __( 'Añadir nueva Proyecto', 'brick' ),
		'add_new' => __( 'Añadir nueva', 'brick' ),
		'new_item' => __( 'Nueva Proyecto', 'brick' ),
		'edit_item' => __( 'Editar Proyecto', 'brick' ),
		'update_item' => __( 'Actualizar Proyecto', 'brick' ),
		'view_item' => __( 'Ver Proyecto', 'brick' ),
		'view_items' => __( 'Ver Proyectos', 'brick' ),
		'search_items' => __( 'Buscar Proyecto', 'brick' ),
		'not_found' => __( 'No se encontraron Proyectos.', 'brick' ),
		'not_found_in_trash' => __( 'Ningún Proyecto encontrado en la papelera.', 'brick' ),
		'featured_image' => __( 'Imagen destacada', 'brick' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'brick' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'brick' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'brick' ),
		'insert_into_item' => __( 'Insertar en la Proyecto', 'brick' ),
		'uploaded_to_this_item' => __( 'Subido a esta Proyecto', 'brick' ),
		'items_list' => __( 'Lista de Proyectos', 'brick' ),
		'items_list_navigation' => __( 'Navegación por el listado de Proyectos', 'brick' ),
		'filter_items_list' => __( 'Lista de Proyectos filtradas', 'brick' ),
	);
	$args = array(
		'label' => __( 'Proyecto', 'brick' ),
		'description' => __( '', 'brick' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-multisite',
		'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'custom-fields'),
		'taxonomies' => array( 'ubicaciones', 'tipo' ),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'show_in_rest'      => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
		'rewrite' => true,
	);
	register_post_type( 'proyectos', $args );

}
add_action( 'init', 'create_proyecto_cpt', 0 );

// Register Custom Post Type Planta
function create_planta_cpt() {

	$labels = array(
		'name' => _x( 'Plantas', 'Post Type General Name', 'brick' ),
		'singular_name' => _x( 'Planta', 'Post Type Singular Name', 'brick' ),
		'menu_name' => _x( 'Plantas', 'Admin Menu text', 'brick' ),
		'name_admin_bar' => _x( 'Planta', 'Add New on Toolbar', 'brick' ),
		'archives' => __( 'Archivos Planta', 'brick' ),
		'attributes' => __( 'Atributos Planta', 'brick' ),
		'parent_item_colon' => __( 'Padres Planta:', 'brick' ),
		'all_items' => __( 'Plantas', 'brick' ),
		'add_new_item' => __( 'Añadir nueva Planta', 'brick' ),
		'add_new' => __( 'Añadir nueva', 'brick' ),
		'new_item' => __( 'Nueva Planta', 'brick' ),
		'edit_item' => __( 'Editar Planta', 'brick' ),
		'update_item' => __( 'Actualizar Planta', 'brick' ),
		'view_item' => __( 'Ver Planta', 'brick' ),
		'view_items' => __( 'Ver Plantas', 'brick' ),
		'search_items' => __( 'Buscar Planta', 'brick' ),
		'not_found' => __( 'No se encontraron Plantas.', 'brick' ),
		'not_found_in_trash' => __( 'Ningún Planta encontrado en la papelera.', 'brick' ),
		'featured_image' => __( 'Imagen destacada', 'brick' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'brick' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'brick' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'brick' ),
		'insert_into_item' => __( 'Insertar en la Planta', 'brick' ),
		'uploaded_to_this_item' => __( 'Subido a esta Planta', 'brick' ),
		'items_list' => __( 'Lista de Plantas', 'brick' ),
		'items_list_navigation' => __( 'Navegación por el listado de Plantas', 'brick' ),
		'filter_items_list' => __( 'Lista de Plantas filtradas', 'brick' ),
	);
	$args = array(
		'label' => __( 'Planta', 'brick' ),
		'description' => __( '', 'brick' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => array(),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'edit.php?post_type=proyectos',
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'plantas', $args );

}
add_action( 'init', 'create_planta_cpt', 0 );

// Reescribir url
function my_permalinks($permalink, $post, $leavename) {
    $post_id = $post->ID;
    if($post->post_type != 'plantas' || empty($permalink) || in_array($post->post_status, array('draft', 'pending', 'auto-draft')))
        return $permalink;
    $parent = get_field('vincular_planta_a_proyecto');
    // $parent = $post->post_parent;
    $parent_post = get_post( $parent );
    $permalink = str_replace('%proyectos%', $parent_post->post_name, $permalink);
    return $permalink;
}
add_filter('post_type_link', 'my_permalinks', 10, 3);

// Crear URL personalizada en Plantas
function my_add_rewrite_rules() {
    add_rewrite_tag('%plantas%', '([^/]+)', 'plantas=');
    add_permastruct('plantas', '/proyectos/%proyectos%/plantas/%plantas%', true);
    add_rewrite_rule('^proyectos/([^/]+)/plantas/([^/]+)/?','index.php?plantas=$matches[2]','top');


}
add_action( 'init', 'my_add_rewrite_rules' );


function ubicaciones() {

	$labels = array(
		'name'                       => _x( 'Ubicación', 'Taxonomy General Name', 'ubicación' ),
		'singular_name'              => _x( 'Ubicación', 'Taxonomy Singular Name', 'ubicación' ),
		'menu_name'                  => __( 'Ubicaciones', 'ubicación' ),
		'all_items'                  => __( 'Todos', 'ubicación' ),
		'parent_item'                => __( 'Parent Item', 'tipo de proyecto' ),
		'parent_item_colon'          => __( 'Parent Item:', 'ubicación' ),
		'new_item_name'              => __( 'Nuevo', 'ubicación' ),
		'add_new_item'               => __( 'Nuevo', 'ubicación' ),
		'edit_item'                  => __( 'Editar', 'ubicación' ),
		'update_item'                => __( 'Actualizar', 'ubicación' ),
		'view_item'                  => __( 'Ver', 'ubicación' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'ubicación' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'ubicación' ),
		'choose_from_most_used'      => __( 'Más usadas', 'ubicación' ),
		'popular_items'              => __( 'Más Usadas', 'ubicación' ),
		'search_items'               => __( 'Search Items', 'ubicación' ),
		'not_found'                  => __( 'Not Found', 'ubicación' ),
		'no_terms'                   => __( 'No items', 'ubicación' ),
		'items_list'                 => __( 'Items list', 'ubicación' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ubicación' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_in_rest'      		=> true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'ubicaciones', array( 'proyectos' ), $args );

}
add_action( 'init', 'ubicaciones', 0 );
	
if ( ! function_exists( 'tipo_entrega' ) ) {

	// Register Custom Taxonomy
	function tipo_entrega() {
	
		$labels = array(
			'name'                       => _x( 'Tipos', 'Taxonomy General Name', 'tipo' ),
			'singular_name'              => _x( 'Tipo', 'Taxonomy Singular Name', 'tipo' ),
			'menu_name'                  => __( 'Tipo', 'text_domain' ),
			'all_items'                  => __( 'Todos los tipos', 'text_domain' ),
			'parent_item'                => __( 'Parent Item', 'text_domain' ),
			'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
			'new_item_name'              => __( 'Nuevo tipo', 'text_domain' ),
			'add_new_item'               => __( 'Agregar nuevo tipo', 'text_domain' ),
			'edit_item'                  => __( 'Editar tipo', 'text_domain' ),
			'update_item'                => __( 'Actualizar tipo', 'text_domain' ),
			'view_item'                  => __( 'Ver tipo', 'text_domain' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
			'popular_items'              => __( 'Popular Items', 'text_domain' ),
			'search_items'               => __( 'Search Items', 'text_domain' ),
			'not_found'                  => __( 'Not Found', 'text_domain' ),
			'no_terms'                   => __( 'No items', 'text_domain' ),
			'items_list'                 => __( 'Items list', 'text_domain' ),
			'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => false,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'tipo', array( 'proyectos' ), $args );
	
	}
	add_action( 'init', 'tipo_entrega', 0 );
	
	}

	//Vincular planta a proyecto
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_5d3b6c62b9397',
        'title' => 'Vincular Planta a Proyecto',
        'fields' => array(
            array(
                'key' => 'field_5d3b6c6f1eb56',
                'label' => 'Vincular Planta a Proyecto',
                'name' => 'vincular_planta_a_proyecto',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'proyectos',
                ),
                'taxonomy' => '',
                'allow_null' => 0,
                'multiple' => 0,
                'return_format' => 'object',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'plantas',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => array(
            0 => 'page_attributes',
        ),
        'active' => true,
        'description' => '',
    ));
    
endif;

function create_planta_cpt_api() {

	$labels = array(
		'name' => _x( 'Plantas API ', 'Post Type General Name', 'brick' ),
		'singular_name' => _x( 'Planta', 'Post Type Singular Name', 'brick' ),
		'menu_name' => _x( 'Plantas API', 'Admin Menu text', 'brick' ),
		'name_admin_bar' => _x( 'Planta', 'Add New on Toolbar', 'brick' ),
		'archives' => __( 'Archivos Planta', 'brick' ),
		'attributes' => __( 'Atributos Planta', 'brick' ),
		'parent_item_colon' => __( 'Padres Planta:', 'brick' ),
		'all_items' => __( 'Plantas API', 'brick' ),
		'add_new_item' => __( 'Añadir nueva Planta', 'brick' ),
		'add_new' => __( 'Añadir nueva', 'brick' ),
		'new_item' => __( 'Nueva Planta', 'brick' ),
		'edit_item' => __( 'Editar Planta', 'brick' ),
		'update_item' => __( 'Actualizar Planta', 'brick' ),
		'view_item' => __( 'Ver Planta', 'brick' ),
		'view_items' => __( 'Ver Plantas API', 'brick' ),
		'search_items' => __( 'Buscar Planta', 'brick' ),
		'not_found' => __( 'No se encontraron Plantas API.', 'brick' ),
		'not_found_in_trash' => __( 'Ningún Planta encontrado en la papelera.', 'brick' ),
		'featured_image' => __( 'Imagen destacada', 'brick' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'brick' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'brick' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'brick' ),
		'insert_into_item' => __( 'Insertar en la Planta', 'brick' ),
		'uploaded_to_this_item' => __( 'Subido a esta Planta', 'brick' ),
		'items_list' => __( 'Lista de Plantas API', 'brick' ),
		'items_list_navigation' => __( 'Navegación por el listado de Plantas API', 'brick' ),
		'filter_items_list' => __( 'Lista de Plantas API filtradas', 'brick' ),
	);
	$args = array(
		'label' => __( 'Planta Api', 'brick' ),
		'description' => __( '', 'brick' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-home',
		'supports' => array(),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => 'edit.php?post_type=proyectos',
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post'
	);
	register_post_type( 'plantas_api', $args );

}
add_action( 'init', 'create_planta_cpt_api', 0 );

// if( function_exists('acf_add_local_field_plantas_api') ):

// 	acf_add_local_field_plantas_api(array(
// 			'key' => 'group_5d3b6c62b0984',
// 			'title' => 'Vincular Planta a Proyecto',
// 			'fields' => array(
// 					array(
// 							'key' => 'field_5d3b6c6f1eb65',
// 							'label' => 'Vincular Planta a Proyecto',
// 							'name' => 'vincular_planta_a_proyecto',
// 							'type' => 'post_object',
// 							'instructions' => '',
// 							'required' => 1,
// 							'conditional_logic' => 0,
// 							'wrapper' => array(
// 									'width' => '',
// 									'class' => '',
// 									'id' => '',
// 							),
// 							'post_type' => array(
// 									0 => 'proyectos',
// 							),
// 							'taxonomy' => '',
// 							'allow_null' => 0,
// 							'multiple' => 0,
// 							'return_format' => 'object',
// 							'ui' => 1,
// 					),
// 			),
// 			'location' => array(
// 					array(
// 							array(
// 									'param' => 'post_type',
// 									'operator' => '===',
// 									'value' => 'plantas_api',
// 							),
// 					),
// 			),
// 			'menu_order' => 0,
// 			'position' => 'side',
// 			'style' => 'default',
// 			'label_placement' => 'top',
// 			'instruction_placement' => 'label',
// 			'hide_on_screen' => array(
// 					0 => 'page_attributes',
// 			),
// 			'active' => true,
// 			'description' => '',
// 	));
	
// endif;
?>
