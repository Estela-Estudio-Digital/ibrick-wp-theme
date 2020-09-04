</main>
<?php bk_footer_before();?>

  <?php //if(is_active_sidebar('footer-widget-area')): ?>
    <?php //dynamic_sidebar('footer-widget-area'); ?>
  <?php //endif; ?>

<footer class="container-fluid py-5 bg-secondary-color text-white">
  <div class="container">
    <div class="row align-items-center pb-4">
        <div class="col-sm-12">
          <ul class="d-md-flex align-items-center text-center text-md-left text-uppercase main-menu">
            <li class=" pr-md-5">
              <img src="<?php bloginfo('template_directory');?>/assets/img/footer-logo.svg" alt="Brick Inmobiliaria" class="primary-logo">
            </li>
            <li class="d-none d-md-block"><a href="<?php echo site_url('residencial');?>" class="text-white mr-5">Residencial</a></li>
            <li class="d-none d-md-block"><a href="<?php echo site_url('comercial');?>" class="text-white mr-5">Comercial</a></li>
            <li class="d-none d-md-block"><a href="<?php echo site_url('rentas');?>" class="text-white mr-5">Rentas</a></li>
            <li class="d-none d-md-block"><a href="<?php echo site_url('somos-brick');?>" class="text-white mr-5">Somos Brick</a></li>
            <li class="d-none d-md-block"><a href="#" class="text-white contactoModalBtn mr-5">Contáctanos</a></li>
          </ul>
        </div>
    </div>
    <hr>
    <div class="row align-items-center text-center">
        <div class="col-sm-12">
          <ul class="d-md-flex w-100 m-0 justify-content-between">
            <li>
              <ul class="d-flex justify-content-center">
                <li class="mr-2">
                  <a href="#">
                    <span class="footer-icon-span">
                      <img src="<?php bloginfo('template_directory');?>/assets/img/instagram-brands.svg" alt="Instagram" class="footer-icon-img">
                    </span>
                  </a>
                </li>
                <li class="mr-2">
                  <a href="#">
                    <span class="footer-icon-span">
                      <img src="<?php bloginfo('template_directory');?>/assets/img/facebook-brands.svg" alt="Facebook" class="footer-icon-img">
                    </span>
                  </a>
                </li>
                <li class="mr-2">
                  <a href="#">
                    <span class="footer-icon-span">
                      <img src="<?php bloginfo('template_directory');?>/assets/img/youtube-brands.svg" alt="youtube" class="footer-icon-img">
                    </span>
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
    <div class="row pt-2">
      <div class="col-sm-12">
        <div class="d-sm-flex justify-content-between">
          <p class="footer-legal-text"><small>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url('/'); ?>">Inmobiliaria Brick</a>. Todos los derechos reservados. </small></p>
          <p class="footer-legal-text"><a href="https://www.zinker.cl/" target="_blank"><small>Desarrollado por <b>Zinker</b></small></a></p>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="modal fade" id="contacto-form-modal" tabindex="-1" role="dialog" aria-labelledby="kit-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-body wpcf7" role="form" id="wpcf7-f9-o1" lang="es-ES" dir="ltr">
                <form method="post" class="wpcf7-form formulario_cotizar formulario-general" name="formulario_inicial" id="formulario_inicial">
                    <div style="display: none;">
                        <input type="hidden" name="_wpcf7" value="9">
                        <input type="hidden" name="_wpcf7_version" value="5.2.1">
                        <input type="hidden" name="_wpcf7_locale" value="en_US">
                        <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f9-o1">
                        <input type="hidden" name="_wpcf7_container_post" value="0">
                    </div>
                    <div class="container-fluid">
                        <div class="row justify-content-center align-items-stretch py-4" >
                            <div class="col-lg-6 col-xl-5 order-md-1 text-center px-5">
                                <h4 class="pb-5 aling-self-start text-uppercase"><b>Contáctanos</b></h4>
                                <div class="form-row text-left">
                                    <div class="form-group w-100 px-4">
                                        <span class="bk-projectcart--text__span"></span>
                                        <label class="label" for="inputName">Nombre y apellido</label>
                                        <input type="text" class="form-control" id="inputName" name="inputName" required>
                                    </div>
                                    <div class="form-group w-100 px-4">
                                        <label class="label" for="inputEmail">Email</label>
                                        <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                                    </div>
                                    <div class="form-group w-100 px-4">
                                        <label class="label" for="inputTelefono">Teléfono</label>
                                        <input type="text" class="form-control" id="inputTelefono" name="inputTelefono" required>
                                    </div>
                                    <div class="form-group w-100 px-4">
                                        <label class="label" for="texAreaMensaje">Mensaje</label>
                                        <input class="form-control" id="texAreaMensaje" name="texAreaMensaje"></input>
                                    </div>
                                    <div class="form-group w-100">
                                        <div class="text-center py-4">
                                            <button  
                                                type="submit" name="boton_enviar" value="enviar"
                                                class="g-recaptcha btn btn-primary px-5 al-btn al-btn--white" 
                                                id="boton_enviar" 
                                                data-badge="inline">
                                                Enviar
                                            </button><br>
                                            <span class="ajax-loader"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php //bk_footer_after();?>

<?php //bk_bottomline();?>

<?php wp_footer(); ?>
</body>
</html>
