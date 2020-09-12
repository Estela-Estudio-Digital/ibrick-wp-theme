<?php
    get_template_part('includes/header'); 
    bk_main_before();
/*
Template Name: Rentas
*/
?>
<section class="primary-hero" style="position:relative;">
    <div class="blur-img" style="background:url('<?php bloginfo('template_directory');?>/assets/img/rentas1Brick.jpg')">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="<?php bloginfo('template_directory');?>/assets/img/rentas1Brick.jpg" alt="Rentas Brick">
                <h3 class="text-uppercase section-title rentas-hero-title font-weight-bold">
                    <span class="primary-title">Gestionamos el arriendo</span><br>
                    <span class="secondary-title">de tu propiedad</span>
                </h3>
            </div>
        </div>
    </div> 
</section>
<div class="container">
    <div class="row border-bottom">
        <div class="col-12 mt-5">
            <h3 class="text-uppercase mt-5">
                <span class="secondary-title primary-color font-weight-bold">¿POR QUÉ ES BUEN NEGOCIO </span><br>
                <span class="secondary-title color-primary font-weight-bold" >INVERTIR EN PROPIEDADES?</span>
            </h3>
        </div>
        <div class="col-lg-6">
            <ul class="pr-md-5 my-5">
                <li class="mb-4">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <img src="<?php bloginfo('template_directory');?>/assets/img/place.svg" alt="">
                        </div>
                        <div class="rentas-sub-title">
                            <span class="secondary-title font-weight-bold">ALTA DEMANDA </span>
                            <span class="secondary-title color-primary font-weight-bold">POR ARRIENDO</span>
                        </div>
                    </div>
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> En los últimos años han habido importantes cambios sociales y demográficos
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> Cada vez es más difícil juntar el pie para comprar una propiedad
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> Cada vez son más los que valoran tener flexibilidad
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> Cada día se valora más vivir en buenas ubicaciones, cerca de servicios, entretención, seguridad y conectividad
                </li>
            </ul>
        </div>
        <div class="col-lg-6">
            <ul class="pr-md-5 my-5">
                <li class="mb-4">
                    <div class="d-flex align-items-center">
                        <div class="mr-3">
                            <img src="<?php bloginfo('template_directory');?>/assets/img/profit.svg" alt="">
                        </div>
                        <div class="rentas-sub-title">
                            <span class="secondary-title font-weight-bold">INVERSIÓN </span>
                            <span class="secondary-title color-primary font-weight-bold">ATRACTIVA</span>
                        </div>
                    </div>
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> Hoy hay pocas alternativas de inversión
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> Las bajas tasas, hacen que sea factible conseguir financiamiento
                </li>
                <li class="my-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/check.svg" class="mr-2" style="max-width:20px"> La renta residencial es la inversión inmobiliaria que mejor resiste a la crisis
                </li>
            </ul>
        </div>
    </div>
    <div class="row laign-items-stretch">
        <div class="col-12 my-5">
            <h3 class="text-uppercase"><span class="secondary-title font-weight-bold">¿Como</span> <span class="secondary-title color-primary font-weight-bold">lo hacemos?</span></h3>
        </div>
        <div class="col-lg-3">
            <ul class="px-5 py-3 card shadow  after-number-1" style="height:100%">
                <li class="mb-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/zoom.svg" alt="">
                </li>
                <li>
                    Buscamos y evaluamos al arrendatario
                </li>
            </ul>
        </div>
        <div class="col-lg-3">
            <ul class="px-5 py-3 card shadow  after-number-2" style="height:100%">
                <li class="mb-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/money.svg" alt="">
                </li>
                <li>
                    Cobramos el arriendo y lo depositamos mensualmente en tu cuenta
                </li>
            </ul>
        </div>
        <div class="col-lg-3">
            <ul class="px-5 py-3 card shadow  after-number-3" style="height:100%">
                <li class="mb-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/tools.svg" alt="">
                </li>
                <li>
                    Administramos tu departamento
                </li>
                <li><small>- Pago de cuentas</small></li>
                <li><small>- Pago de Contribuciones</small></li>
                <li><small>- Reparaciones</small></li>
                <li><small>- Contratos Legales</small></li>
            </ul>
        </div>
        <div class="col-lg-3">
            <ul class="px-5 py-3 card shadow  after-number-4" style="height:100%">
                <li class="mb-3">
                    <img src="<?php bloginfo('template_directory');?>/assets/img/legal.svg" alt="">
                </li>
                <li>
                Reportamos mensualmente el estado del departamento y de tu inversión
                </li>
            </ul>
        </div>
    </div>
</div>
<section class="container mt-5 pt-5">
    <div class="row">
<?php 
$taxonomy = 'tipo';
$terms = get_terms($taxonomy);

foreach ($terms as $term):
$query = new WP_Query(array(
    'post_type'      	=> 'proyectos',
    'posts_per_page'	=> 4,
    'post_status'		=> 'publish',
    'orderby'           => 'title',
    'order'             => 'ASC',
    'tax_query'         => array (
        array(
            'taxonomy'      => $taxonomy,
            'field'          => 'slug',
            'terms'         => $term->slug
        ),
    ),
  ));
?>
        <div class="col-md-4">
            <h2 class="text-uppercase section-title">
                <span class="primary-title"><?php echo $term->name;?></span>
            </h2>
            <?php   if ( $query->have_posts() ) : ?>
            <ul>
            <?php while ( $query->have_posts() ) : $query->the_post();?>
                <li><a href="<?php echo the_permalink();?>"><?php echo the_title();?></a></li>
            <?php endwhile; wp_reset_postdata(); ?>
            </ul>
            <?php endif;?>
        </div>
  <?php endforeach;?>
    </div>
</section>
<?php 
$taxonomy = 'tipo';
$query = new WP_Query(array(
    'post_type'      	=> 'proyectos',
    'posts_per_page'	=> 4,
    'post_status'		=> 'publish',
    'tax_query'         => array (
        array(
            'taxonomy'      => $taxonomy,
            'field'          => 'slug',
            'terms'         => 'renta'
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
                        <h3 class="text-uppercase"><?php echo the_title(); ?></h3>
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
