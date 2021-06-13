<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-5N8TJPD');</script>
  <!-- End Google Tag Manager -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5N8TJPD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php bk_navbar_before();
if(is_singular('proyectos')): 
  $vincular_planta_a_proyecto = get_field('vincular_planta_a_proyecto');
  $logo_proyecto = get_field('logo_proyecto', $vincular_planta_a_proyecto->ID);
  ?>

<nav class="navbar navbar-expand-lg bg-white py-2 menu-nav-fixed" id="proyectosMenu">
    <div class="container d-flex justify-content-between">
        <button class="d-none d-md-block slide-nav-button hamburger hamburger--emphatic p-2 mr-4 ">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      <a href="<?php bloginfo('url');?>">
        
          <img src="<?php bloginfo('template_directory');?>/assets/img/primary-logo.svg" height="100" alt="Inmobiliaria Brick" class="primary-logo">
        
      </a>
      <button class="colapse-hamburger hamburger hamburger--emphatic navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav2" aria-controls="navbarNav2" aria-expanded="false" aria-label="Toggle navigation">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav2">
        <ul id="projectMenu" class="text-uppercase m-0 text-center text-md-left d-md-flex justify-content-end align-items-center w-100">
            <li class="mr-md-5 my-5 my-md-0">
              <a href="#proyecto">
                <b>Proyecto</b>
              </a>
            </li>
            <li class="mr-md-5 my-5 my-md-0">
              <a href="#plantas">
                <b>Plantas</b>
              </a>
            </li>
            <li class="mr-md-5 my-5 my-md-0">
              <a href="#galeria">
                <b>Galería</b>
              </a>
            </li>
            <li class="mr-md-5 my-5 my-md-0">
              <a href="#masterPlan">
                <b>Master Plan</b>
              </a>
            </li>
            <li class="mr-md-5 my-5 my-md-0">
              <a href="#ubicacion">
                <b>Ubicación</b>
              </a>
            </li>
            <li class="mr-md-5 my-5 my-md-0">
              <img src="<?php echo $logo_proyecto['url'];?>" alt="Inmobiliaria Brick" style="max-height:42px">
            </li>
        </ul>
      </div>
  </div>
</nav >
<?php endif; ?>

<?php if (is_singular('plantas')): 
  $vincular_planta_a_proyecto = get_field('vincular_planta_a_proyecto');
  $logo_proyecto = get_field('logo_proyecto', $vincular_planta_a_proyecto->ID);
?>
<nav class="bg-white py-3 " id="plantasMenu">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <a href="<?php bloginfo('url');?>">
          <img src="<?php bloginfo('template_directory');?>/assets/img/primary-logo.svg" alt="Inmobiliaria Brick" class="primary-logo">
      </a>
      <ul class="text-uppercase d-md-flex align-items-center m-0 w-100 justify-content-end text-center text-md-left main-menu">
          <li class="mr-md-5  d-none d-md-block">
            <a href="#" id="verMasModelos" class="btn btn-primary btn-sm bk--btn__primary shadow" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              Ver más modelos
            </a>
          </li>
          <li class="mr-md-5 my-md-0">
            <a href="<?php echo get_permalink($vincular_planta_a_proyecto); ?>#plantas" class="btn btn-secondary btn-sm bk--btn__primary shadow">
              Volver
            </a>
          </li>
          <li class="mr-md-5 d-none d-md-block">
            <img src="<?php echo $logo_proyecto['url'];?>" alt="Inmobiliaria Brick" style="max-height:40px">
          </li>
      </ul>

    </div>
  </div>
</nav >
<?php else: ?>
<nav class="navbar navbar-expand-lg bg-white py-3 main-menu d-block" id="elseMenu">
  <div class="container d-flex justify-content-between">
    <a href="<?php bloginfo('url');?>">
      
        <img src="<?php bloginfo('template_directory');?>/assets/img/primary-logo.svg" height="100" alt="Inmobiliaria Brick" class="primary-logo">
      
    </a>
    <button class="colapse-hamburger hamburger hamburger--emphatic navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="text-uppercase d-md-flex align-items-center m-0 w-100 justify-content-end text-center text-md-left">
          <li class="mr-md-5 my-5 my-md-0 link-residencial"><a href="<?php echo site_url('residencial');?>">
            <b>Residencial</b></a>
          </li>
          <li class="mr-md-5 my-5 my-md-0 link-comercial"><a href="<?php echo site_url('comercial');?>">
            <b>Renta Comercial</b></a>
          </li>
          <li class="mr-md-5 my-5 my-md-0 link-rentas"><a href="<?php echo site_url('rentas');?>">
            <b>Rentas</b></a>
          </li>
          <li class="mr-md-5 my-5 my-md-0 link-industrial"><a href="<?php echo site_url('industrial');?>">
            <b>Industrial</b></a>
          </li>
          <li class="mr-md-5 my-5 my-md-0 link-somos-brick"><a href="<?php echo site_url('somos-brick');?>">
            <b>Somos Brick</b></a>
          </li>
          <li class="mr-md-5 my-5 my-md-0"><a href="#" class="btn btn-secondary btn-sm bk--btn__primary shadow contactoModalBtn"><i class="far fa-envelope"></i> 
            Contáctanos</a>
          </li>
      </ul>
    </div>
  </div>
</nav >
<?php endif; ?>
<nav class='container bk-primary-nav <?php echo (is_singular('proyectos')) ? "d-flex justify-content-center" : "" ?>' id="allMenu">
  <ul class="bk-primary-nav__menu">
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'navbar',
          'container'       => false,
          'menu_class'      => '',
          'fallback_cb'     => '__return_false',
          'items_wrap'      => '<ul id="%1$s" class="navbar-nav mr-auto mt-2 mt-lg-0 %2$s">%3$s</ul>',
          'depth'           => 2,
          'walker'          => new bk_walker_nav_menu()
        ) );
      ?>
  </ul>
</nav>
<main id="main">
<!--   <div class="cd-loader">
    <div class="cd-loader__grid text-center">
      <div class="spinner"><img src="<?php bloginfo('template_directory');?>/assets/img/bicon.png" alt="Inmobiliaria Brick" />
    </div>
      <small>cargando...</small>
    </div>
  </div> -->