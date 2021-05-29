<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Industrial
*/
?>

<?php 
$taxonomy = 'tipo';
$query = new WP_Query(array(
    'post_type'      	=> 'proyectos',
    'posts_per_page'	=> -1,
    'post_status'		=> 'publish',
    'tax_query'         => array (
        array(
            'taxonomy'      => $taxonomy,
            'field'          => 'slug',
            'terms'         => 'industrial'
        ),
    ),
  ));
  
  include( locate_template( './includes/templates/proyectos_destacados.php', false, false) ); ?>


<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
