   <?php 
  $ids_2 = get_field('proyectos_destacados', 5, false);
  $query = new WP_Query(array(
      'post_type'      	=> 'proyectos',
      'posts_per_page'	=> 4,
      'post_status'		=> 'publish',
      'post__in'			=> $ids_2,
  ));
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
    
    // CUSTOM FLIELDS Imágenes Generales
    $slider_proyecto = get_field('slider_proyecto');
    $logo_proyecto = get_field('logo_proyecto');

    // Setup this post for WP functions (variable must be named $post).
    setup_postdata($post); 
    $desktop = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
    $mobile = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
    ?>
      <div class="row justify-content-between py-5 align-items-center">
          <div class="col-md-4 <?php echo ( $count % 2 === 0 ) ? '' : 'order-md-2'; ?>">
              <div class="project-info-wrapper">
                  <div class="project-info-logo">
                      <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="primary-logo">
                  </div>
                  <div class="project-info-text my-5">
                      <?php if ($tipologia_txt):?>
                      <p><b><?php echo $tipologia_txt;?></b></p>
                      <?php endif; ?>
                      <?php if ($ubicacion):?>
                      <p><?php echo $ubicacion;?></p>
                      <?php endif; ?>
                      <?php if ($precio_desde):?>
                      <p><span>Desde</span> <span>UF <?php echo $precio_desde;?></span></p>
                      <?php endif; ?>
                        <?php if (is_front_page() && $descripcion_proyecto): ?>
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
                  <?php if ($tag_del_ptroyecto['label'] != 'Normal') :?>
                      <span class="label-vendido shadow bg-primary-color text-white px-3 py-1"><?php echo $tag_del_ptroyecto['label']; ?></span>
                  <?php endif; ?>
              </div>
          </div>
          <div class="col-md-7 <?php echo ( $count % 2 === 0 ) ? '' : 'order-md-1'; ?>">
              <div class="shadow">
                  <picture>
                      <source media="(min-width: 768px)" srcset="<?php echo $desktop[0]; ?>">
                      <img src="<?php echo $mobile[0]; ?>" alt="Inmobiliaria Brick">
                  </picture>
              </div>
          </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
      </div>
    </section>
  <?php endif;?>