<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K5HN7JSH');</script>
<!-- End Google Tag Manager -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<?php if(is_singular('proyectos')): 
  $vincular_planta_a_proyecto = get_field('vincular_planta_a_proyecto');
  $logo_proyecto = get_field('logo_proyecto', $vincular_planta_a_proyecto->ID);
  $theme = get_field('esquema_de_colores');
?>

<body <?php body_class($theme); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K5HN7JSH"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<?php if (is_front_page() || is_page('residencial') || is_page('1785')): ?>
  <script SameSite="None; Secure" src="https://cdn.landbot.io/landbot-3/landbot-3.0.0.js"></script>
  <script>
    var myLandbot = new Landbot.Livechat({
      configUrl: 'https://storage.googleapis.com/landbot.online/v3/H-1538205-MXKA3G62PL96V0HN/index.json',
    });
  </script>
<?php endif; ?>

<?php bk_navbar_before(); ?>

<nav class="navbar navbar-expand-lg bg-white py-2 menu-nav-fixed" id="proyectosMenu">
    <div class="container d-flex justify-content-between">
        <button class="d-none d-md-block slide-nav-button hamburger hamburger--emphatic p-2 mr-4 ">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      <a href="<?php bloginfo('url');?>">
          <img src="<?php bloginfo('template_directory');?>/assets/img/logo-brick-2024.svg" width="150" height="100" alt="Inmobiliaria Brick" class="primary-logo">
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

<?php if (is_singular('plantas') || is_singular('plantas_api')): 
  $vincular_planta_a_proyecto = get_field('vincular_planta_a_proyecto');
	$id_proyecto = $vincular_planta_a_proyecto->ID > 1 ? $vincular_planta_a_proyecto->ID : 1090;
  $logo_proyecto = get_field('logo_proyecto', $id_proyecto);
?>
<nav class="bg-white py-3 " id="plantasMenu">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center">
      <a href="<?php bloginfo('url');?>">
          <img src="<?php bloginfo('template_directory');?>/assets/img/logo-brick-2024.svg" alt="Inmobiliaria Brick" width="150" class="primary-logo">
      </a>
      <ul class="text-uppercase d-md-flex align-items-center m-0 w-100 justify-content-end text-center text-md-left main-menu">
        <?php if (!is_singular('plantas_api')) : ?>
          <li class="mr-md-5  d-none d-md-block">
            <a href="#" id="verMasModelos" class="btn btn-primary btn-sm bk--btn__primary shadow" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
              Ver más modelos
            </a>
          </li>

        <?php endif; ?>
          <li class="mr-md-5 my-md-0">
            <a href="<?php echo get_permalink($id_proyecto) ? get_permalink($id_proyecto) : site_url('residencial'); ?>#plantas" class="btn btn-secondary btn-sm bk--btn__primary shadow">
              Volver
            </a>
          </li>
          <?php if ($logo_proyecto['url']) : ?>
          <li class="mr-md-5 d-none d-md-block">
            <a href="<?php echo get_permalink($vincular_planta_a_proyecto); ?>#plantas">
              <img src="<?php echo $logo_proyecto['url'];?>" alt="Inmobiliaria Brick" style="max-height:40px">
            </a>
          </li>
          <?php endif; ?>
      </ul>

    </div>
  </div>
</nav >
<?php else: ?>
<nav class="navbar navbar-expand-lg bg-white main-menu d-block" id="elseMenu">
  <div class="container d-flex justify-content-between">
    <a href="<?php bloginfo('url');?>" class="p-0">
      
        <img src="<?php bloginfo('template_directory');?>/assets/img/logo-brick-2024.svg" height="100" alt="Inmobiliaria Brick" width="150" class="primary-logo">
      
    </a>
    <button class="colapse-hamburger hamburger hamburger--emphatic navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
       
      <?php
        wp_nav_menu( array(
          'theme_location'  => 'primary',
          'container'       => false,
          'menu_class'      => '',
          'fallback_cb'     => '__return_false',
          'items_wrap'      => '<ul class="primary-menu-list text-uppercase d-md-flex m-0 w-100 align-items-center justify-content-end text-center text-md-left">%3$s</ul>',
          'depth'           => 2,
          'walker'          => new bk_walker_nav_menu()
        ) );
      ?>
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