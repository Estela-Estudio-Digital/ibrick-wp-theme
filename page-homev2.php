<?php /*
Template Name: homepagev2
*/
get_template_part('includes/header'); 
bk_main_before();
?>

<?php 
    $ids_2 = get_field('slider_principal');
    $depicter = get_field('id_slider_depicter');
    
    $query = new WP_Query(array(
        'post_type'      	=> 'proyectos',
        'posts_per_page'	=> 4,
        'post_status'		=> 'publish',
        'post__in'			=> $ids_2,
    ));
    $count = 1;
    if ($depicter) : ?>
        <div class="">
            <?php if ($depicter) {
                depicter($depicter);
                } 
            ?>
        </div>
    <? else:
    if ( $query->have_posts() ) : ?>
    <section class="primary-hero">
        <div class="pm3-carousel owl-carousel owl-theme d-md-none">

        <div class="video-content-yb position-relative">
              <div class="play-button">
                  <div class="flex-column justify-content-center align-items-stretch">
                      <div class="text-center">
                          <a href="#" class="bk--btn bk--btn__white-line playvideo" data-src="https://www.youtube.com/embed/oNQrZIqYVO4?autoplay=1" data-toggle="modal" data-target="#homeVideo"></a>
                      </div>
                  </div>
              </div>
              <div class="play-button-overlay"></div>
              <div class="container-yb">
                <iframe 
                width="560" 
                height="770" 
                src="https://www.youtube.com/embed/oNQrZIqYVO4?autoplay=1&controls=0&mute=1&playlist=oNQrZIqYVO4&loop=1" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                class="video-yb" 
                allowfullscreen
                >
                </iframe>
              </div>
          </div>

        <?php while ( $query->have_posts() ) : $query->the_post();
        $count++;

        $tiene_contenidos = get_field('tiene_contenidos');

        // CUSTOM FLIELDS Descripciones
        $grupo_de_datos = get_field('grupo_de_datos');
        $ubicacion = $grupo_de_datos['ubicacion'];
        $precio_desde = $grupo_de_datos['precio_desde'];
        $tipologia_select = $grupo_de_datos['tipologia_select'];
        $titulo_sliders = $grupo_de_datos['titulo_sliders'];
        $tag_del_ptroyecto = $grupo_de_datos['tag_del_ptroyecto'];
        
        // CUSTOM FLIELDS Imágenes Generales
        $slider_proyecto = get_field('slider_proyecto');
        $logo_proyecto = get_field('logo_proyecto');
        $logo_proyecto_blanco = get_field('logo_proyecto_blanco');

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); 
        $desktop = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );

    ?>
            <div class="container-fluid p-0 d-md-none">
                <div class="row">
                    <div class="col-12">
                        <img 
                            alt="<?php echo $logo_proyecto['alt'];?>"
                            src="<?php echo $slider_proyecto[0]["slider_proyecto_mobile"]["url"];?>"
                            srcset="<?php echo $slider_proyecto[0]["slider_proyecto_mobile"]["url"];?> 550w, <?php echo $slider_proyecto[0]["slider_proyecto_desktop"]["url"];?> 1440w"
                            sizes="(min-width: 768px) 1440px, 550px"
                            loading="lazy"
                            class="w-100"
                        >
                        <div class="container">
                            <div class="row">
                                <div class="col-12 text-center mt-4">
                                    <?php if ($tipologia_select && $tipologia_select['value'] != 'seleccionar') :?>
                                        <p class="m-0">
                                            <?php echo $tipologia_select['label']; ?>
                                        </p>
                                        <h4 class="mb-2 mt-2 text-uppercase font-weight-bold">
                                            <?php echo the_title(); ?>
                                        </h4>
                                    <?php endif;?>
                                    <p><?php echo $titulo_sliders; ?></p>
                                    <?php if ($tiene_contenidos === 'si') :?>
                                    <a href="<?php echo the_permalink();?>" class="btn btn-primary shadow"> Ver proyecto</a>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        <div class="pm3-carousel owl-carousel owl-theme d-none d-md-block ">

          <div class="video-content-yb position-relative">
              <div class="play-button">
                  <div class="flex-column justify-content-center align-items-stretch">
                      <div class="text-center">
                          <a href="#" class="bk--btn bk--btn__white-line playvideo" data-src="https://www.youtube.com/embed/oNQrZIqYVO4?autoplay=1" data-toggle="modal" data-target="#homeVideo"></a>
                      </div>
                  </div>
              </div>
              <div class="play-button-overlay"></div>
              <div class="container-yb">
                <iframe 
                width="560" 
                height="770" 
                src="https://www.youtube.com/embed/oNQrZIqYVO4?autoplay=1&controls=0&mute=1&playlist=oNQrZIqYVO4&loop=1" 
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                class="video-yb" 
                allowfullscreen
                >
                </iframe>
              </div>
          </div>
        <?php while ( $query->have_posts() ) : $query->the_post();
            $count++;

            $tiene_contenidos = get_field('tiene_contenidos');

            // CUSTOM FLIELDS Descripciones
            $grupo_de_datos = get_field('grupo_de_datos');
            $ubicacion = $grupo_de_datos['ubicacion'];
            $precio_desde = $grupo_de_datos['precio_desde'];
            $tipologia_select = $grupo_de_datos['tipologia_select'];
            $titulo_sliders = $grupo_de_datos['titulo_sliders'];
            $tag_del_ptroyecto = $grupo_de_datos['tag_del_ptroyecto'];
            
            // CUSTOM FLIELDS Imágenes Generales
            $slider_proyecto = get_field('slider_proyecto');
            $logo_proyecto = get_field('logo_proyecto');
            $logo_proyecto_blanco = get_field('logo_proyecto_blanco');

            // Setup this post for WP functions (variable must be named $post).
            setup_postdata($post); 
            $desktop = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
            $mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
        ?>

            <div class="item home-hero-container d-flex align-items-center" style="background-position:bottom !important;background:url('<?php echo (sizeof($slider_proyecto) > 1) ? $slider_proyecto[1]["slider_proyecto_desktop"]["url"] : $slider_proyecto[0]["slider_proyecto_desktop"]["url"];?>'); background-size: cover;">
                <div class="container">
                    <div class="row">
                        <div class="col-12" style="text-shadow: 1px 1px 2px black;letter-spacing:1.2px;position:relative;z-index:2">
                            <img
                                src="<?php echo $logo_proyecto_blanco['url'];?>"
                                alt="<?php echo $logo_proyecto_blanco['alt'];?>"
                                class="mb-5"
                            >
                            <?php if ($tipologia_select && $tipologia_select['value'] != 'seleccionar') :?>
                            <h2 class="text-white text-uppercase font-weight-bold"><?php echo $tipologia_select['label']; ?></h2>
                            <?php endif;?>
                            <h4 class="text-white text-uppercase font-weight-bold mb-5"><?php echo $titulo_sliders; ?></h4>
                            <?php if ($tiene_contenidos === 'si') :?>
                            <a href="<?php echo the_permalink();?>" class="btn btn-primary shadow"> Ver proyecto</a>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
                <div class="overlay"></div>
            </div>

        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; endif;?>

<?php 
$ids_2 = get_field('proyectos_destacados', 5, false);
$query = new WP_Query(array(
    'post_type'      	=> 'proyectos',
    'posts_per_page'	=> 8,
    'post_status'		=> 'publish',
    'post__in'			=> $ids_2,
));

include( locate_template( './includes/templates/proyectos_destacados.php', false, false) ); ?>

<section class="section container-fluid" style="background: #d5d4d4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 py-5">
                <img src="<?php bloginfo('template_directory');?>/assets/img/eco_brick_mobile.svg" alt="echo Brick" class="w-100 d-md-none" width="540">
                <img src="<?php bloginfo('template_directory');?>/assets/img/eco_brick.svg" alt="echo Brick" class="w-100 d-none d-md-block" width="540">
            </div>
            <div class="d-none d-md-block col-md-6">
                <img src="<?php bloginfo('template_directory');?>/assets/img/huellas.jpg" alt="Proyectos sustentables" class="w-100">
            </div>
        </div>
    </div>
</section>

<section class="section container-fluid pb-4" style="background: #d5d4d4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 py-3 py-md-0 px-0">
                <img src="<?php bloginfo('template_directory');?>/assets/img/reforestemos.jpg" alt="echo Brick" class="w-100">
            </div>
            <div class="col-md-6 px-0">
                <img src="<?php bloginfo('template_directory');?>/assets/img/muevete.jpg" alt="Muevete" class="w-100">
            </div>
        </div>
    </div>
</section>

<section class="section-mobile-suculenta d-none">
    <img src="<?php bloginfo('template_directory');?>/assets/img/muevete.jpg" alt="Muevete" class="w-100">
</section>

<section class="contact-floating-container-home follow-button-play">
    <ul class="contact-floating-list px-2 d-flex flex-column justify-content-between align-items-center">
        <li>
            <a class="d-inline whatsappButton" id="whatsappButton" href="#">
                <ul class="d-flex align-items-center contact-floating-whatsapp-button">
                    <li class="">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/whatsapp-logo.svg" alt="whatsapp" style="max-height:35px" width="35">
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

<!-- Home Video Modal -->
<div class="modal fade" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
        <!-- <button type="button" class="btn btn-default pausevideo" data-dismiss="modal" >Cerrar X</button> -->
        <div class="embed-responsive embed-responsive-16by9 " id="content-video">
            <iframe class="embed-responsive-item content-video" src="" id="video"  allowscriptaccess="always" allow="autoplay" style="background: #E5EFF1 url('<?php bloginfo('template_directory');?>/assets/img/loading.gif') center center no-repeat"></iframe>
            </div>
        </div>
    </div>
</div>

<?php 
bk_main_after();
get_template_part('includes/footer'); 
?>
