<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Residencial
*/
?>
<?php if (have_rows('beneficios')) : ?>
    <section class="container mt-5 pt-5">
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
    <section class="container position-relative">
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
                <span class="rentas-section__title-text">
                    Brick administra tu propiedad
                </span>
            </a>
        </div>
        <div class="col-md-6 pl-md-0">
            <a href="<?php echo site_url('rentas');?>" class="rentas-section__image">
                <span class="rentas-section__image-text">
                    Consultar
                </span>
            </a>
        </div>
    </div>
  </section>
  <?php
  include( locate_template( './includes/templates/banner-pasos.php', false, false) ); 
  
  ?>


<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
