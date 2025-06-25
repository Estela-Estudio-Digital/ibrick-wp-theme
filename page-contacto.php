<?php /*
Template Name: pasos a seguir
*/
get_template_part('includes/header'); 
bk_main_before();
?>
   <section class="my-md-5">
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
          <h1 class="text-uppercase"><span class="secondary-title font-weight-bold">Escríbenos y nos contactaremos</span></h1>
        </div>
      </div>
    </div>
   <div class="container">
                <div class="row align-items-stretch">

                  <div class="col-md-6 d-flex align-items-center">

                    <div class="wp-block-contact-form-7-contact-form-selector w-100">
                      <div class="wpcf7 wpcf7Floatante w-100" role="form" id="wpcf7-f523-o1" lang="es-ES" dir="ltr" class="w-100 wp">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                        
                        <form
                          class="wpcf7-form init formulario_contact formulario-general"
                          id="formulario_inicial"
                          role="form"
                          method="post"
                          name="formulario_inicial"
                        >
                            <div style="display: none;">
                              <input type="hidden" name="_wpcf7" value="523">
                              <?php 
                                $plugin_data = get_plugin_data( ABSPATH . 'wp-content/plugins/contact-form-7/wp-contact-form-7.php' );
                                echo '<input type="hidden" name="_wpcf7_version" value="'.$plugin_data['Version'].'">';
                              ?>
                              <input type="hidden" name="_wpcf7_locale" value="es_ES">
                              <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f523-o1">
                              <input type="hidden" name="_wpcf7_container_post" value="0">
                              <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                              <input type="hidden" name="fuenteSbj" class="fuenteSbj">
                              <input type="hidden" name="medioSbj" class="medioSbj">
                              <input type="hidden" name="nombreProyecto" class="nombreProyecto">
                            </div>
                            
                            <div class="form-row text-left">

                                <div class="form-group w-100 px-4">
                                    <span class="bk-projectcart--text__span"></span>
                                    <label class="label" for="inputNameContact">Nombre y apellido</label>
                                    <input type="text" class="form-control" id="inputNameContact" name="inputNameContact" required>
                                </div>

                                <div class="form-group w-100 px-4">
                                    <label class="label" for="inputRutContact">Rut</label>
                                    <input type="text" class="form-control Rut" id="inputRutContact" name="inputRutContact">
                                </div>

                                <div class="form-group w-100 px-4">
                                    <label class="label" for="inputEmailContact">Email</label>
                                    <input type="email" class="form-control" id="inputEmailContact" name="inputEmailContact" required>
                                </div>

                                <div class="form-group w-100 px-4">
                                  <label class="label" for="inputTelefonoContact">Télefono</label>
                                  <div class="input-group">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">+56</span>
                                      </div>
                                      <input type="text" class="form-control" id="inputTelefonoContact" name="inputTelefonoContact" required>
                                  </div>
                                </div>

                                <div class="form-group w-100 px-4">
                                    <label class="label" for="texAreaMensajeContact">Mensaje</label>
                                    <input class="form-control" id="texAreaMensajeContact" name="texAreaMensajeContact"></input>
                                </div>
                                <div class="form-group w-100">
                                    <div class="text-center py-4">
                                        <button  
                                            type="submit"
                                            name="boton_enviar"
                                            value="enviar"
                                            class="g-recaptcha btn btn-primary px-5 al-btn al-btn--white boton_enviar" 
                                            id="botonEnviarContact" 
                                            data-badge="inline"
                                            disabled>
                                            Enviar
                                        </button><br>
                                        <span class="ajax-loader"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-6 d-flex align-items-center">
                    <ul class="pl-lg-5">
                      <li>
                        <p><a href="tel:+56233234100"><i class="fas fa-mobile-alt"></i> +562 3323 4100</a></p>
                      </li>
                      <li>
                        <p><a href="mailto:contacto@ibrick.cl"><i class="far fa-envelope"></i> contacto@ibrick.cl</a></p>
                      </li>
                      <li>
                        <p><a href="https://goo.gl/maps/W5hF3kUTZL2CTce3A"><i class="fas fa-map-marker-alt"></i> Américo Vespucio Norte 1090 of. 403, Vitacura, Santiago </a></p>
                      </li>
                      <li>
                            <h3>
                              <a href="https://www.instagram.com/inmobiliariabrick/" target="_blank">
                                <i class="fab fa-instagram"></i>
                              </a>
                              <a href="https://www.facebook.com/BRICK-Inmobiliaria-100180791917908" target="_blank">
                                <i class="fab fa-facebook-square"></i>
                              </a>
                              <a target="_blank" href="https://www.youtube.com/channel/UCnUmucW8Jm1T--NaiDIw_DQ" >
                                  <i class="fab fa-youtube"></i>
                              </a>
                              <a target="_blank" href="https://www.linkedin.com/company/brick-inmobiliaria/posts/?feedView=all" >
                                  <i class="fab fa-linkedin"></i>
                              </a>
                            </h3>
                      </li>
                      <li id="addtoAnyTest"></li>
                    </ul>
                  </div>

                </div>
              </div>
    </section>

<?php 
bk_main_after();
get_template_part('includes/footer'); 
?>
