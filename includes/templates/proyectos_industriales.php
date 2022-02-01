<?php 
  
  $count = 1;
  if ( $query->have_posts() ) : ?>
    <section class="mb-md-5">
      <div class="container">
        <div class="row align-items-stretch">
    <?php while ( $query->have_posts() ) : $query->the_post();
    $count++;

    $encabezado = get_field('encabezado');
    $cotizar = get_field('cotizar');
    $color_encabezado = get_field('color_encabezado');
    $color_encabezado_texto = get_field('color_encabezado_texto');
    $ubicacion = get_field('ubicacion');
    $area = get_field('area');

    // Setup this post for WP functions (variable must be named $post).
    setup_postdata($post); 
    $desktop = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    $mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
    ?>
          <div class="col-lg-4 mb-5">
            <ul class="card shadow rounded-0" style="height:100%">
              <?php if ($encabezado): ?>
                <li class="card-header text-center text-uppercase" style="border:none; background: <?php echo $color_encabezado; ?>">
                  <p class="mb-0" style="font-size:1rem; color: <?php echo $color_encabezado_texto; ?>">
                    <?php echo $encabezado; ?>
                  </p>
                </li>
              <?php endif;?>
                <li class="card-body text-center d-flex flex-column align-items-center justify-content-center">
                    <h1 style="font-size:1.4rem;"><?php echo the_title(); ?></h1>
                    <p><?php echo $ubicacion; ?></p>
                    <span style="width: 100px; height:4px; background: #2876A2; display: inline-block;" class="my-3"></span>
                    <p style="font-size:1.2rem;" class="mb-2"><?php echo $area; ?></p>
                    <?php if ($cotizar) : ?>
                    <a href="#" class="btn btn-primary contactoModalBtn" id="cotizarBodega">Consultar</a>
                    <?php endif;?>
                </li>
            </ul>
        </div>

    <hr class="d-md-none">
    <?php endwhile; wp_reset_postdata(); ?>
        </div>
      </div>
    </section>
  <?php endif;?>