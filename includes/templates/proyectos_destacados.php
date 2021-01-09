   <?php 
  
  $count = 1;
  if ( $query->have_posts() ) : ?>
    <section class="home-content my-md-5">
      <div class="container">
    <?php while ( $query->have_posts() ) : $query->the_post();
    $count++;

    $tiene_contenidos = get_field('tiene_contenidos');

    // CUSTOM FLIELDS Descripciones
    $grupo_de_datos = get_field('grupo_de_datos');
    $ubicacion = $grupo_de_datos['ubicacion'];
    $precio_desde = $grupo_de_datos['precio_desde'];
    $tipologia_txt = $grupo_de_datos['tipologia_txt'];
    $tag_del_ptroyecto = $grupo_de_datos['tag_del_ptroyecto'];
    $descripcion_proyecto = $grupo_de_datos['descripcion_proyecto'];
    $folleto = $grupo_de_datos['folleto'];
    $metro_cercano = $grupo_de_datos['metro_cercano'];
    $metro_futuro = $grupo_de_datos['metro_futuro'];
    
    // CUSTOM FLIELDS Imágenes Generales
    $slider_proyecto = get_field('slider_proyecto');
    $logo_proyecto = get_field('logo_proyecto');
    $url_landing = get_field('url_landing');

    // Setup this post for WP functions (variable must be named $post).
    setup_postdata($post); 
    $desktop = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    $mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
    ?>
      <div class="row justify-content-between py-5 align-items-center">
          <div class="col-md-4 <?php echo ( $count % 2 === 0 ) ? '' : 'order-md-2'; ?>">
              <div class="project-info-wrapper">
                  <div class="project-info-logo">
                      <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" style="max-height:100%">
                  </div>
                  <div class="project-info-text my-5">
                      <?php if ($tipologia_txt):?>
                      <p><b><?php echo $tipologia_txt;?></b></p>
                      <?php endif; ?>
                      <?php if ($ubicacion):?>
                      <p><?php echo $ubicacion;?></p>
                      <?php endif; ?>
                      <?php if ($metro_cercano):?>
                      <p>
                        <?php if ($metro_futuro):?>
                          <img src="<?php bloginfo('template_directory');?>/assets/img/metro-sin-color.svg" alt="Cercano al Metro" style="max-width:45px" class="mr-1">
                        <?php else: ?>
                          <img src="<?php bloginfo('template_directory');?>/assets/img/metro-color.svg" alt="Cercano al Metro" style="max-width:45px" class="mr-1">
                        <?php endif; ?>
                        <?php echo $metro_cercano;?>
                      </p>
                      <?php endif; ?>
                      <?php if ($precio_desde):?>
                      <p><span>Desde</span> <span>UF <?php echo $precio_desde;?></span></p>
                      <?php endif; ?>
                        <?php //if (is_front_page() && $descripcion_proyecto): ?>
                        <?php if ($descripcion_proyecto): ?>
                          <div class="descripcion_proyecto">
                          <small>
                            <?php echo $descripcion_proyecto;?>
                          </small>
                          </div>
                        <?php endif; ?>
                  </div>
                  <?php if ($tiene_contenidos === 'si') :?>
                    <a href="<?php echo the_permalink();?>" class="btn btn-secondary shadow"> Ver proyecto</a>
                  <?php endif; ?>
                  <?php if( $tiene_contenidos === 'no' && $folleto ): ?>
                      <a href="<?php echo $folleto; ?>" class="btn btn-secondary shadow text-capitalize" target="_blank">descargar folleto</a>
                  <?php endif; ?>
                  <?php if ($url_landing) :?>
                    <a href="<?php echo $url_landing;?>" class="btn btn-secondary shadow" target="_blank"> Ver proyecto</a>
                  <?php endif; ?>
                  
              </div>
          </div>
          <div class="col-md-7 mt-4 mt-lg-0 <?php echo ( $count % 2 === 0 ) ? '' : 'order-md-1'; ?>">
              <div class="shadow">
                <?php if(has_post_thumbnail()):?>
                  <?php if ($tag_del_ptroyecto['label'] != 'Normal') :?>
                      <span class="label-vendido shadow bg-primary-color text-white px-3 py-1"><?php echo $tag_del_ptroyecto['label']; ?></span>
                  <?php endif; ?>
                  <picture>
                      <source media="(min-width: 768px)" srcset="<?php echo $desktop[0]; ?>">
                      <img src="<?php echo $mobile[0]; ?>" alt="Brick Inmobiliaria" class="w-100">
                  </picture>
                    <?php else:?><h3>
                        <img src="<?php bloginfo('template_directory');?>/assets/img/imgNoDisponible.png" alt="Brick Inmobiliaria" class="w-100">
                    <?php endif;?>
              </div>
          </div>
        </div>
    <hr class="d-md-none">
    <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </section>
  <?php endif;?>