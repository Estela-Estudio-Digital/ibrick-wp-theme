<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Residencial
*/
?>
<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-uppercase section-title">
                <span class="primary-title">Proyectos</span><br>
                <span class="secondary-title">Residenciales</span>
            </h2>
        </div>
    </div>
</div>
<?php 
$taxonomy = 'tipo';
$query = new WP_Query(array(
    'post_type'      	=> 'proyectos',
    'posts_per_page'	=> -1,
    'post_status'		=> 'publish',
    'tax_query'         => array (
        array(
            'taxonomy'      => $taxonomy,
            'field'          => 'slug',
            'terms'         => 'residencial'
        ),
    ),
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
                        <?php if($logo_proyecto):?>
                        <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="primary-logo">
                        <?php else:?>
                        <h4 class="text-uppercase"><?php echo the_title(); ?></h4>
                        <?php endif;?>
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
                    <?php if(has_post_thumbnail()):?>
                  <picture>
                      <source media="(min-width: 768px)" srcset="<?php echo $desktop[0]; ?>">
                      <img src="<?php echo $mobile[0]; ?>" alt="Inmobiliaria Brick">
                  </picture>
                    <?php else:?><h3>
                        <img src="<?php bloginfo('template_directory');?>/assets/img/imgNoDisponible.png" alt="Inmobiliaria Brick">
                    <?php endif;?>
              </div>
          </div>
        </div>
    <?php endwhile; wp_reset_postdata(); ?>
    </div>
    </section>
  <?php endif;?>


<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
