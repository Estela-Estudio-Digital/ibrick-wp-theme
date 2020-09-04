<?php
get_template_part('includes/header');
bk_main_before();

$tiene_contenidos = get_field('tiene_contenidos');

// CUSTOM FLIELDS Descripciones
$grupo_de_datos = get_field('grupo_de_datos');
$ubicacion = $grupo_de_datos['ubicacion'];
$precio_desde = $grupo_de_datos['precio_desde'];
$tipologia_txt = $grupo_de_datos['tipologia_txt'];
$legal = $grupo_de_datos['legal'];
$whatsapp = $grupo_de_datos['whatsapp'];
$tag_del_ptroyecto = $grupo_de_datos['tag_del_ptroyecto'];
$caracteristicas_proyecto = $grupo_de_datos['caracteristicas_proyecto'];

// CUSTOM FLIELDS Imágenes Generales
$slider_proyecto = get_field('slider_proyecto');
$logo_proyecto = get_field('logo_proyecto');
$tipologia_wincha = get_field('tipologia_wincha');

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

$terms = wp_get_post_terms($post->ID, 'ubicaciones');
if (!empty($terms)) {
    foreach ($terms as $term) {
        $parent = $term->parent;
        $lugar = $term->name;
    }
}
?>

<ul class="follow-button-pay bg-white shadow">
    <li class="pr-3">
        <a href="#" class="contactoModalBtn btn btn-secondary btn-sm bk--btn__primary shadow py-2">
            <i class="far fa-envelope"></i> 
            Contáctanos
        </a>
    </li>
    <li class="pr-3">
        <a href="#" class="btn btn-emphasis btn-sm bk--btn__primary shadow py-2">
            <i class="far fa-calendar-alt"></i>
            Agendar Visita
        </a>
    </li>
    <?php if($whatsapp): ?>
    <li class="">
        <a href="https://wa.me/<?php echo $whatsapp;?>" target="_blank">
            <img src="<?php bloginfo('template_directory');?>/assets/img/whatsappAmarillo.svg" alt="whatsapp" style="max-height:40px">
        </a>
    </li>
    <?php endif; ?>
</ul>
<?php if (have_rows('slider_proyecto')) : ?>
<section class="master-carousel owl-carousel primary-hero">
    <?php while (have_rows('slider_proyecto')) : the_row();
        // vars
        $slider_proyecto_desktop = get_sub_field('slider_proyecto_desktop');
        $slider_proyecto_mobile = get_sub_field('slider_proyecto_mobile');
    ?>
    <div class="item project-hero">
        <img src="<?php echo $slider_proyecto_desktop['url'];?>" alt="<?php echo $slider_proyecto_desktop['alt'];?>">
    </div>
    <?php endwhile; ?>
</section>
<?php endif; ?>

<div class="container" style="position: relative; margin-top:-50px;z-index:4;">
    <div class="row mb-4">
        <div class="<?php echo ($caracteristicas_proyecto) ? "col-8" : "col-12";?> bg-white shadow mb-3">
            <ul class="projec-wrapper-content d-flex justify-content-around align-items-stretch m-0 mb-2 pt-3">
                <?php if ($logo_proyecto):?>
                <li class="projec-wrapper-content-img d-flex align-items-center justify-content-center ml-4">
                    <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="pr-4" style="max-height: 50px;">
                </li>
                <?php endif; ?>
                <?php if ($ubicacion):?>
                <li class="projec-wrapper-content-ubicacion d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <i class="fas fa-map-marker-alt"></i> <br>
                        <p class="px-3"><?php echo $ubicacion;?></p>
                    </div>
                </li>
                <?php endif; ?>
                <?php if ($tipologia_wincha):?>
                <li class="projec-wrapper-content-tipo d-flex align-items-center justify-content-center">
                    <div>
                        <img src="<?php echo $tipologia_wincha['url']; ?>" alt="<?php echo $tipologia_wincha['alt']; ?>">
                    </div>
                </li>
                <?php endif; ?>
                <?php if ($precio_desde):?>
                <li class="projec-wrapper-content-precio d-flex align-items-center justify-content-center">
                    <div>
                        <p class="m-0">Precio desde</p>
                        <h4><b><?php echo $precio_desde;?></b></h4>
                    </div>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <?php if ($caracteristicas_proyecto) : ?>
        <div class="col-4">
            <ul class="owl-carousel project-carousel d-none d-md-flex justify-content-around m-0">
                <?php foreach ($caracteristicas_proyecto as $caracteristicas_proyect) : ?>
                    <li class="project-carousel--item mx-3 align-items-center d-flex flex-column justify-content-between">
                        <div class="pt-3">
                            <img src="<?php bloginfo('template_directory');?>/assets/img/<?php echo $caracteristicas_proyect['value']; ?>.svg" alt="<?php echo $caracteristicas_proyect['label']; ?>">
                        </div>
                        <p class="m-0 py-2"><?php echo $caracteristicas_proyect['label']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php if ($arquitectura_interiorismo) : ?>
<section class="container py-md-5">
    <div class="row py-5 align-items-center" id="proyecto">
        <div class="col-md-6">
            <h3 class="text-uppercase section-title"><span class="primary-title">Arquitectura</span><br><span
                    class="secondary-title">& Interiorismo</span></h3>
            <p class="pr-5" >
                <?php echo $arquitectura_interiorismo; ?>
            </p>
        </div>
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
    </div>
</section>
<?php endif; ?>

<?php if ($caracteristicas_proyecto) : ?>
<section class="container-fluid bg-azul mb-5">
    <div class="container ">
        <div class="row py-5" id="caracteristicas">
            <div class="col-12 text-white">
                <h4 class="text-white text-uppercase text-center py-5">Los espacios que necesitas para <strong>la vida
                        de hoy</strong> </h4>
                <ul class="d-none d-md-flex justify-content-around ">
                    <?php foreach ($caracteristicas_proyecto as $caracteristicas_proyect) : ?>
                        <li class="mx-4 text-center d-flex flex-column justify-content-between">
                            <div>
                                <img src="<?php bloginfo('template_directory');?>/assets/img/<?php echo $caracteristicas_proyect['value']; ?>.svg" alt="<?php echo $caracteristicas_proyect['label']; ?>">
                            </div>
                            <p class="py-2"><?php echo $caracteristicas_proyect['label']; ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<?php $query = new WP_Query(array(
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
));
if ($query->have_posts()) : ?>
<section class="container-fluid my-5 pt-5">
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
                <select class="form-control d-none" id="selectPlantasFilter">
                    <option value="todo">Todas</option>
                    <option value="estudio">Estudio</option>
                    <option value="1dorm">1 Dormitorio</option>
                    <option value="2dorm">2 Dormitorios</option>
                </select>
            </div>
        </div>
    </div>
</section>
<section id="plantas" class="container pb-5">
    <div class="row">
        <?php while ($query->have_posts()) : $query->the_post();

                $estado = get_field('estado');

                $post_id = get_the_ID();
                $superficie_total = get_field('superficie_total');
                $cantidad_de_banos = get_field('cantidad_de_banos');

                $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                $value = $dormitorios_para_filtrar['value'];
                $label = $dormitorios_para_filtrar['choices'][$value];

                $fotografia_planta = get_field('repeater_fotografias');
                $fotografia_planta_mobile = $fotografia_planta[0]['fotografia_planta']['url'];

            ?>

        <div
            class="col-sm-6 col-lg-4 planta <?php echo $value; ?> <?php echo ($estado == 'Normal') ? "active" : ""; if ( wp_is_mobile() ){echo ($estado == 'Normal') ? " " : "d-none";} ?>">
            <div class="planta-item d-block text-center shadow ">

                <h3 class="d-none p-3 text-uppercase mb-2 <?php echo ($estado == 'Normal') ? "bg-secondary text-white " : "bg-grey" ?>">
                    <?php echo the_title(); ?>
                </h3>

                <div class="bk-info-wrap  mb-5 card rounded-0">
                    <p class="pl-5 pt-4 m-0 text-left" style="font-size:1rem;">
                        <b><?php echo esc_html($label); ?> +</b>
                        <b><?php echo $cantidad_de_banos; echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                        </b>
                    </p>
                    
                    <?php if ($fotografia_planta) : ?>
                    <img class="m-auto pb-4 fotografia-planta <?php echo ($estado == 'Normal') ? "" : "img-overlay" ?>"
                        src="<?php echo $fotografia_planta[0]['fotografia_planta']['sizes']['medium']; ?>"
                        alt="<?php echo $row['fotografia_planta']['name']; ?>">
                    <?php endif; ?>

                    <ul class="d-flex py-3 m-0 border-right-0 border-left-0" style="border-bottom:1px solid #D3D3D3;">
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
                        <li class="pl-5">
                            <p style="font-size:1rem"><img
                                    src="<?php bloginfo('template_directory');?>/assets/img/areaIcon.png" alt="Area"
                                    style="max-width:22px">
                                <span class="pl-2">Sup Total</span> <b><?php echo $superficie_total; ?>m<sup>2</sup></b>
                            </p>
                        </li>
                    </ul>

                    <ul class="d-flex justify-content-between align-items-center py-3 m-0" style="background:#F6F8FA">
                        <li class="pl-5 d-none">
                            Desde <b class="">UF 2300</b>
                        </li>
                        <li class="ml-auto">
                            <?php if ($estado == 'Normal') : ?>
                            <a class="btn btn-primary px-4 mr-3 text-uppercase" href="<?php echo the_permalink(); ?>">cotizar</a>
                            <?php else : ?>
                            <p class="bg-grey ">AGOTADO</p>
                            <?php endif; ?>
                        </li>
                    </ul>

                </div>
            </div>

        </div>

        <?php endwhile;
            wp_reset_postdata(); ?>
    </div>
</section>
<?php endif; ?>


<?php if (have_rows('repeater_galerias')) : 
    $counter = 1; 
?>
<div class="py-5">
    <div class="container mb-5">
        <div class="row mt-5" id="galeria">
            <div class="col-sm-12">
                <div class="flex-wrapper d-flex justify-content-between alig-items-center">
                    <div class="wrapper-only">
                        <h3 class="text-uppercase section-title"><span class="primary-title">Galería</span></h3>
                    </div>
                    <ul class="nav nav-tabs border-0 text-uppercase" id="galleryTab" role="tablist">
                    <?php while (have_rows('repeater_galerias')) : the_row();
                    // vars
                    $tipo_de_galeria = get_sub_field('tipo_de_galeria');
                    ?>
                        <li class="tab-item mx-md-2">
                            <a class="btn btn-sm btn-secondary" id="edificio-<?php echo $counter; ?>-tab" data-toggle="tab"
                                href="#edificio-<?php echo $counter; ?>" role="tab" aria-controls="edificio-<?php echo $counter; ?>" aria-selected="true"><?php echo $tipo_de_galeria;?></a>
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
    <div class="tab-content" id="galleryTabContent">
    <?php while (have_rows('repeater_galerias')) : the_row(); ?>
        <?php if (have_rows('slider_galerias')) : ?>
            <div class="tab-pane fade" id="edificio-<?php echo $counter2;?>" role="tabpanel" aria-labelledby="edificio-<?php echo $counter2;?>-tab" style="position:relative;">
                <div class="owl-carousel owl-theme  gallery-caarousel">
                    <?php while (have_rows('slider_galerias')) : the_row();
                    // vars
                    $slider_galerias_desktop = get_sub_field('slider_galerias_desktop');
                    ?>
        
                    <div class="item">
                        <img src="<?php echo $slider_galerias_desktop['url'];?>" alt="<?php echo $slider_galerias_desktop['alt'];?>">
                    </div>

                    <?php endwhile; ?>
                </div>
                <div class="gallery-overlay"></div>
            </div>
        <?php endif; ?>
        <?php $counter2++; endwhile; ?>
    </div>
</div>
<?php endif; ?>

<?php if (have_rows('slider_master_plan')) : 
    $counter3 = 0;?>
<div class="py-5">
    <div class="container-fluid bg-medio-azul">
        <div class="container">
            <div class="row" id="masterPlan">
                <div class="col-12 mb-5">
                    <div class="wrapper-only">
                        <h3 class="text-uppercase section-title">
                            <span class="primary-title">Master</span><br><span class="secondary-title">Plan</span>
                        </h3>
                    </div>
                    <div class="shadow bg-white p-5 mb-5">
                        <div class="master-plan-content" id="masterPlanContent">
                            <?php while (have_rows('slider_master_plan')) : the_row();
                                // vars
                                $slider_master_plan_desktop = get_sub_field('slider_master_plan_desktop');
                            ?>
                            <div class="item p-5" id="masterPlanContent<?php echo $counter3; ?>">
                                <img src="<?php echo $slider_master_plan_desktop['url'];?>" alt="<?php echo $slider_master_plan_desktop['alt'];?>" class="w-100">
                            </div>
                            <?php $counter3++; endwhile; ?>
                        </div>
                    </div>
                    <ul class="general-slide-nav text-uppercase" id="masterPlanSlideNav">
                        <li class="mx-md-2">
                            <a class="p-2 general-slide-nav-prev" href="#"><span aria-label="Previous">‹</span></a>
                        </li>
                        <li class="mx-md-2">
                            <a class="p-2 general-slide-nav-next" href="#"><span aria-label="Next">›</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ( ($descripcion_de_entorno and $gmaps) || ($descripcion_de_entorno and $mapa_de_ubicacion) ) : ?>
<section class="container-fluid bg-white">
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
        <div class="col-lg-8 col-xl-6" style="height:670px">
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
                <?php if(wp_is_mobile()): ?>
                <a href="<?php echo $waze;?>" class="btn btn-secondary mr-3" target="_blank">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/waze.png" alt="Waze" class="mr-3" style="max-height:18px"> 
                    waze
                </a>
                <?php endif; ?>
                <a href="#" class="btn btn-secondary ml-4 changeMapButton"><img
                        src="<?php bloginfo('template_directory');?>/assets/img/gmaps.png" alt="google maps"
                        class="mr-3" style="max-height:20px"><span class="changeMapButtonSpan">maps</span></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif;?>

<?php
bk_main_after();
get_template_part('includes/footer');
?>