<?php /*
Template Name: Somos Brick
*/
get_template_part('includes/header'); 
bk_main_before();
$bloque_1_texto = get_field('bloque_1_texto');
$bloque_1_imagen = get_field('bloque_1_imagen');
$bloque_2_texto = get_field('bloque_2_texto');
$bloque_2_imagen = get_field('bloque_2_imagen');
$bloque_3_texto = get_field('bloque_3_texto');
$bloque_3_imagen = get_field('bloque_3_imagen');
?>
<section class="primary-hero" style="position:relative;">
    <div class="blur-img" style="background:url('<?php echo the_post_thumbnail_url( );?>')">
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?php echo the_post_thumbnail_url( );?>" alt="Somos Brick" class="w-100">
                </div>
            </div>
    </div> 
</section>

<div class="container py-5">
    <div class="row align-items-stretch">
        <div class="col-12">
            <h1 class="py-2 text-uppercase"><?php echo the_title();?></h1>
        </div>
        
                    <?php echo the_content()?>
                    
    </div>
    <hr>
    <div class="row align-items-stretch">
        <div class="col-md-6 d-flex align-items-center">
            <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/teamBrick3.jpg" alt="Somos">
        </div>
        <div class="col-md-6 d-flex align-items-center mt-5 mt-md-0">
                <ul class="pl-md-5">
                    <li class="py-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/ubicaciones.svg" alt="">
                        <p>
                            <?php echo $bloque_1_texto; ?>
                        </p>
                    </li>
                    <li class="py-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/arquitectura.svg" alt="">
                        <p>
                        <?php echo $bloque_2_texto; ?>
                        </p>    
                    </li>
                    <li class="py-1">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/entornos.svg" alt="">
                        <p>
                        <?php echo $bloque_3_texto; ?>
                        </p>
                    </li>
                </ul>
        </div>
    </div>
    <hr>
</div>
<?php
// include( locate_template( './includes/templates/banner-pasos.php', false, false) ); 
?>
<div class="container py-5">
    <div class="row">
        <div class="col-md-3 text-center text-md-left my-5 my-md-0">
            <h4 class="text-uppercase section-title mb-3">
                <span class="primary-title">Proyectos</span><br>
                <span class="secondary-title">RESIDENCIALES</span>
            </h4>
            <a href="<?php echo site_url('residencial');?>" class="btn btn-primary shadow"> Ver proyectos</a>
        </div>
        <div class="col-md-3 text-center text-md-left my-5 my-md-0">
            <h4 class="text-uppercase section-title section-title_verde mb-3">
                <span class="primary-title">Proyectos</span><br>
                <span class="secondary-title">COMERCIALES</span>
            </h4>
            <a href="<?php echo site_url('comercial');?>" class="btn btn-primary shadow"> Ver proyectos</a>
        </div>
        <div class="col-md-3 text-center text-md-left my-5 my-md-0">
            <h4 class="text-uppercase section-title section-title_gris mb-3">
                <span class="primary-title">Proyectos</span><br>
                <span class="secondary-title">Bodegas</span>
            </h4>
            <a href="<?php echo site_url('bodegas');?>" class="btn btn-primary shadow"> Ver proyectos</a>
        </div>
        <div class="col-md-3 text-center text-md-left my-5 my-md-0">
            <h4 class="text-uppercase section-title section-title_naranjo mb-3">
                <span class="primary-title">Brick</span><br>
                <span class="secondary-title">Rentas</span>
            </h4>
            <a href="<?php echo site_url('rentas');?>" class="btn btn-primary shadow"> Ver proyectos</a>
        </div>
    </div>
</div>
<section class="section shadow">
    <div class="long-content">
        <video id="myVideo" loop autoplay muted class="active muted" style="max-width:100% !important;">
            <source src="<?php bloginfo('template_directory');?>/assets/img/home.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="container video-text">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-white"><span class="font-weight-light">Proyectos Inmobiliarios innovadores,</span> <br>
                    <span>eficientes y de alta plusvalía</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
bk_main_after();
get_template_part('includes/footer'); 
?>
