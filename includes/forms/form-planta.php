<?php ?>

<div class="wp-block-contact-form-7-contact-form-selector w-100">
  <div class="wpcf7 brickcf7 w-100" role="form"  id="wpcf7-f560-o1" lang="es-ES" dir="ltr" class="w-100 wp">
      <div class="screen-reader-response">
          <p role="status" aria-live="polite" aria-atomic="true"></p>
          <ul></ul>
      </div>
      
      <form
          method="post"
          class="wpcf7-form formulario_cotizar_planta formulario-general"
          style="max-width: 400px;"
          name="cotizar_proyecto"
          id="formulario_cotizar_proyecto"
          role="form">
          <div style="display: none;">
              <input type="hidden" name="_wpcf7" value="560">
              <?php 
                  $plugin_data = get_plugin_data( ABSPATH . 'wp-content/plugins/contact-form-7/wp-contact-form-7.php' );
                  echo '<input type="hidden" name="_wpcf7_version" value="'.$plugin_data['Version'].'">';
              ?>
              <input type="hidden" name="_wpcf7_locale" value="en_US">
              <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f560-o1">
              <input type="hidden" name="_wpcf7_container_post" value="0">
              <input type="hidden" name="nombreProyecto" class="nombreProyecto">
              <input type="hidden" name="producto" class="inputProducto" value="<?php echo $texto_titulo; ?> <?php echo esc_html($label); ?> + <?php echo $cantidad_de_banos; echo ($cantidad_de_banos == "1") ? " Baño" : " Baños"; ?>">
              <input type="hidden" name="logoProyecto" class="logoProyecto">
              <input type="hidden" name="superficieUtil" class="superficieUtil">
              <input type="hidden" name="superficieTerraza" class="superficieTerraza">
              <input type="hidden" name="superficieTotal" class="superficieTotal" >
              <input type="hidden" name="dormitorios" class="dormitorios" >
              <input type="hidden" name="imgPlanta" class="imgPlanta" >
              <input type="hidden" name="esquicio" class="esquicio" >
              <input type="hidden" name="unidades" class="unidades" >
              <input type="hidden" name="corresponde" class="corresponde" >
              <input type="hidden" name="urlProyecto" class="urlProyecto" value="<?php echo get_permalink($vincular_planta_a_proyecto->ID);?>">
              <input type="hidden" name="correo_ventas" class="correo_ventas" value="<?php echo $correos_ventas;?>">

              <input type="hidden" name="idProducto" class="inputIdProducto">
              <input type="hidden" name="token" class="tokenplanok">
              <input type="hidden" name="fuenteSbj" class="fuenteSbj">
              <input type="hidden" name="medioSbj" class="medioSbj">
          </div>
          <div class="form-row">
              <div class="form-group col-md-12 ">
                  <label class="label" for="inputNameCotizar">Nombre</label>
                  <input type="text" class="form-control" id="inputNameCotizar" name="inputNameCotizar" required>
              </div>
              <div class="form-group col-md-12 ">
                  <label class="label" for="inputLastNameCotizar">Apellido</label>
                  <input type="text" class="form-control" id="inputLastNameCotizar" name="inputLastNameCotizar" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                  <label class="label" for="inputEmailCotizar">Email</label>
                  <input type="email" class="form-control" id="inputEmailCotizar" name="inputEmailCotizar" required>
              </div>
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
                      class="g-recaptcha btn btn-primary px-5 al-btn al-btn--white boton_enviar text-uppercase botonEnviarCotizarPlanta" 
                      type="submit"
                      name="boton_enviarCotizar"
                      value="enviar"
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