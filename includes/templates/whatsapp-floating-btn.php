
<section class="contact-floating-container-home follow-button-play">
    <ul class="contact-floating-list mb-4 mr-4 d-flex flex-column justify-content-between align-items-center">
        <li>
      <a class="d-inline whatsappButton" id="whatsappButton" href="<?php echo 'https://wa.me/' . get_field('whatsapp_general', 5) . '/?text=' . urlencode(get_field('texto_whatsapp_general', 5)); ?>" target="_blank" rel="noopener" aria-label="Contáctanos por WhatsApp">
                <ul class="d-flex align-items-center contact-floating-whatsapp">
                    <li class="contact-floating-link whatsappButton">
                        <img class="w-100" src="<?php bloginfo('template_directory');?>/assets/img/btn-whataspp.svg" alt="contacto" width="120" height="50">
                    </li>
                </ul>
                <!-- <span id="whatsappButtonAd">¿Necesitas ayuda?</span> -->
            </a>
        </li>
    </ul>
</section>
