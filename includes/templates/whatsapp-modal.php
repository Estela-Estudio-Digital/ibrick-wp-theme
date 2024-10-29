<div class="whatsapp-modal <?php echo is_front_page() ? 'home' : ''; ?> bg-ultra-light-grey">
    <?php if(is_front_page()) : ?>
    <div class="p-4 ws-project">
        <div class="whatsapp-header">
            <ul class="d-flex align-items-start w-100 justify-content-between">
                <li>
                    <h4 class="mb-2">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/whatsapp-logo.svg" alt="whatsapp" style="max-height:45px" width="45">
                        WhatsApp
                    </h4>
                    <h5 class="mb-0 pt-md-2">
                        <small>Conversemos por WhatsApp</small>
                    </h5>
                </li>
                <li>
                    <a href="#" class="whatsappModalClose">
                        <h2>
                            <span aria-hidden="true">&times;</span>
                        </h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="whatsapp-project-selector">
            <?php
                $query = new WP_Query(array(
                'post_type'      	=> 'proyectos',
                'posts_per_page'	=> -1,
                'post_status'		=> 'publish',
                'tax_query'         => array (
                    array(
                        'taxonomy'      => 'tipo',
                        'field'          => 'slug',
                        'terms'         => 'residencial'
                    ),
                ),
              ));
              if ( $query->have_posts() ) :
            ?>
            <ul class="pt-4">
            <?php while ( $query->have_posts() ) : $query->the_post();
                $grupo_de_datos = get_field('grupo_de_datos');
                setup_postdata($post);

                if ($grupo_de_datos["whatsapp"]) :
            ?>
                <li class="my-md-4">
                    <a
                        href="!#" 
                        class="whatsappProjectSelector"
                        data-name="<?php echo get_field('nombre_planok');?>"
                        data-whatsapp="<?php echo $grupo_de_datos["whatsapp"];?>"
                        data-correo="<?php echo $grupo_de_datos["correos_ventas"];?>"
                    >
                    <ul class="d-flex ws-item ">
                        <li class="align-items-center">
                            <img
                                src="<?php bloginfo('template_directory');?>/assets/img/icono_contacto.png"
                                alt="whatsapp"
                                class="ws-item--img"
                            >
                        </li>
                        <li class="ws-item--txt">
                            <?php echo get_the_title(); ?>
                        </li>
                    </ul>
                    </a>
                </li>
            <?php endif;?>
            <?php endwhile; wp_reset_postdata(); ?>
            </ul>
            <?php endif;?>
        </div>
    </div>
    <?php endif;?>
    <div class="p-4 ws-form <?php echo is_front_page() ? 'd-none' : ''; ?>">
        <div class="whatsapp-header">
            <ul class="d-flex align-items-start w-100 justify-content-between">
                <li>
                    <h4 class="mb-1">
                        <img src="<?php bloginfo('template_directory');?>/assets/img/whatsapp-logo.svg" alt="whatsapp" style="max-height:45px" width="45">
                        WhatsApp
                    </h4>
                    <p class="mb-0">
                        <small>Completa los datos e inicia la conversación con uno de nuestros ejecutivos</small>
                    </p>
                </li>
                <li>
                    <a href="#" class="whatsappModalClose">
                        <h2>
                            <span aria-hidden="true">&times;</span>
                        </h2>
                    </a>
                </li>
            </ul>
        </div>
        <div class="wp-block-contact-form-7-contact-form-selector">
            <div role="form" class="wpcf7 wpcf7Whatsapp" id="wpcf7-f1022-o1" lang="es-ES" dir="ltr">
                <div class="screen-reader-response">
                    <p role="status" aria-live="polite" aria-atomic="true"></p>
                    <ul></ul>
                </div>
                <form 
                    class="wpcf7-form formulario_cotizar formulario_whatsapp formulario-general"
                    id="formulario_whatsapp"
                    role="form"
                    style="max-width: 400px;"
                    method="post"
                    name="formulario_whatsapp"
                >
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="1022">
                        <?php 
                            $plugin_data = get_plugin_data( ABSPATH . 'wp-content/plugins/contact-form-7/wp-contact-form-7.php' );
                            echo '<input type="hidden" name="_wpcf7_version" value="'.$plugin_data['Version'].'">';
                        ?>
                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1022-o1">
                        <input type="hidden" name="_wpcf7_container_post" value="0">
                        <input type="hidden" name="nombreProyecto" class="nombreProyecto">
                        <input type="hidden" name="correosVentas" class="correosVentas" >
                        <input type="hidden" name="logoProyecto" class="logoProyecto">
                        <input type="hidden" name="whatsappProject" class="whatsappProject">
                        <input type="hidden" name="urlProyecto" class="urlProyecto" value="<?php echo get_permalink();?>">
            
                        <input type="hidden" name="fuenteSbj" class="fuenteSbj">
                        <input type="hidden" name="medioSbj" class="medioSbj">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 ">
                            <label class="label" for="inputNameWhatsapp">Nombre y apellido</label>
                            <input type="text" class="form-control" id="inputNameWhatsapp" name="inputNameWhatsapp" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="label" for="inputEmailWhatsapp">Email</label>
                            <input type="email" class="form-control" id="inputEmailWhatsapp" name="inputEmailWhatsapp" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label" for="inputRutWhatsapp">Rut</label>
                            <input type="text" class="form-control Rut" id="inputRutWhatsapp" name="inputRutWhatsapp">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="label" for="inputTelefonoWhatsapp">Télefono</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+56</span></div>
                                    <input type="text" class="form-control" id="inputTelefonoWhatsapp" name="inputTelefonoWhatsapp" required>
                                </div>
                        </div>
                        <div class="form-group col-md-12 ">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" id="inputCheckboxWhatsapp"
                                    name="inputCheckboxWhatsapp" checked>
                                <label class="custom-control-label" for="inputCheckboxWhatsapp">
                                    <small>Quiero que Brick Inmobiliaria me contacte</small> 
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group w-100 mb-0">
                        <div class="text-center py-4">
                            <button  
                                type="submit" name="boton_enviar_whatsapp" value="enviar"
                                class="g-recaptcha btn btn-secondary px-5 al-btn al-btn--white boton_enviar" 
                                id="botonEnviarWhatsapp" 
                                data-badge="inline"
                                disabled>
                                Iniciar conversación
                            </button><br>
                            <span class="ajax-loader"></span>
                        </div>
                    </div>
                </form>
                <?php if(is_front_page()) : ?>
                    <div class="text-center">
                        <button  
                            type="button" name="select_project_whatsapp"
                            class="btn px-5 mx-auto" 
                            id="selectProjectWhatsapp"
                            >
                            <small>
                                <span class="mr-2">
                                    <i class="fa fa-arrow-left"></i>
                                </span>
                                Seleccionar otro proyecto
                            </small>
                        </button>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>