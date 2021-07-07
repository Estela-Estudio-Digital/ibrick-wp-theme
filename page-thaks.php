<?php /*
Template Name: cotizacion-exitosa
*/
?>
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

    <link rel="stylesheet" id="bootstrap-css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css?ver=4.4.1" type="text/css" media="all">
</head>

<body <?php body_class(); ?>>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5N8TJPD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<main id="main">
<section class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
      <div class="col">
        <div class="thakyou-img text-center">
          <img
            alt="Thaks"
            class="w-100"
            src="<?php bloginfo('template_directory');?>/assets/img/cheque.png"
            style="max-width:150px;"
          >
        </div>
        <?php if(have_posts()) : while(have_posts()) : the_post(); 

        the_content();
        
        endwhile; endif;?>
      </div>
    </div>
</section>
</main>
