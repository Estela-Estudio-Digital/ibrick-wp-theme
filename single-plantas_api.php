<?php
    $projectModelLink = get_field('id_proyecto');
    $proyect_title = get_the_title($projectModelLink->ID);
?>

<script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
        event: 'viewModel',
        projectTitle: '<?php echo $proyect_title; ?>',
        modelTitle: '<?php echo the_title(); ?>'
    })
</script>

<?php
get_template_part('includes/header');
bk_main_before();
$vincular_planta_a_proyecto = get_field('vincular_planta_a_proyecto');
$logo_proyecto = get_field('logo_proyecto', $vincular_planta_a_proyecto->ID);
$grupo_de_datos = get_field('grupo_de_datos', $vincular_planta_a_proyecto->ID);
$correos_ventas = $grupo_de_datos['correos_ventas'];
$id_planok = get_field( 'id_planok' );

?>
<div class="collapse" id="navbarToggleExternalContent" style="position:relative">
    <?php 
        $query = new WP_Query(array(
        'post_type'          => 'plantas_api',
        'posts_per_page'    => -1,
        'post_status'        => 'publish',
        'meta_query' => array(
            array(
                'key' => 'vincular_planta_a_proyecto',
                'value' => $vincular_planta_a_proyecto->ID,
                'compare' => '='
            )
        ),
    ));
    if ($query->have_posts()) : ?>
        <section class="container ppp-carousel owl-carousel owl-theme plantasowl py-5">
            <?php while ($query->have_posts()) : $query->the_post();
                // $estado = get_field('estado');
                $post_id_planta = get_the_ID();
                // if ($estado == 'Normal' && $post_id_planta != $post_id) :
                    $superficie_total = get_field('superficie_total');
                    $cantidad_de_banos = get_field('cantidad_de_banos');
                    $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                    $value = $dormitorios_para_filtrar['value'];
                    $label = $dormitorios_para_filtrar['choices'][$value];
                    $texto_titulo = get_field('texto_titulo');
                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
            ?>
                <?php  ?>
                <div class="m-3 card rounded-0">
                    <p class="pt-4 pl-3  m-0 text-left" style="font-size:1rem;">
                        <b>
                            <?php echo $texto_titulo; ?> <?php echo esc_html($label); ?> + <?php echo $cantidad_de_banos; echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                        </b>
                    </p>
                    <img class="img" src="<?php echo $thumb[0]; ?>" alt="<?php echo $row['fotografia_planta']['name']; ?>">
                    <ul class="d-flex justify-content-between align-items-center py-3 m-0" style="background:#F6F8FA">
                        <li class="pl-5 d-none"> 
                            Desde <b class="">UF 2300</b>
                        </li>
                        <li class="ml-auto">
                            <a class="btn btn-primary px-4 mr-3 text-uppercase" href="<?php the_permalink(); ?>">cotizar</a>
                        </li>
                    </ul>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </section>
        <div class="gallery-overlay"></div>
    <?php endif; ?>
</div>

<?php if (have_posts()) : ?>
<section id="plantas" class="container-fluid my-5">
    <div class="row">
        <?php while (have_posts()) : the_post();
                $post_id = get_the_ID();
                $superficie_total = get_field('superficie_total');
                $cantidad_de_banos = get_field('cantidad_de_banos');
                //$imagen_principal_plana = get_field('imagen_principal_plana');
                $esquicio = get_field('esquicio');
                $ficha_planta = get_field('ficha');

                $superficie_construida = get_field("superficie_construida");
                $superficie_terraza = get_field("superficie_terraza");
                $superficie_jardin = get_field("superficie_jardin");
                $superficie_jardinera = get_field("superficie_jardinera");
                $superficie_total = get_field("superficie_total");
                $unidades = get_field("unidades");
                $corresponde = get_field("corresponde");

                $legal = get_field("legal");
                $sala_de_estar = get_field('sala_de_estar', $vincular_planta_a_proyecto->ID);

                $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                $value = $dormitorios_para_filtrar['value'];
                $label = $dormitorios_para_filtrar['choices'][$value];
                $texto_titulo = get_field('texto_titulo');


                $img_repeater = get_field('repeater_fotografias');
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
            ?>
            <div class="buttons-next-prev-plantas d-none">
                <span class="prev"><?php previous_post_link() ?></span>
                <span class="next"><?php next_post_link() ?></span>
            </div>
        <div class="col-lg-4 text-md-center">
            <a class="gridItemH1 pl-lg-5" href="<?php echo esc_url($thumb[0]); ?>" data-fancybox="gallery">
                <img src="<?php echo $thumb[0] ? $thumb[0] : $ficha_planta; ?>" alt="Planta" class="w-100 fotografia-planta-single">
            </a>
            <p class="mt-5">
            <img src="<?php bloginfo('template_directory');?>/assets/img/zoom.png" alt="zoom" style="max-height:20px"> <small>Haz click en la imagen para ampliar</small>
            </p>
        </div>

        <div class="col-lg-4 mb-5">
            <div class="plantas-info-wrap px-md-5 d-flex flex-column align-items-center">
                <div class="wrapper w-100">
                    <h2 class="pb-5">
                        <span class="plantas-info-title">
                            Tipo 
                            <span id="plantaModalPlanOkTipo">
                            <?php echo $texto_titulo; ?> <?php echo esc_html($label); ?> + <?php echo $cantidad_de_banos; echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                            </span>
                        </span>
                    </h2>
                    <?php if($unidades ): ?>
                        <p class="pb-4 d-none"><small><?php echo $unidades; ?></small></p>
                    <?php endif;?>
                    <p class="mb-4">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/bedIcon.png" alt="Dormitorios" style="max-width:24px"> 
                        <span class="px-2"><b><?php echo esc_html($label); ?></b></span>
                    </p>
                    <p class="mb-4">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/batIcon.png" alt="Baños" style="max-width:24px">
                        <span class="px-2"><b><?php echo $cantidad_de_banos; ?><?php echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?></b></span>
                    </p>
    
                    <p class="pt-4">
                        <b style="font-size:1rem">Superficies:</b>
                    </p>

                    <div class="content-table">
                        <?php if ($superficie_construida != "") : ?>
                        <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                            <li>Útil:</li>
                            <li class="ml-auto pr-1"><span><?php echo $superficie_construida; ?></span></li>
                            <li><span class="pr-2">m<sup>2</sup> </span></li>
                        </ul>
                        <?php endif; ?>
                        <?php if ($superficie_terraza != "") : ?>
                        <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                            <li>Terraza: </li>
                            <li class="ml-auto pr-1"><span><?php echo $superficie_terraza; ?></span></li>
                            <li><span class="pr-2">m<sup>2</sup> </span></li>
                        </ul>
                        <?php endif; ?>
                        <?php if ($superficie_jardin != "") : ?>
                        <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                            <li>Jardínera: </li>
                            <li class="ml-auto pr-1"><span><?php echo $superficie_jardin; ?></span></li>
                            <li><span class="pr-2">m<sup>2</sup> </span></li>
                        </ul>
                        <?php endif; ?>
                        <?php if ($superficie_jardin != "") : ?>
                        <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                            <li>Jardín: </li>
                            <li class="ml-auto pr-1"><span><?php echo $superficie_jardin; ?> </span></li>
                            <li><span class="pr-2">m<sup>2</sup></span></li>
                        </ul>
                        <?php endif; ?>
                        <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                            <li><b>Total:</b></li>
                            <li class="ml-auto pr-1"><span><b><?php echo $superficie_total; ?></b></span></li>
                            <li><span class=""><b class="pr-2">m<sup>2</sup></b></span></li>
                        </ul>
                    </div>
                    <?php if($corresponde): ?>
                            <p><small><?php echo $corresponde; ?></small></p>
                            <?php endif;?>
                    <?php if($esquicio): ?>
                        <div class="esquicio pt-4">
                            <img src="<?php echo $esquicio['url']; ?>" alt="Planta" class="w-100">
                        </div>
                    <?php endif;?>
                    <?php if ($thumb && $ficha_planta) : ?>
                        <div class="pt-4">
                            <a class="btn btn-primary px-4 mr-3 text-uppercase" href="<?php echo $ficha_planta; ?>" target="_blank">Descarga ficha de planta</a>
                        </div>
                    <?php endif;?>
                </div>

            </div>

        </div>

        <div class="col-lg-4 pr-md-5">
            <h3 class="pb-2"><span class="plantas-info-title">Escríbenos y recibirás tu cotización por email</span></h3>
            <?php get_template_part('includes/forms/form-planta'); ?>
        </div>
        <?php endwhile; ?>
    </div>
</section>

<?php
    wp_reset_postdata();
endif; ?>

<?php
bk_main_after();
get_template_part('includes/footer');
?>