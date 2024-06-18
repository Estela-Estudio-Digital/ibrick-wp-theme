<section class="container-fluid <?php echo $theme === 'dark' ? 'bg-secondary-color' : ''; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12 py-5">
                <a href="<?php echo site_url('/pasos-a-seguir'); ?>">
                <img src="<?php bloginfo('template_directory');?>/assets/img/video-mobile.jpg" alt="play" class="w-100 d-lg-none">
                    <div class="pasos-wrapper py-4 px-md-5 mb-4 d-none d-lg-block">
                        <ul class="d-md-flex justify-content-between align-items-center">
                            <li>
                                <h3 class="mb-0 text-white mb-xl-2 text-uppercase">Pasos a seguir...</h3>
                                <ul class="d-md-flex align-items-center">
                                    <li><img src="<?php bloginfo('template_directory');?>/assets/img/tocar.png" alt="play" width="55"></li>
                                    <li class="px-4"><p class="text-white mt-4" style="font-size: 1.5rem; max-width: 400px">Te guiamos para que la compra de tu depto sea sencilla e informada</p></li>
                                </ul>
                            </li>
                            <li>
                                <img class="w-100" alt="proceso de compra" src="<?php bloginfo('template_directory');?>/assets/img/ejecutivo-ventas.png">
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>