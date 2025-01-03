<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Residencial
*/
?>
<?php if (have_rows('beneficios')) : ?>
    <section class="container mt-5 pt-5 d-none">
        <div class="row">
            <div class="col-12">
                <h2 class="text-center text-uppercase fs-3">
                    <span><b>Aprovecha estos beneficios</b></span>
                    <span class="text-primary-color">en la compra de tu nuevo Hogar</span>
                </h2>
                <p class="text-center">
                    <small class="text-uppercase">Consulta condiciones comerciales</small>
                </p>
            </div>
        </div>
    </section>
    <section class="container position-relative d-none">
        <div class="beneficios-carousel owl-carousel owl-theme">
            <?php while (have_rows('beneficios')) : the_row();
                // vars
                $icono = get_sub_field('icono');
                $titulo = get_sub_field('titulo');
                $texto = get_sub_field('texto');
            ?>
            <div class="item">
                <div class="flip">
                    <div class="fcard"> 
                        <div class="face front"> 
                            <div class="inner">
                                <div class="text-center">
                                    <img class="img" src="<?php echo $icono['url'];?>" alt="<?php echo $icono['alt'];?>" height="70">
                                </div> 
                                <p class="text-uppercase text-primary-color fs-2 px-4 my-2"><b><?php echo $titulo; ?></b></p>
                                <div class="text-center"><span class="more-info">+ Info</span></div>
                            </div>
                        </div> 
                        <div class="face back d-flex align-items-center"> 
                            <div class="inner text-center"> 
                                <p><?php echo $texto; ?></p>
                            </div>
                        </div>
                    </div>	 
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
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
            'terms'         => 'residencial'
        ),
    ),
  ));
  
  include( locate_template( './includes/templates/proyectos_destacados.php', false, false) );

 
  ?>
  <section class="rentas-section container">
    <div class="row">
        <div class="col-md-6 pr-md-0">
            <a href="<?php echo site_url('rentas');?>" class="rentas-section__title">
				<h1>
                	<img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/brick-rentas1.jpg" alt="Rentas Brick">
				</h1>
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
