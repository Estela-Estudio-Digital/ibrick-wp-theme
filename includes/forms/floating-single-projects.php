<div class="floating-form ">
  <div class="floating-form-bg">
      <div class="wp-block-contact-form-7-contact-form-selector">
          <div role="form" class="wpcf7 wpcf7Floatante" id="wpcf7-f1155-o1" lang="es-ES" dir="ltr">
              <div class="screen-reader-response">
                  <p role="status" aria-live="polite" aria-atomic="true"></p>
                  <ul></ul>
              </div>
              <form 
                  class="wpcf7-form formulario_cotizar formulario_floatante formulario-general"
                  id="formulario_floatante"
                  role="form"
                  method="post"
                  name="formulario_floatante"
              >
                  <div style="display: none;">
                      <input type="hidden" name="_wpcf7" value="1155">
                      <?php 
                          $plugin_data = get_plugin_data( ABSPATH . 'wp-content/plugins/contact-form-7/wp-contact-form-7.php' );
                          echo '<input type="hidden" name="_wpcf7_version" value="'.$plugin_data['Version'].'">';
                      ?>
                      <input type="hidden" name="_wpcf7_locale" value="en_US">
                      <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f1155-o1">
                      <input type="hidden" name="_wpcf7_container_post" value="0">
                      <input type="hidden" name="nombreProyecto" class="nombreProyecto">
                      <input type="hidden" name="correosVentas" class="correosVentas" >
                      <input type="hidden" name="logoProyecto" class="logoProyecto">
                      <input type="hidden" name="floatanteProject" class="floatanteProject">
                      <input type="hidden" name="urlProyecto" class="urlProyecto" value="<?php echo get_permalink();?>">
          
                      <input type="hidden" name="fuenteSbj" class="fuenteSbj">
                      <input type="hidden" name="medioSbj" class="medioSbj">
                  </div>
                  <div class="form-row">
                      <div class="col-12 d-none d-lg-block">
                        <h5 class="m-0 pt-2">¿Necesitas más información?</h5>
                        <p class="mb-0">
                          <small>
                            Déjanos tus datos y te contactaremos
                          </small>
                        </p>
                      </div>
                      <div class="form-group col-md-12  mb-0">
                          <label class="label" for="inputNameFloatante">Nombre y apellido</label>
                          <input type="text" class="form-control" id="inputNameFloatante" name="inputNameFloatante" required>
                      </div>
                      <div class="form-group col-md-12 mb-0">
                          <label class="label" for="inputEmailFloatante">Email</label>
                          <input type="email" class="form-control" id="inputEmailFloatante" name="inputEmailFloatante" required>
                      </div>
                  </div>
                  <div class="form-row ">
                    <div class="form-group col-md-12 mb-0">
                        <label class="label" for="inputRutFloatante">Rut</label>
                        <input type="text" class="form-control Rut" id="inputRutFloatante" name="inputRutFloatante">
                    </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-12 mb-0">
                          <label class="label" for="inputTelefonoFloatante">Télefono</label>
                          <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text">+56</span></div>
                                  <input type="text" class="form-control" id="inputTelefonoFloatante" name="inputTelefonoFloatante" required>
                              </div>
                      </div>
                      <div class="form-group col-md-12  mb-0">
                          <div class="custom-control custom-checkbox">
                              <input class="custom-control-input" type="checkbox" id="inputCheckboxFloatante"
                                  name="inputCheckboxFloatante" checked>
                              <label class="custom-control-label" for="inputCheckboxFloatante">
                                  <small>Quiero que Brick Inmobiliaria me contacte</small> 
                              </label>
                          </div>
                      </div>
                  </div>
                  <div class="form-group w-100 py-4">
                      <div class="text-center">
                          <button  
                              type="submit" name="boton_enviar_floatante" value="enviar"
                              class="g-recaptcha btn btn-secondary px-5 al-btn al-btn--white boton_enviar" 
                              id="botonEnviarFloatante" 
                              data-badge="inline"
                              disabled>
                              Solicitar información
                          </button><br>
                          <span class="ajax-loader"></span>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</div>