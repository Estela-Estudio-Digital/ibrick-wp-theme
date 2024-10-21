<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Entrega inmediata
*/

?>

<?php
$id_slider = get_field('id_slider');
$mobile = get_field('mobile');
$desktop = get_field('desktop');
$enlace_imagen = get_field('enlace_imagen');
?>
<section class="primary-hero">
<?php if ($id_slider && !$mobile && !$desktop) : ?>
    <?php echo do_shortcode('[smartslider3 slider="'.$id_slider.'"]'); ?>
<? endif; ?>
<? if (!$id_slider && $mobile && $desktop) : ?>
    <?php if($enlace_imagen): ?>
        <a href="<?php echo $enlace_imagen;?>">
    <?php endif; ?>
			<h1 aria-label="Entrega Inmediata">
        <picture>
            <source
            media="(max-width: 768px)"
            srcset="<?php echo $mobile;?>">
            <img 
            alt="Entrega Inmediata"
            src="<?php echo $desktop;?>"
            loading="lazy"
            class="w-100"
            >
        </picture>
			</h1>
    <?php if($enlace_imagen): ?>
        </a>
    <?php endif; ?>
<?php endif; ?>
</section>

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
            'terms'         => 'entrega-inmediata'
        ),
    ),
  ));
  
  include( locate_template( './includes/templates/proyectos_destacados.php', false, false) );

 
  ?>
  <section class="rentas-section container">
    <div class="row">
        <div class="col-md-6 pr-md-0">
            <a href="<?php echo site_url('rentas');?>" class="rentas-section__title">
                <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/brick-rentas1.jpg" alt="Rentas Brick">
            </a>
        </div>
        <div class="col-md-6 pl-md-0">
            <a href="<?php echo site_url('rentas');?>" class="rentas-section__image">
                <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/brick-rentas2.jpg" alt="Rentas Brick">
            </a>
        </div>
    </div>
  </section>

  <section class="contact-floating-container-home follow-button-play">
    <ul class="contact-floating-list px-2 d-flex flex-column justify-content-between align-items-center">
        <li>
            <a class="d-inline whatsappButton" id="whatsappButton" href="#">
                <ul class="d-flex align-items-center contact-floating-whatsapp">
                    <li class="contact-floating-link whatsappButton" style="zoom: 1.2">
                        <i class="fab fa-whatsapp"></i>
                    </li>
                </ul>
                <span id="whatsappButtonAd">¿Necesitas ayuda?</span>
            </a>
        </li>
    </ul>
</section>

<?php 
include( locate_template( './includes/templates/whatsapp-modal.php', false, false) );
?>

  <?php
  include( locate_template( './includes/templates/banner-pasos.php', false, false) ); 
  
  ?>


<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
