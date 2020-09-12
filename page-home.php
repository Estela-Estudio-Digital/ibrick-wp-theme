<?php /*
Template Name: homepage
*/
get_template_part('includes/header'); 
bk_main_before();
?>

<?php 
    $ids_2 = get_field('slider_principal');
    
    $query = new WP_Query(array(
        'post_type'      	=> 'proyectos',
        'posts_per_page'	=> 4,
        'post_status'		=> 'publish',
        'post__in'			=> $ids_2,
    ));
    $count = 1;
    if ( $query->have_posts() ) : ?>
    <section class="primary-hero">
        <div class="pm3-carousel owl-carousel owl-theme">
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
        $logo_proyecto = get_field('logo_proyecto_blanco');

        // Setup this post for WP functions (variable must be named $post).
        setup_postdata($post); 
        $desktop = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );

        
    ?>

    
        <div class="item home-hero-container d-flex align-items-center" style="background-position:bottom !important;background:url('<?php echo (sizeof($slider_proyecto) > 1) ? $slider_proyecto[1]["slider_proyecto_desktop"]["url"] : $slider_proyecto[0]["slider_proyecto_desktop"]["url"];?>')">
            <div class="container">
                <div class="row">
                    <div class="col-12" style="text-shadow: 1px 1px 2px black;letter-spacing:1.2px">
                        <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="mb-5">
                        <?php if ($tipologia_select && $tipologia_select != 'seleccionar') :?>
                        <h2 class="text-white text-uppercase font-weight-bold"><?php echo $tipologia_select['label']; ?></h2>
                        <?php endif;?>
                        <h4 class="text-white text-uppercase font-weight-bold mb-5"><?php echo $titulo_sliders; ?></h4>
                        <?php if ($tiene_contenidos === 'si') :?>
                        <a href="<?php echo the_permalink();?>" class="btn btn-primary shadow"> Ver proyecto</a>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>


        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</section>
<?php endif;?>

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
