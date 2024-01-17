<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Industrial
*/
?>
<section class="primary-hero" style="position:relative;">
    <div class="blur-img" style="background:url('<?php bloginfo('template_directory');?>/assets/img/bodegas1Brick.jpg')">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="<?php bloginfo('template_directory');?>/assets/img/bodegas1Brick.jpg" alt="Rentas Brick" class="w-100">
                <h3 class="text-uppercase section-title section-title_naranjo rentas-hero-title font-weight-bold">
                    <span class="primary-title ">Espacios de almacenamiento</span><br>
                    <span class="secondary-title">a tu medida</span>
                </h3>
            </div>
        </div>
    </div> 
</section>
<div class="container">
    <div class="row laign-items-stretch">
        <div class="col-12 my-5">
            <h3 class="text-uppercase"><span class="secondary-title font-weight-bold">Mini</span> <span class="secondary-title color-emphasis font-weight-bold">Bodegas</span></h3>
        </div>
    </div>
</div>
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
            'terms'         => 'mini-bodega'
        ),
    ),
  ));
  include( locate_template( './includes/templates/proyectos_industriales.php', false, false) ); 
  
  ?>

<div class="container">
    <div class="row laign-items-stretch">
        <div class="col-12 my-5">
            <h3 class="text-uppercase"><span class="secondary-title font-weight-bold">Centros de</span> <span class="secondary-title color-emphasis font-weight-bold">distribución</span></h3>
        </div>
    </div>
</div>
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
            'terms'         => 'centro-de-distribucion'
        ),
    ),
  ));
  include( locate_template( './includes/templates/proyectos_industriales.php', false, false) ); 
  
  ?>
<div class="container">
    <div class="row laign-items-stretch">
        <div class="col-12 my-5 text-center pb-5ddrive">
            <img src="<?php bloginfo('template_directory');?>/assets/img/storage-logo.svg" alt="storage" width="300" height="163">
        </div>
    </div>
</div>

<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>