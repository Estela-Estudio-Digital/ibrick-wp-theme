</main>
<?php bk_footer_before();?>

  <?php //if(is_active_sidebar('footer-widget-area')): ?>
    <?php //dynamic_sidebar('footer-widget-area'); ?>
  <?php //endif; ?>

<footer class="container-fluid py-5 bg-secondary-color text-white">
  <div class="container">
    <div class="row align-items-end">
        <div class="col-lg-4">
          <ul class="d-flex">
            <li class="mr-3">
              <a href="https://www.instagram.com/inmobiliariabrick/" target="_blank" class=" text-white">
                <i class="fab fa-instagram" style="font-size:2rem;"></i>
              </a>
            </li>
            <li class="mr-3">
              <a href="https://www.facebook.com/BRICK-Inmobiliaria-100180791917908" target="_blank" class=" text-white">
                <i class="fab fa-facebook-square" style="font-size:2rem;"></i>
              </a>
            </li>
            <li class="mr-3">
              <a href="https://www.youtube.com/channel/UCnUmucW8Jm1T--NaiDIw_DQ" target="_blank" class=" text-white">
                <i class="fab fa-youtube-square" style="font-size:2rem;"></i>
              </a>
            </li>
          </ul>
          <a href="<?php echo site_url();?>">
            <img src="<?php bloginfo('template_directory');?>/assets/img/footer-logo.svg" height="100" width="150" alt="Brick Inmobiliaria" class="footer-logo">
          </a>
        </div>
        <div class="col-lg-4">
          <ul class="w-100 m-0 justify-content-between">
            <li>
              <p><a class="text-white" href="https://goo.gl/maps/W5hF3kUTZL2CTce3A">Américo Vespucio Norte 1090 of. 403, <br> Vitacura, Santiago </a></p>
            </li>
            <li>
              <p class="mb-0"><a class="text-white" href="tel:+56233234100"><i class="fas fa-mobile-alt"></i> +562 3323 4100</a></p>
            </li>
            <li>
              <p><a class="text-white" href="mailto:contacto@ibrick.cl"><i class="far fa-envelope"></i> contacto@ibrick.cl</a></p>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <ul class="d-flex footer-menu w-100 text-uppercase">
            <li class="d-md-block mr-2 pl-2" style="border: 1px solid white; border-top:0; border-bottom:0">
              <a href="<?php echo site_url('residencial');?>" class="text-white d-block mb-2">Residencial</a>
              <a href="<?php echo site_url('comercial');?>" class="text-white d-block mb-2">Comercial</a>
              <a href="<?php echo site_url('pasa-el-dato-y-gana');?>" class="text-white d-block">Referidos</a>
            </li>
            <li class="d-md-block">
              <a href="<?php echo site_url('somos-brick');?>" class="text-white d-block mb-2">Somos Brick</a>
              <a href="https://pvi.cl/propietarios/brick/propietarios/login" target="_blank" class="text-white d-block mb-2 contactoModalBtn">Postventa</a>
              <a href="#" class="text-white contactoModalBtn">Contáctanos</a>
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
<div class="modal fade" id="contacto-form-modal" tabindex="-1" role="dialog" aria-labelledby="kit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="text-uppercase pl-5"><b>Contáctanos</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row align-items-stretch">

                  <div class="col-md-6 d-flex align-items-center">

                    <div class="wp-block-contact-form-7-contact-form-selector w-100">
                      <div class="wpcf7 brickcf7 w-100" role="form" id="wpcf7-f523-o1" lang="es-ES" dir="ltr" class="w-100 wp">
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
                            </h3>
                      </li>
                      <li id="addtoAnyTest"></li>
                    </ul>
                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
</div>

<?php //bk_footer_after();?>

<?php //bk_bottomline();?>

<?php wp_footer(); ?>
</body>
</html>
