<?php /*
Template Name: Somos Brick
*/
get_template_part('includes/header'); 
bk_main_before();
?>
<section class="primary-hero" style="position:relative;">
    <div class="blur-img" style="background:url('<?php echo the_post_thumbnail_url( );?>')">
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <img src="<?php echo the_post_thumbnail_url( );?>" alt="Somos Brick">
                </div>
            </div>
    </div> 
</section>

<div class="container py-5">
    <div class="row align-items-stretch">
        <div class="col-md-6 d-flex align-items-center">
            <div class="wrapper">

                <h1 class="py-2 "><?php echo the_title();?></h1>
                <div class="pb-5">
                    <?php echo the_content()?>
                </div>
                <a href="#" class="btn btn-secondary btn-sm bk--btn__primary shadow contactoModalBtn"><i class="far fa-envelope"></i> 
                Contáctanos</a>
            </div>
        </div>
        <div class="col-md-6 d-flex align-items-center">
                <ul class="pl-md-5">
                    <li class="py-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/ubicaciones.svg" alt="">
                        <p>
                        
                            Buscamos la <b>innovación</b> en cada proyecto que desarrollamos, siendo vanguardistas y preocupándonos de cada detalle.
                        </p>
                    </li>
                    <li class="py-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/arquitectura.svg" alt="">
                        <p>
                            
                            Nuestra <b>arquitectura</b> busca reflejar a través de ella la dedicación y profesionalismo que ponemos en cada proyecto
                        </p>    
                    </li>
                    <li class="py-1">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/entornos.svg" alt="">
                        <p>
                            Las <b>ubicaciones</b> de nuestros edificios son privilegiadas, buscando siempre el beneficio de nuestros clientes.
                        </p>
                    </li>
                </ul>
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
