<?php ?>

<div class="wp-block-contact-form-7-contact-form-selector">
  <div role="form" class="wpcf7 wpcf7Floatante" id="wpcf7-f988-o1" lang="es-ES" dir="ltr">
      <div class="screen-reader-response">
          <p role="status" aria-live="polite" aria-atomic="true"></p>
          <ul></ul>
      </div>
      <form
          class="wpcf7-form formulario_cotizar formulario_cotizar_proyecto formulario-general"
          id="formulario_cotizar_proyecto"
          role="form"
          style="max-width: 400px;"
          method="post"
          name="formulario_cotizar_proyecto"
      >
          <div style="display: none;">
              <input type="hidden" name="_wpcf7" value="988">
              <?php 
                  $plugin_data = get_plugin_data( ABSPATH . 'wp-content/plugins/contact-form-7/wp-contact-form-7.php' );
                  echo '<input type="hidden" name="_wpcf7_version" value="'.$plugin_data['Version'].'">';
              ?>
              <input type="hidden" name="_wpcf7_locale" value="en_US">
              <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f988-o1">
              <input type="hidden" name="_wpcf7_container_post" value="0">
              <input type="hidden" name="nombreProyecto" class="nombreProyecto">
              <input type="hidden" name="correosVentas" class="correosVentas" >
              <input type="hidden" name="logoProyecto" class="logoProyecto">
              <input type="hidden" name="urlProyecto" class="urlProyecto" value="<?php echo get_permalink();?>">
  
              <input type="hidden" name="fuenteSbj" class="fuenteSbj">
              <input type="hidden" name="medioSbj" class="medioSbj">
          </div>
          <div class="form-row">
              <div class="form-group col-md-12 ">
                  <label class="label" for="inputNameCotizar">Nombre y apellido</label>
                  <input type="text" class="form-control" id="inputNameCotizar" name="inputNameCotizar" required>
              </div>
              <div class="form-group col-md-12">
                  <label class="label" for="inputEmailCotizar">Email</label>
                  <input type="email" class="form-control" id="inputEmailCotizar" name="inputEmailCotizar" required>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-12 ">
                  <label class="label" for="inputRutCotizar">Rut</label>
                  <input type="text" class="form-control Rut" id="inputRutCotizar" name="inputRutCotizar">
              </div>
              <div class="form-group col-md-12">
                  <label class="label" for="inputTelefonoCotizar">Télefono</label>
                  <div class="input-group w-100">
                      <div class="input-group-prepend w-100">
                          <span class="input-group-text">+56</span>
                          <input type="text" class="form-control" id="inputTelefonoCotizar" name="inputTelefonoCotizar" required>
                      </div>
                  </div>
              </div>
              <div class="form-group w-100">
                  <label class="label" for="texAreaMensajeCotizar">Consulta</label>
                  <input class="form-control" id="texAreaMensajeCotizar" name="texAreaMensajeCotizar"></input>
              </div>
              <div class="form-group col-md-12 ">
                  <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox"
                          name="inputCheckboxCotizar" checked>
                      <label class="custom-control-label" for="inputCheckboxCotizar">
                          <small>Quiero que Brick Inmobiliaria me contacte</small> 
                      </label>
                  </div>
              </div>
          </div>
          <div class="form-group w-100">
              <div class="text-center py-4">
                  <button  
                      class="g-recaptcha btn btn-primary px-5 al-btn al-btn--white boton_enviar" 
                      type="submit"
                      name="boton_enviarCotizar"
                      value="enviar"
                      id="botonEnviarCotizar" 
                      data-badge="inline"
                      disabled>
                      Cotizar
                  </button><br>
                  <span class="ajax-loader"></span>
              </div>
          </div>
      </form>
  </div>
</div>