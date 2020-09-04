<?php
get_template_part('includes/header');
bk_main_before();
$vincular_planta_a_proyecto = get_field('vincular_planta_a_proyecto');
$logo_proyecto = get_field('logo_proyecto', $vincular_planta_a_proyecto->ID);
?>

<div class="collapse" id="navbarToggleExternalContent" style="position:relative">
    <?php 
        $query = new WP_Query(array(
            'post_type'          => 'plantas',
            'posts_per_page'    => -1,
            'post_status'        => 'publish',
            'meta_query' => array(
                array(
                    'key' => 'vincular_planta_a_proyecto',
                    'value' => '' . $vincular_planta_a_proyecto->ID . '',
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
        <section class="container ppp-carousel owl-carousel owl-theme plantasowl py-5">
            <?php while ($query->have_posts()) : $query->the_post();
                $estado = get_field('estado');
                $post_id_planta = get_the_ID();
                if ($estado == 'Normal' && $post_id_planta != $post_id) :
                    $superficie_total = get_field('superficie_total');
                    $cantidad_de_banos = get_field('cantidad_de_banos');
                    $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                    $value = $dormitorios_para_filtrar['value'];
                    $label = $dormitorios_para_filtrar['choices'][$value];
            ?>
                <?php if (have_rows('repeater_fotografias')) : ?>
                <div class="m-3 card rounded-0">
                    <p class="pt-4 pl-3  m-0 text-left" style="font-size:1rem;">
                        <b><?php echo esc_html($label); ?> +</b>
                        <b><?php echo $cantidad_de_banos;
                        echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>
                        </b>
                    </p>
                    <?php
                        $fotografia_planta = get_field('repeater_fotografias');
                        $fotografia_planta_mobile = $fotografia_planta[0]['fotografia_planta']['url'];
                        if ($fotografia_planta) :
                    ?>
                        <img class="img" src="<?php echo $fotografia_planta[0]['fotografia_planta']['sizes']['medium']; ?>" alt="<?php echo $row['fotografia_planta']['name']; ?>">
                        <?php endif; ?>
                        <ul class="d-flex justify-content-between align-items-center py-3 m-0" style="background:#F6F8FA">
                                <li class="pl-5 d-none"> 
                                    Desde <b class="">UF 2300</b>
                                </li>
                                <li class="ml-auto">
                                    <?php if ($estado == 'Normal') : ?>
                                        <a class="btn btn-primary px-4 mr-3 text-uppercase" href="<?php the_permalink(); ?>">cotizar</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                </div>
                <?php endif; ?>
            <?php endif; endwhile; wp_reset_postdata(); ?>
        </section>
        <div class="gallery-overlay"></div>
    <?php endif; ?>
</div>


<?php if (have_posts()) : ?>
<section id="plantas" class="container-fluid my-5">
    <div class="row align-items-center">
        <?php while (have_posts()) : the_post();
                $post_id = get_the_ID();
                $superficie_total = get_field('superficie_total');
                $cantidad_de_banos = get_field('cantidad_de_banos');
                //$imagen_principal_plana = get_field('imagen_principal_plana');
                $esquicio = get_field('esquicio');

                $superficie_construida = get_field("superficie_construida");
                $superficie_terraza = get_field("superficie_terraza");
                $superficie_jardin = get_field("superficie_jardin");
                $superficie_jardinera = get_field("superficie_jardinera");
                $superficie_total = get_field("superficie_total");

                $legal = get_field("legal");
                $sala_de_estar = get_field('sala_de_estar', $vincular_planta_a_proyecto->ID);

                $dormitorios_para_filtrar = get_field_object('dormitorios_para_filtrar');
                $value = $dormitorios_para_filtrar['value'];
                $label = $dormitorios_para_filtrar['choices'][$value];


                $img_repeater = get_field('repeater_fotografias');
            ?>
            <div class="buttons-next-prev-plantas">
                <span class="prev"><?php previous_post_link() ?></span>
                <span class="next"><?php next_post_link() ?></span>
            </div>
        <div class="col-lg-4 text-center">
            <a class="gridItemH1 pl-5" href="<?php echo esc_url($img_repeater[0]['fotografia_planta']['url']); ?>" data-fancybox="gallery">
                <img src="<?php echo $img_repeater[0]['fotografia_planta']['url']; ?>" alt="Planta" class="w-100">
            </a>
            <p class="mt-5">
            <img src="<?php bloginfo('template_directory');?>/assets/img/zoom.png" alt="zoom" style="max-height:20px"> <small>Haz click en la imagen para ampliar</small>
            </p>
        </div>

        <div class="col-lg-4 mb-5">
            <div class="plantas-info-wrap px-md-5 d-flex flex-column align-items-center">
                <div class="wrapper">
                    <h2 class="pb-4"><span class="plantas-info-title"><?php echo the_title();?></span></h2>
                    <p class="mb-4">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/bedIcon.png" alt="Dormitorios" style="max-width:24px"> 
                        <span class="px-2"><b><?php echo esc_html($label); ?></b></span>
                    </p>
                    <p class="mb-4">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/img/batIcon.png" alt="Baños" style="max-width:24px">
                        <span class="px-2"><b><?php echo $cantidad_de_banos; ?><?php echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?></b></span>
                    </p>
    
                    <p class="mt-4">
                        <span><b>Superficies:</b></span>
                    </p>
                    <div class="content-table">
                        <?php if ($superficie_construida != "") : ?>
                        <ul class="d-flex justify-content-between w-100">
                            <li>Útil:</li>
                            <li class="ml-auto"><span><?php echo $superficie_construida; ?></span></li>
                            <li><span class="mx-4">m2</span></li>
                        </ul>
                        <?php endif; ?>
                        <?php if ($superficie_terraza != "") : ?>
                        <ul class="d-flex justify-content-between w-100">
                            <li>Terraza: </li>
                            <li class="ml-auto"><span><?php echo $superficie_terraza; ?></span></li>
                            <li><span class="mx-4">m2</span></li>
                        </ul>
                        <?php endif; ?>
                        <?php if ($superficie_jardin != "") : ?>
                        <ul class="d-flex justify-content-between w-100">
                            <li>Jardínera: </li>
                            <li class="ml-auto"><span><?php echo $superficie_jardin; ?></span></li>
                            <li><span class="mx-4">m2</span></li>
                        </ul>
                        <?php endif; ?>
                        <?php if ($superficie_jardin != "") : ?>
                        <ul class="d-flex justify-content-between w-100">
                            <li>Jardín: </li>
                            <li class="ml-auto"><span><?php echo $superficie_jardin; ?> </span></li>
                            <li><span class="mx-4">m2</span></li>
                        </ul>
                        <?php endif; ?>
                        <ul class="d-flex justify-content-between w-100 " style="font-size:1rem">
                            <li><b>Total:</b></li>
                            <li class="ml-auto"><span><b><?php echo $superficie_total; ?></b></span></li>
                            <li><span class="mx-4"><b>m2</b></span></li>
                        </ul>
                    </div>
                    <?php if($esquicio): ?>
                        <div class="esquicio pt-4">
                            <img src="<?php echo $esquicio['url']; ?>" alt="Planta" class="w-100">
                        </div>
                    <?php endif;?>
                </div>

            </div>

        </div>

        <div class="col-lg-4 mt-5 pr-md-5">
            <h2 class="d-md-none pb-4"><span class="plantas-info-title">Solicitar Información</span></h2>
            <div class="wpcf7" role="form" id="wpcf7-f116-o1" lang="es-ES" dir="ltr">
                <form method="post" class="wpcf7-form formulario_cotizar formulario-general" style="max-width: 400px;" name="cotizar_proyecto" id="cotizar_proyecto"
                    role="form">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="116">
                        <input type="hidden" name="_wpcf7_version" value="5.2.1">
                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f116-o1">
                        <input type="hidden" name="_wpcf7_container_post" value="0">
                        <input type="hidden" name="nombreProyecto" id="nombreProyecto">
                        <input type="hidden" name="logoProyecto" id="logoProyecto">
                        <input type="hidden" name="comuna" id="comuna">
                        <input type="hidden" name="superficieUtil" id="superficieUtil">
                        <input type="hidden" name="superficieTerraza" id="superficieTerraza">
                        <input type="hidden" name="superficieTotal" id="superficieTotal">
                        <input type="hidden" name="fuenteSbj" id="fuenteSbj">
                        <input type="hidden" name="medioSbj" id="medioSbj">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label class="label" for="inputName">Nombre y apellido</label>
                            <input type="text" class="form-control" id="inputName" name="inputName" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="label" for="inputName">Email</label>
                            <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label class="label" for="inputName">Rut</label>
                            <input type="text" class="form-control Rut" id="inputRut" name="inputRut">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="label" for="inputTelefono">Télefono</label>
                                <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" required>
                        </div>
                        <div class="form-group col-md-12 ">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="inputCheckbox"
                                    name="inputCheckbox" checked>
                                <label class="custom-control-label" for="inputCheckbox">
                                    <small>Quiero que Inmobiliaria Brick me contacte</small> 
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=" ">
                        <p class="pt-5">
                            <input type="submit" name="enviar" id="boton_enviar" value="COTIZAR"
                                class="btn btn-secondary" disabled>
                        </p>
                        <br>
                        <span class="ajax-loader"></span>

                    </div>
                </form>
            </div>
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