<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'viewProject',
        projectTitle: '<?php echo the_title(); ?>'
    })
</script>

<?php
get_template_part('includes/header');
bk_main_before();

// CUSTOM FLIELD THEME
$theme = get_field('esquema_de_colores');
$tiene_contenidos = get_field('tiene_contenidos');

// CUSTOM FLIELDS Descripciones
$grupo_de_datos = get_field('grupo_de_datos');
$banner_promocion = get_field('banner_promocion');
$ubicacion = $grupo_de_datos['ubicacion'];
$precio_desde = $grupo_de_datos['precio_desde'];
$tipologia_select = $grupo_de_datos['tipologia_select'];
$legal = $grupo_de_datos['legal'];
$whatsapp = $grupo_de_datos['whatsapp'];
$correos_ventas = $grupo_de_datos['correos_ventas'];
$tag_del_ptroyecto = $grupo_de_datos['tag_del_ptroyecto'];
$caracteristicas_proyecto = $grupo_de_datos['caracteristicas_proyecto'];
$terminaciones_repeater = $grupo_de_datos['terminaciones_repeater'];
$folleto = $grupo_de_datos['folleto'];
$caracteristica_personalizada = $grupo_de_datos['caracteristicas_personalizadas'];
$caracteristicas_complemento = $grupo_de_datos['caracteristicas_complemento'];
$caracteristicas_complemento_url = $grupo_de_datos['caracteristicas_complemento_url'];
$imagen_de_promocion_desktop = $banner_promocion['imagen_de_promocion_desktop'];
$imagen_de_promocion_mobile = $banner_promocion['imagen_de_promocion_mobile'];
$url_de_promocion = $banner_promocion['url_de_promocion'];
$id_planok = get_field( 'id_planok' );
$planok = get_field( 'plan_ok' );
$video = get_field( 'video' );
$imagen_video_portada = get_field( 'imagen_video_portada' );

// CUSTOM FLIELDS Imágenes Generales
$slider_proyecto = get_field('slider_proyecto');
$logo_proyecto = get_field('logo_proyecto');

// CUSTOM FLIELDS Arquitectura e Interiorismo
$arquitectura_interiorismo = get_field('arquitectura_interiorismo');
$slider_arquitectura = get_field('slider_arquitectura');

// CUSTOM FLIELDS Galerías
$repeater_galerias = get_field('repeater_galerias');

// CUSTOM FLIELDS Master Plan
$slider_master_plan = get_field('slider_master_plan');

// CUSTOM FLIELDS Ubicación y entorno
$descripcion_de_entorno = get_field('descripcion_de_entorno');
$mapa_de_ubicacion = get_field('mapa_de_ubicacion');
$mapa_de_ubicacion_mobile = get_field('mapa_de_ubicacion_mobile');
$gmaps = get_field('gmaps');
$waze = get_field('waze');

// CUSTOM FLIELDS 360º
$url_360 = get_field('url_360');
$text_360 = get_field('text_360'); 

$terms = wp_get_post_terms($post->ID, 'ubicaciones');
if (!empty($terms)) {
    foreach ($terms as $term) {
        $parent = $term->parent;
        $lugar = $term->name;
    }
}
?>
<?php if (have_rows('slider_proyecto')) : ?>
<section class="position-relative">
    <div class="master-carousel owl-carousel primary-hero">
        <?php while (have_rows('slider_proyecto')) : the_row();
            // vars
            $slider_proyecto_desktop = get_sub_field('slider_proyecto_desktop');
            $slider_proyecto_mobile = get_sub_field('slider_proyecto_mobile');
        ?>
        <div class="item project-hero position-relative">
            <!-- <div class="project-hero-left-overlay"></div> -->
            <div class="project-hero-right-overlay"></div>
            <picture>
                <source
                media="(max-width: 768px)"
                srcset="<?php echo $slider_proyecto_mobile['url'];?>">
                <img 
                alt="<?php echo $slider_proyecto_desktop['alt'];?>"
                src="<?php echo $slider_proyecto_desktop['url'];?>"
                loading="lazy"
                >
            </picture>
            <?php if ($imagen_de_promocion_desktop) : ?>
                <div class="d-none entrega-inmediata-container <?php echo ($theme === 'dark') ? '' : 'd-md-block';?>">
                    <a href="<?php echo $imagen_de_promocion_url; ?>" class="">
                        <img src="<?php echo $imagen_de_promocion_desktop['url'];?>" alt="<?php echo $imagen_de_promocion_desktop['alt'];?>" class="">
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <?php endwhile; ?>
    </div>
    <?php if ($theme === 'dark'): ?>
        <?php include( locate_template( './includes/templates/banner-proyecto-dark.php', false, false) ); ?>
    <?php else: ?>
        <?php include( locate_template( './includes/templates/banner-proyecto-light.php', false, false) ); ?>
    <?php endif; ?>
</section>
<?php endif; ?>

<?php if ($arquitectura_interiorismo) : ?>
<section class="container py-md-5">
    <div class="row py-5 align-items-center" id="proyecto">
        <div class="col-md-6">
            <?php if ($theme === 'dark'): ?>
            <h1 class="mb-5">
                <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="pr-4" style="max-height:100px">
                <div class="sr-only"><?php echo the_title(); ?></div>
            </h1>
            <?php endif; ?>
            <h3 class="text-uppercase section-title">
                <span class="primary-title">Arquitectura</span>
                <span class="secondary-title">& Interiorismo</span>
            </h3>
            <p class="pr-5" >
                <?php echo $arquitectura_interiorismo; ?>
            </p>
            <?php if ($terminaciones_repeater) : ?>
            <p class="pr-5" >
                <b>Los espacios y terminaciones que hacen la diferencia:</b>
            </p>
            <ul class="pl-4" style="list-style-type: disc !important;">
                <?php foreach ($terminaciones_repeater as $clave=>$terminaciones_item):?>
                <li><?php echo $terminaciones_item['terminaciones_item'];?></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if( $folleto ): ?>
                <a href="<?php echo $folleto; ?>" class="btn btn-secondary btn-sm bk--btn__primary shadow py-2 my-3 mr-4 text-capitalize" target="_blank">descargar folleto</a>
            <?php endif; ?>
            <a href="<?php echo site_url('/pasos-a-seguir') ?>" class="btn btn-primary btn-sm bk--btn__primary shadow py-2 my-3" target="_blank">Conocer Proceso de Compra</a>
        </div>
        <?php if ( $video ) : ?>
            <div class="col-md-6 d-none d-md-block">
                <div class="video-portada">
                    <a href="javascript:void();" class="item p-5 d-block playvideo" data-src="https://www.youtube.com/embed/<?php echo $video; ?>" data-toggle="modal" data-target="#homeVideo">
                        <img src="<?php echo $imagen_video_portada['url'];?>" alt="<?php echo $imagen_video_portada['alt'];?>" class="w-100">
                    </a>
                </div>
            </div>
        <?php else : ?>
            <?php if (have_rows('slider_arquitectura')) : ?>
            <div class="col-md-6 d-none d-md-block">
                <div class="arquitectura-carousel owl-carousel ">
                    <?php while (have_rows('slider_arquitectura')) : the_row();
                        // vars
                        $slider_arquitectura_desktop = get_sub_field('slider_arquitectura_desktop');
                    ?>
                    <div class="item p-5">
                        <img src="<?php echo $slider_arquitectura_desktop['url'];?>" alt="<?php echo $slider_arquitectura_desktop['alt'];?>" class="w-100">
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if ($caracteristicas_proyecto) : ?>
<section
    class="container-fluid mb-5 <?php if ($theme !== 'dark'): ?> bg-azul <?php else: ?> bg-theme-dark-emphasis-color <?php endif; ?>"
    style="<?php if ($theme !== 'dark'): ?>  background-image: url('<?php echo $slider_proyecto_desktop['url'];?>');<?php endif; ?>">
    <div class="container ">
        <div class="row py-5" id="caracteristicas">
            <div class="col-12 text-white">
                <h4 class="text-white text-uppercase text-center py-5">Los espacios que necesitas para <strong>la vida
                        de hoy</strong> </h4>
                <ul class="d-flex flex-wrap justify-content-center ">
                    <?php foreach ($caracteristicas_proyecto as $caracteristicas_proyect) : ?>
                        <li class="mx-md-4 text-center d-flex flex-column justify-content-between project-icons">
                            <div>
                                <img src="<?php bloginfo('template_directory');?>/assets/img/<?php echo $caracteristicas_proyect['value']; ?>.svg" alt="<?php echo $caracteristicas_proyect['label']; ?>">
                            </div>
                            <p class="py-2"><?php echo $caracteristicas_proyect['label']; ?></p>
                        </li>
                    <?php endforeach; ?>
                    <?php if($caracteristica_personalizada):
                        foreach ($caracteristica_personalizada as $item) : ?>
                        <li class="mx-md-4 text-center d-flex flex-column justify-content-between project-icons">
                            <div class="">
                                <img src="<?php echo $item['caracteristica_personalizada_imagen']['url']; ?>" alt="icono personalizado">
                            </div>
                            <p class="py-2"><?php echo $item['caracteristica_personalizada_texto']; ?></p>
                        </li>
                        <?php  endforeach; endif;?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>


<?php
    $localArgs = array(
        'post_type'          => 'plantas',
        'posts_per_page'    => -1,
        'post_status'        => 'publish',
        'meta_query' => array(
            array(
                'key' => 'vincular_planta_a_proyecto',
                'value' => '' . get_the_ID() . '',
                'compare' => '='
            )
        ),
        'meta_key'        => 'estado',
        'orderby' => array(
            'estado' => 'DESC',
            'title' => 'ASC',
        )
    );

    $apiArgs = array(
        'post_type'          => 'plantas_api',
        'posts_per_page'    => -1,
        'post_status'        => 'publish',
        'meta_query' => array(
            array(
                'key' => 'id_proyecto',
                'value' => '' . $id_planok . '',
                'compare' => '='
            )
        ),
        'orderby' => array(
            'estado' => 'DESC',
            'title' => 'ASC',
        )
    );

    $localQuery = $id_planok ? $apiArgs : $localArgs;

    $query = new WP_Query($localQuery);
if ($query->have_posts()) : ?>
<section class="container-fluid my-5 pt-5" id="plantas">
    <div class="container mt-5">
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="flex-wrapper d-flex justify-content-between alig-items-center">
                    <div class="wrapper-only">
                        <h3 class="text-uppercase section-title"><span class="primary-title">Plantas</span></h3>
                    </div>
                    <ul class="filter_list text-uppercase d-none d-md-flex justify-content-center align-items-end">
                        <li class="mr-2"><a id="todo" class="filter_list_item active btn btn-sm btn-primary">Todas</a>
                        </li>
                        <li class="mr-2"><a id="estudio" class="filter_list_item btn btn-sm btn-secondary">Estudio</a>
                        </li>
                        <li class="mr-2"><a id="1dorm" class="filter_list_item btn btn-sm btn-secondary">1 Dorm</a></li>
                        <li class="mr-2"><a id="2dorm" class="filter_list_item btn btn-sm btn-secondary">2 Dorm</a></li>
                        <li class="mr-2"><a id="3dorm" class="filter_list_item btn btn-sm btn-secondary">3 Dorm</a></li>
                        <li class="mr-2"><a id="4dorm" class="filter_list_item btn btn-sm btn-secondary">4 o más</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row">
            <?php while ($query->have_posts()) : $query->the_post();

                    $estado = get_field('estado');
                    $texto_titulo = get_field('texto_titulo');

                    $post_id = get_the_ID();
                    $superficie_total = get_field('superficie_total');
                    $cantidad_de_banos = get_field('cantidad_de_banos');

                    $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                    $value = $dormitorios_para_filtrar['value'];
                    $label = $dormitorios_para_filtrar['choices'][$value];

                    $fotografia_planta = get_field('repeater_fotografias');
                    $fotografia_planta_mobile = $fotografia_planta[0]['fotografia_planta']['url'];
                    $ficha_planta = get_field('ficha');
                ?>

            <div class="col-sm-6 col-lg-4 planta <?php echo $value; ?> <?php // echo ($estado == 'Normal') ? "active" : "";?> active">
                <?php //if ($estado == 'Normal') : ?>

                    <a
                        href="<?php echo ($planok && !$id_planok) ? "#": the_permalink(); ?>"
                        class="<?php echo ($planok && !$id_planok) ? 'cotizacionHit' : '' ?>"
                        <?php echo ($planok && !$id_planok) ? 'data-toggle="modal" data-target="#planok-modal"' : '';?>
                    >

                        <div class="planta-item d-block text-center shadow ">

                            <h3 class="d-none p-3 text-uppercase mb-2 <?php echo ($estado == 'Normal') ? "bg-secondary text-white " : "bg-grey" ?>">
                                <?php echo the_title(); ?>
                            </h3>

                            <div class="bk-info-wrap  mb-5 card rounded-0">
                                <p class="pt-4 m-0 text-center" style="font-size:1rem;">
                                    <b><?php echo esc_html($label); ?> +</b>
                                    <b><?php echo $cantidad_de_banos; echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                                    </b>
                                    <?php // echo $post_id; ?>
                                </p>
                                
                                <?php if ($fotografia_planta) : ?>
                                    <div style="overflow: hidden;position: relative;">
                                        <?php if ($estado == 'Agotado') : ?>
                                        <div class="img-overlay" style="filter: grayscale(1) opacity(50%); position:absolute; width:100%;height:100%;background:#fff"></div>
                                        <?php endif;?>
                                        <img class="m-auto pb-4 fotografia-planta <?php echo ($estado == 'Normal') ? "" : "img-overlay" ?>"
                                            src="<?php echo $fotografia_planta[0]['fotografia_planta']['sizes']['medium']; ?>"
                                            alt="<?php echo $row['fotografia_planta']['name']; ?>">
                                    </div>
                                <?php else :
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
                                 ?>
                                    <div style="overflow: hidden;position: relative;">
                                        <img class="m-auto pb-4 fotografia-planta"
                                            src="<?php echo $thumb ? $thumb[0] : bloginfo('template_directory') . '/assets/img/no-image.jpg';?>"
                                            data-test="<?php echo json_encode($thumb);?>"
                                        >
                                    </div>
                                <?php endif; ?>

                                <ul class="d-flex py-3 m-0 border-right-0 border-left-0 align-items-center justify-content-center" style="border-bottom:1px solid #D3D3D3;">
                                    <li class="d-none">
                                        <img src="<?php bloginfo('template_directory');?>/assets/img/bedIcon.png" alt="Dormitorios"
                                            style="max-width:26px">
                                        <small><?php echo esc_html($label); ?></small>
                                    </li>
                                    <li class="d-none">
                                        <img src="<?php bloginfo('template_directory');?>/assets/img/batIcon.png" alt="Baños"
                                            style="max-width:24px">
                                        <small><?php echo $cantidad_de_banos;
                                                    echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                                        </small>
                                    </li>
                                    <li class="">
                                        <p style="font-size:1rem"><img
                                                src="<?php bloginfo('template_directory');?>/assets/img/areaIcon.png" alt="Area"
                                                style="max-width:22px">
                                            <span class="pl-2">Sup. Total</span> <b><?php echo $superficie_total; ?> m<sup>2</sup></b> apróx.
                                        </p>
                                    </li>
                                </ul>

                                <ul class="d-flex justify-content-between align-items-center py-3 m-0" style="background:#F6F8FA">
                                    <li class="m-auto">
                                        <?php if ($estado == 'Normal') : ?>
                                            <?php if ($planok) : ?>
                                                <a class="btn btn-primary px-4 text-uppercase" data-toggle="modal" data-target="#planok-modal">Cotizar</a>
                                            <?php else:?>
                                                <a href="<?php echo the_permalink(); ?>" class="btn btn-primary px-4 text-uppercase">Cotizar</a>
                                            <?php endif;?>
                                        <?php else : ?>
                                            <a href="<?php echo the_permalink(); ?>" class="btn btn-primary px-4 text-uppercase">Cotizar</a>
                                        <?php endif; ?>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </a>
                <?php //endif; ?>
            </div>

            <?php endwhile;
                wp_reset_postdata(); ?>
        </div>
    </div>
</section>
<?php endif; ?>


<?php if (have_rows('repeater_galerias')) : 
    $counter = 1; 
?>
<div class="py-5" id="galeria">
    <div class="container mb-5">
        <div class="row mt-5" >
            <div class="col-sm-12">
                <div class="flex-wrapper d-md-flex justify-content-between alig-items-center">
                    <div class="wrapper-only">
                        <h3 class="text-uppercase section-title"><span class="primary-title">Galería</span></h3>
                    </div>
                    <ul class="nav nav-tabs border-0 text-uppercase" id="galleryTab" role="tablist">
                    <?php while (have_rows('repeater_galerias')) : the_row();
                    // vars
                    $tipo_de_galeria = get_sub_field('tipo_de_galeria');
                    $destacado = get_sub_field('destacado');
                    $icono = get_sub_field('icono');
                    ?>
                        <li class="tab-item mr-2 mb-2 mx-md-2">
                            <a class="btn btn-sm btn-secondary" style="<?php echo $destacado ? 'background-color: tomato !important;' : ''; ?>" id="edificio-<?php echo $counter; ?>-tab" data-toggle="tab" href="#edificio-<?php echo $counter; ?>" role="tab" aria-controls="edificio-<?php echo $counter; ?>" aria-selected="true" >
                                <?php echo $icono ? $icono.' ' : ''; ?><?php echo $tipo_de_galeria;?>
                            </a>
                        </li>

                    <?php $counter++;
                    endwhile; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if (have_rows('repeater_galerias')) : 
    $counter2 = 1; 
?>
<div class="tab-content" id="galleryTabContent" >
    <?php while (have_rows('repeater_galerias')) : the_row(); 
    
    $tipo_de_modulo = get_sub_field('tipo_de_modulo');
    $url_360 = get_sub_field('url_360');
    $youtube_video_id = get_sub_field('youtube_video_id');
    //echo $tipo_de_modulo ;
    //print_r($tipo_de_modulo);
    if ($tipo_de_modulo === '360'):
    ?>
    <div class="tab-pane fade" id="edificio-<?php echo $counter2;?>" role="tabpanel" aria-labelledby="edificio-<?php echo $counter2;?>-tab" style="position:relative;">
        <iframe <?php echo (is_single(128)) ? 'scrolling="no" style="overflow:hidden;"' : '';?> width="100%" height="522"
                src="<?php echo $url_360; ?>" frameborder="0" allowfullscreen=""></iframe>
    </div>
    <?php endif; ?>
    <?php if ($tipo_de_modulo === 'youtube'): ?>
        <div class="tab-pane fade" id="edificio-<?php echo $counter2;?>" role="tabpanel" aria-labelledby="edificio-<?php echo $counter2;?>-tab" style="position:relative;">
            <div id="video-<?php echo get_row_index(). '-' . the_title();?>" class="video-wrapper container">
                <figure
                    class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio m-0">
                    <div class="wp-block-embed__wrapper">
                        <iframe
                            id="myVideo"
                            class="<?php echo (is_numeric($youtube_video_id)) ? 'vimeo' : 'youtube' ;?> w-100 "
                            title="Embed video Flora"
                            width="500"
                            height="522"
                            src="<?php echo (is_numeric($youtube_video_id)) ? 'https://player.vimeo.com/video/'.$youtube_video_id.'?title=&portrait=0autoplay=1' : 'https://www.youtube.com/embed/'.$youtube_video_id.'?feature=oembed&enablejsapi=1&enablejsapi=1' ;?>"
                            frameborder="0"
                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen="">
                        </iframe>
                    </div>
                </figure>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($tipo_de_modulo === 'slider'): ?>
        <?php if (have_rows('slider_galerias')) : ?>
            <div class="tab-pane fade" id="edificio-<?php echo $counter2;?>" role="tabpanel" aria-labelledby="edificio-<?php echo $counter2;?>-tab" style="position:relative;">
                <div class="owl-carousel owl-theme  gallery-caarousel">
                    <?php while (have_rows('slider_galerias')) : the_row();
                    // vars
                    $slider_galerias_desktop = get_sub_field('slider_galerias_desktop');
                    $etiqueta_imagen= get_sub_field('etiqueta_imagen');
                    ?>
                    <div class="item">
                        <a href="<?php echo esc_url($slider_galerias_desktop['url']); ?>" data-fancybox="edificio-<?php echo $counter2;?>">
                            <img src="<?php echo $slider_galerias_desktop['url'];?>" alt="<?php echo $slider_galerias_desktop['alt'];?>">
                        </a>
                        <p class=" m-0 pl-4"><b><?php echo $etiqueta_imagen;?></b></p>
                    </div>

                    <?php endwhile; ?>
                </div>
                <div class="gallery-overlay"></div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <?php $counter2++; endwhile; ?>
    </div>
</div>
<?php endif; ?>

<?php if (have_rows('slider_master_plan')) : 
    $counter3 = 1;?>
<div class="pt-5" id="masterPlan">
    <div class="container-fluid">
        <div class="container">
            <div class="row" >
                <div class="col-12">
                    <div class="flex-wrapper d-md-flex justify-content-between alig-items-center">
                        <div class="wrapper-only">
                            <h3 class="text-uppercase section-title">
                                <span class="primary-title">Master</span><br><span class="secondary-title">Plan</span>
                            </h3>
                        </div>
                        <ul class="nav nav-tabs border-0 text-uppercase" id="masterPlanTab" role="tablist">
                        <?php while (have_rows('slider_master_plan')) : the_row();
                        // vars
                        $slider_master_plan_titulo = get_sub_field('slider_master_plan_titulo');
                        ?>
                            <li class="tab-item mr-2 mb-2 mx-md-2">
                                <a class="btn btn-sm btn-secondary" id="plan-<?php echo $counter3; ?>-tab" data-toggle="tab" href="#plan-<?php echo $counter3; ?>" role="tab" aria-controls="plan-<?php echo $counter3; ?>" aria-selected="true"><?php echo $slider_master_plan_titulo;?></a>
                            </li>

                        <?php $counter3++; endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if (have_rows('slider_master_plan')) : 
    $counter4 = 1;
    $counter5 = 1;
?>
<div class="container-fluid bg-medio-azul px-0 pt-3 pb-4 mb-5">
    <div class="container-md p-0 p-md-4 tab-content mt-2">
        <?php while (have_rows('slider_master_plan')) : the_row();
            // vars
            $slider_master_plan_desktop = get_sub_field('slider_master_plan_desktop');
            $slider_master_plan_detalle = get_sub_field('slider_master_plan_detalle');
            $slider_master_plan_titulo = get_sub_field('slider_master_plan_titulo');
            $items = get_sub_field('items');
        ?>
        <div class="tab-pane fade" id="plan-<?php echo $counter4;?>" role="tabpanel" aria-labelledby="plan-<?php echo $counter4;?>-tab" style="position:relative;">
            <div class="shadow bg-white p-md-5">
                <h5 class="ml-auto  p-2 py-md-4 color-primary text-uppercase font-weight-bold"><?php echo $slider_master_plan_titulo;?></h5>
                <a href="<?php echo esc_url($slider_master_plan_detalle['url']); ?>" data-fancybox="gallery">
                    <img src="<?php echo $slider_master_plan_desktop['url'];?>" alt="<?php echo $slider_master_plan_desktop['alt'];?>" class="w-100">
                </a>
                <?php if ($items): ?>
                <ul class="d-flex flex-wrap flex-row justify-content-center py-2 m-2">
                    <?php 
                    foreach( $items as $clave=>$valor ) {
                        echo '<li class="d-flex align-items-center my-2 master-plan-bullets">';
                        echo '<span class="mp-list-bg"> <span class="mp-list-number">'.($clave + 1).'</span></span>';
                        echo '<span class="mp-list-text">'.$valor['item_title'].'</span>';
                        echo '</li>';
                    }
                    ?>
                </ul>
                <?php endif;?>
            </div>
        </div>
        <?php $counter4++; endwhile; ?>
    </div>
    <div class="container">
        <ul class="nav nav-tabs border-0 text-uppercase planB-tab" id="masterPlanTab2" role="tablist">
        <?php while (have_rows('slider_master_plan')) : the_row();?>
            <li class="tab-item mx-md-2">
                <a class="p-2 planB-tab-item" id="planB-<?php echo $counter5; ?>-tab" data-toggle="tab" href="#plan-<?php echo $counter5; ?>" role="tab" aria-controls="plan-<?php echo $counter5; ?>" aria-selected="true">
                <?php echo $counter5 === 1 ? '<span aria-label="Next">‹</span>': '<span aria-label="Next">›</span>';?>
                </a>
            </li>

        <?php $counter5++; endwhile; ?>
        </ul>
        
    </div>
</div>
<?php endif; ?>


<?php if ( ($descripcion_de_entorno and $gmaps) || ($descripcion_de_entorno and $mapa_de_ubicacion) ) : ?>
<section class="container-fluid <?php if ($theme !== 'dark'): ?>bg-white<?php else:?>bg-dark-grey<?php endif;?>">
    <div class="row align-items-stretch shadow" id="ubicacion">
        <div class="col-lg-4 offset-xl-2 py-5 d-md-flex align-items-center">
            <div class="mt-xl-5 max-w-480">
                <div class="wrapper-only">
                    <h3 class="text-uppercase section-title"><span class="primary-title">Ubicación</span><br><span
                            class="secondary-title">Y Entorno</span></h3>
                </div>
                <div class="pr-5">
                    <?php echo $descripcion_de_entorno; ?>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xl-6" class="map-column">
            <?php if ($mapa_de_ubicacion) : ?>
            <div class="mapImg mapItem mapActive">
                <picture>
                    <source media="(max-width: 768px)"
                        srcset="<?php echo $mapa_de_ubicacion_mobile ? $mapa_de_ubicacion_mobile['url'] : $mapa_de_ubicacion['url'];?>">
                    <img class="w-100" src="<?php echo $mapa_de_ubicacion['url'];?>" alt="Mapa" class="w-100">
                </picture>
            </div>
            <?php endif; ?>
            <?php if ($gmaps) : ?>
            <div class="projectMap mapItem <?php echo $mapa_de_ubicacion ? '' : 'mapActive';?>">
                <iframe class="w-100"
                    src="<?php echo $gmaps;?>"
                    frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0" heitht="660"></iframe>
            </div>
            <?php endif; ?>
            <?php if ($waze) : ?>
            <div class="btns-map">
                <a href="<?php echo $waze;?>" class="btn btn-secondary mr-3 d-md-none" target="_blank">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/waze.png" alt="Waze" class="mr-3" style="max-height:18px"> 
                    waze
                </a>
                <a href="#" class="btn btn-secondary ml-4 changeMapButton"><img
                        src="<?php bloginfo('template_directory');?>/assets/img/gmaps.png" alt="google maps"
                        class="mr-3" style="max-height:20px"><span class="changeMapButtonSpan">maps</span></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
include( locate_template( './includes/templates/banner-pasos.php', false, false) ); 
?>

<?php endif; ?>
<?php if($whatsapp || $correos_ventas): ?>
<section class="d-none d-lg-block contact-floating-container">
    <ul class="contact-floating-list px-2 d-flex flex-column justify-content-between align-items-center">
        <?php if($whatsapp): ?>
            <li class="contact-floating-whatsapp">
                <a href="#" class="contact-floating-link whatsappButton">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($correos_ventas): ?>
            <li class="contact-floating-form">
                <a href="#" class="contact-floating-link contactFloatingForm">
                    <i class="far fa-envelope"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</section>
<?php 
include( locate_template( './includes/templates/whatsapp-modal.php', false, false) );
?>
<div class="form-modal bg-white">
    <div class="p-5">
        <div class="form-modal-header">
            <ul class="d-flex align-items-center w-100 justify-content-between">
                <li>
                    <h2>Consulta a ventas</h2>
                </li>
                <li>
                    <a href="#" id="formModalClose">
                        <h2>
                            <span aria-hidden="true">&times;</span>
                        </h2>
                    </a>
                </li>
            </ul>
        </div>
        <?php get_template_part('includes/forms/form-proyecto'); ?>
    </div>
</div>
<?php endif;?>
<section class="d-none d-lg-block contact-floating-container social-fixed-container">
        <ul class="social-fixed-list">
            <li class="social-fixed-item">
                <a target="_blank" href="https://www.instagram.com/inmobiliariabrick/" class="social-fixed-link">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <li class="social-fixed-item">
                <a target="_blank" href="https://www.facebook.com/BRICK-Inmobiliaria-100180791917908" class="social-fixed-link">
                    <i class="fab fa-facebook"></i>
                </a>
            </li>
            <li class="social-fixed-item">
                <a target="_blank" href="https://www.youtube.com/channel/UCnUmucW8Jm1T--NaiDIw_DQ" class="social-fixed-link">
                    <i class="fab fa-youtube"></i>
                </a>
            </li>
        </ul>
</section>
<section class="contact-mobile d-lg-none">
    <ul class="contact-mobile-list  d-flex align-items-center justify-content-between px-5">
        <li class="contact-mobile-item">
            <a target="_blank" href="https://www.instagram.com/inmobiliariabrick/" class="contact-mobile-link social-fixed-link">
                <i class="fab fa-instagram"></i>
            </a>
        </li>
        <li class="contact-mobile-item">
            <a target="_blank" href="https://www.facebook.com/BRICK-Inmobiliaria-100180791917908" class="contact-mobile-link social-fixed-link">
                <i class="fab fa-facebook"></i>
            </a>
        </li>
        <li class="contact-mobile-item">
            <a target="_blank" href="https://www.youtube.com/channel/UCnUmucW8Jm1T--NaiDIw_DQ" class="contact-mobile-link social-fixed-link">
                <i class="fab fa-youtube"></i>
            </a>
        </li>
        <?php if($whatsapp): ?>
            <li class="contact-mobile-item contact-floating-whatsapp">
                <a href="#" class="contact-mobile-link contact-floating-link whatsappButton">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if ($correos_ventas): ?>
            <li class="contact-mobile-item contact-floating-form">
                <a href="#" class="contact-mobile-link contact-floating-link contactFloatingForm">
                    <i class="far fa-envelope"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</section>
<?php if ($id_planOk || $planok) : ?>
<div class="modal fade" id="planok-modal" tabindex="-1" role="dialog" aria-labelledby="planok-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen" role="document">
        <div class="modal-content <?php echo $id_planOk ? 'modal-fullscreen-content' : ''; ?>">
        <?php if ($planok) : ?>
            <div class="modal-header mb-4">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <iframe style="width:100%;height:660px" src="<?php echo $planok; ?>" frameborder="0"></iframe>
        <?php else: ?>
            <div class="modal-header mb-4 w-100 bg-white shadow py-0">
                <div class="w-100">
                    <nav class="bg-white py-3 " id="plantasMenu">
                        <div class="container">
                            <div class="d-flex justify-content-between align-items-center">
                            <a href="<?php echo get_permalink($vincular_planta_a_proyecto); ?>#plantas" class="plantaModalPlanOkClose">
                                <img src="<?php bloginfo('template_directory');?>/assets/img/logo-brick-2024.svg" alt="Inmobiliaria Brick" width="150" class="primary-logo">
                            </a>
                            <ul class="text-uppercase d-md-flex align-items-center m-0 w-100 justify-content-end text-center text-md-left main-menu">
                                <li class="mr-md-5  d-none">
                                    <a href="#" id="verMasModelos" class="plantaModalPlanOkClose btn btn-primary btn-sm bk--btn__primary shadow" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    Ver más modelos
                                    </a>
                                </li>
                                <li class="mr-md-5 my-md-0">
                                    <a href="<?php echo get_permalink($vincular_planta_a_proyecto); ?>#plantas" class="plantaModalPlanOkClose btn btn-secondary btn-sm bk--btn__primary shadow">
                                    Volver
                                    </a>
                                </li>
                                <li class="mr-md-5 d-none d-md-block">
                                    <img src="<?php echo $logo_proyecto['url'];?>" alt="Inmobiliaria Brick" style="max-height:40px">
                                </li>
                            </ul>

                    </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label class="label" for="inputNameCotizar">Nombre y apellido</label>
                            <input type="text" class="form-control" id="inputNameCotizar" name="inputNameCotizar" required>
                            </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label class="label" for="inputNameCotizar">Nombre y apellido</label>
                            <input type="text" class="form-control" id="inputNameCotizar" name="inputNameCotizar" required>
                        </div>
                    </nav >
                </div>
            </div>
            <div class="container-fluid px-4 pb-4 mt-5">
                <div class="row align-items-stretch">
                    <div class="col-12" id="plantasLoader">
                        <div class="p-5 m-5 d-flex justify-content-center align-items-center">
                            <div class="loader"></div>
                        </div>
                    </div>
                    <div class="col-12" id="plantasError">
                        <div class="text-center">
                            <img src="<?php echo bloginfo('template_directory');?>/assets/img/404.png" alt="Contenido no encontrado" class="img-404">
                        </div>
                    </div>
                    <div class="col-lg-4 p-0 plantasContent">
                        <div class="d-flex align-items-center justify-content-center">
                            <a id="plantaModalPlanOklink" class="gridItemH1" href="data:image/jpeg;base64,<?php echo $finalImage; ?>" data-fancybox="gallery">
                                <img id="plantaModalPlanOkImg" class="w-100" src="data:image/jpeg;base64,<?php echo $finalImage; ?>" alt="Modelo Image">
                            </a>
                        </div>
                        <p class="pt-5 text-center">
                            <img src="<?php bloginfo('template_directory');?>/assets/img/zoom.png" alt="zoom" style="max-height:20px" />
                            <small>Haz click en la imagen para ampliar</small>
                        </p>
                        <p>
                            <small>Las imágenes, textos y contenidos en este sitio fueron elaborados con fines ilustrativos y no constituyen necesariamente una representación exacta de la realidad. Su objetivo es mostrar una caracterización general del proyecto y no cada uno de sus detalles. Verifique las especificaciones de su departamento al momento de comprar. Esto se informa en virtud de lo señalado en la Ley N°19.496 y según la Ley N°21.014, y DDU 361 de fecha 16 de junio de 2017.</small>
                        </p>
                    </div>
                    <div class="col-lg-4 plantasContent">
                        <div class="mx-lg-4">
                            <div class="mb-4">
                                <h3 class="d-none"><span id="plantaModalPlanOkTipo"></span></span></h3>
                                <h2 class="pb-5"><b id="plantaModalPlanOkPrograma" class="plantas-info-title"></b></h2>
                            </div>

                            <p class="mb-4">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/bedIcon.png" alt="Dormitorios" style="max-width:24px"> 
                                <span class="px-2"><b id="plantaModalRoom"></b></span>
                            </p>
                            <p class="mb-4">
                                <img src="<?php bloginfo('template_directory'); ?>/assets/img/batIcon.png" alt="Baños" style="max-width:24px">
                                <span class="px-2"><b id="plantaModalBatRoom"></b></span>
                            </p>

                            <p class="pt-4"><b style="font-size:1rem">Superficies:</b></p>

                            <div class="content-table">
                                <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                                    <li>Útil:</li>
                                    <li class="ml-auto"><span id="plantaModalPlanOkUtil"></span></li>
                                    <li class="pl-1"><span class="mr-2">m<sup>2</sup></span></li>
                                </ul>
                                <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                                    <li>Terraza:</li>
                                    <li class="ml-auto"><span id="plantaModalPlanOkTerraza"></span></li>
                                    <li class="pl-1"><span class="pr-2">m<sup>2</sup></span></li>
                                </ul>
                                <ul class="d-flex justify-content-between w-100 " style="font-size:1rem;border-top:1px solid grey">
                                    <li><b>Total:</b></li>
                                    <li class="ml-auto"><span><b id="plantaModalPlanOkTotal"></b></span></li>
                                    <li class="pl-1"><span class=""><b class="pr-2">m<sup>2</sup></b></span></li>
                                </ul>
                            </div>

                            <div class="mt-5">
                                <a href="#" id="plantaModalPlanOkDownload" class="btn btn-primary text-uppercase">Descargar Ficha de Planta</a>
                            </div>
                            <div class="mt-md-4 d-none">
                                <span><small>Corresponde a </small><small id="plantaModalPlanOkUnidad"></small></span>
                    </div>
                    </div>
                </form>
                            </div>
                </form>
                        </div>
                    </div>
                    <div class="col-lg-4 plantasContent">
                        <h3 class="pb-2"><span class="plantas-info-title">Escríbenos y recibirás tu cotización por email</span></h3>
                        <?php get_template_part('includes/forms/form-planta'); ?>
                    </div>
                </div>
            </div>
            <footer class="container-fluid py-5 bg-secondary-color text-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-12">
                            <ul class="d-md-flex align-items-center justify-content-between text-center text-md-left text-uppercase footer-menu w-100">
                                <li class=" pr-md-5">
                                    <a href="<?php echo site_url();?>">
                                        <img src="<?php bloginfo('template_directory');?>/assets/img/footer-logo.svg" height="100" width="150" alt="Brick Inmobiliaria" class="primary-logo">
                                    </a>
                                </li>
                                
                                <li class="d-none d-md-block"><a href="<?php echo site_url('residencial');?>" class="text-white">Residencial</a></li>
                                <li class="d-none d-md-block"><a href="<?php echo site_url('comercial');?>" class="text-white">Comercial</a></li>
                                <li class="d-none d-md-block"><a href="<?php echo site_url('bodegas');?>" class="text-white">Bodegas</a></li>
                                <li class="d-none d-md-block"><a href="<?php echo site_url('usa');?>" class="text-white">USA</a></li>
                                <li class="d-none d-md-block"><a href="<?php echo site_url('pasa-el-dato-y-gana');?>" class="text-white">Referidos</a></li>
                                <li class="d-none d-md-block"><a href="<?php echo site_url('somos-brick');?>" class="text-white">Somos Brick</a></li>
                                <li class="d-none d-md-block"><a href="#" class="text-white contactoModalBtn">Contáctanos</a></li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row align-items-center text-center">
                        <div class="col-sm-12 pt-2">
                            <ul class="d-md-flex w-100 m-0 justify-content-between">
                                <li>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-2">
                                            <a href="https://www.instagram.com/inmobiliariabrick/" target="_blank" class=" text-white">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li class="mr-2">
                                            <a href="https://www.facebook.com/BRICK-Inmobiliaria-100180791917908" target="_blank" class=" text-white">
                                                <i class="fab fa-facebook-square"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <span>Síguenos</span>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <p><a class="text-white" href="tel:+56233234100"><i class="fas fa-mobile-alt"></i> +562 3323 4100</a></p>
                                </li>
                                <li>
                                    <p><a class="text-white" href="mailto:contacto@ibrick.cl"><i class="far fa-envelope"></i> contacto@ibrick.cl</a></p>
                                </li>
                                <li>
                                    <p><a class="text-white" href="https://goo.gl/maps/W5hF3kUTZL2CTce3A"><img src="<?php bloginfo('template_directory');?>/assets/img/markerIcon.svg" alt="Ubicación" style="max-height:20px;"> Américo Vespucio Norte 1090 of. 403, Vitacura, Santiago </a></p>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="d-md-flex justify-content-between text-center text-md-left">
                                <p class="footer-legal-text"><small>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>">Brick Inmobiliaria</a>. Todos los derechos reservados. </small></p>
                                <p class="footer-legal-text"><a href="https://www.zinker.cl/" target="_blank"><small>Desarrollado por <b>Zinker</b></small></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        <?php endif;?>
        </div>
    </div>
</div>
<?php endif;?>
<?php if ($video) : ?>
<div class="modal fade" id="homeVideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <!-- <button type="button" class="btn btn-default pausevideo" data-dismiss="modal" >Cerrar X</button> -->
        <div class="embed-responsive embed-responsive-16by9 " id="content-video">
            <iframe class="embed-responsive-item content-video" src="" id="video"  allowscriptaccess="always" allow="autoplay" style="background: #E5EFF1"></iframe>
            </div>
        </div>
    </div>
</div>
<?php endif;?>
<?php
bk_main_after();
get_template_part('includes/footer');
?>