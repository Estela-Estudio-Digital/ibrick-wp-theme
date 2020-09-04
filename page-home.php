<?php /*
Template Name: homepage
*/
get_template_part('includes/header'); 
bk_main_before();
?>
<section class="primary-hero">
    <div class="pm3-carousel owl-carousel owl-theme">
        <div class="item home-hero-container d-flex align-items-center" style="background:url('<?php bloginfo('template_directory');?>/assets/img/homeTarapaca.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/logoTarapacaBlanco.png" alt="Tarapacá">
                        <h3 class="text-white text-uppercase font-weight-bold shadow-sm">Invierte en el centro de santiago, <br>A pasos del metro U de Chile</h3>
                    </div>
                </div>
            </div>
        </div> 
        <div class="item d-md-flex justify-content-center align-items-center">
            <picture class="project-home-hero">
                <source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory');?>/assets/img/homeTarapacaMobile.png">
                <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/homeTarapaca.jpg" alt="Centro Andino">
            </picture>
            <div class="d-md-none bg-primary-color px-2 py-3">
                <h3 class="text-white text-center"><b>Un nuevo polo de desarrollo comercial</b></h3>
            </div>
        </div>
        <div class="item d-md-flex justify-content-center align-items-center">
            <picture class="project-home-hero">
                <source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory');?>/assets/img/homeCentroMobile.png">
                <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/homeCentro.jpg" alt="Centro Andino">
            </picture>
            <div class="d-md-none bg-primary-color px-2 py-3">
                <h3 class="text-white text-center"><b>Un nuevo polo de desarrollo comercial</b></h3>
            </div>
        </div>
        <div class="item d-md-flex justify-content-center align-items-center">
            <picture class="project-home-hero">
                <source media="(max-width: 768px)" srcset="<?php bloginfo('template_directory');?>/assets/img/homeCarmenMobile.png">
                <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/homeCarmen.jpg" alt="Centro Andino">
            </picture>
            <div class="d-md-none bg-primary-color px-2 py-3">
                <h3 class="text-white text-center"><b>Vanguardista, 52 departamentos</b></h3>
            </div>
        </div>
    </div>
</section>

<?php get_template_part('includes/templates/proyectos_destacados'); ?>

<section class="section shadow">
    <div class="long-content">
        <video id="myVideo" loop autoplay muted class="active muted" style="max-width:100% !important;">
            <source src="<?php bloginfo('template_directory');?>/assets/img/home.mp4" type="video/mp4">
        </video>
        <div class="video-overlay"></div>
        <div class="container video-text">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-white"><span class="font-weight-light">Proyectos Inmobiliarios innovadores,</span> <br>
                    <span>eficientes y de alta plusvalía</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
bk_main_after();
get_template_part('includes/footer'); 
?>
