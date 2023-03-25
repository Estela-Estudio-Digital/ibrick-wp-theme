<div class="row justify-content-between py-5 align-items-center">
          <div class="col-md-4 <?php echo ( $count % 2 === 0 ) ? '' : 'order-md-2'; ?>">
              <div class="project-info-wrapper">
                  <div class="project-info-logo">
                        <?php if($logo_proyecto):?>
                        <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="primary-logo">
                        <?php else:?>
                        <h3><?php echo the_title(); ?></h3>
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
                    <a href="<?php echo bloginfo('url');?>/proyectos/tarapaca" class="btn btn-primary px-5 shadow"> Ver proyecto</a>
                  <?php endif; ?>
                  <?php if ($url_landing) :?>
                    <a href="<?php echo $url_landing;?>" class="btn btn-primary px-5 shadow" target="_blank"> Ver proyecto</a>
                  <?php endif; ?>
                  <?php if ($tag_del_ptroyecto['label'] != 'Normal') :?>
                      <span class="label-vendido shadow bg-primary-color text-white px-3 py-1"><?php echo $tag_del_ptroyecto['label']; ?></span>
                  <?php endif; ?>
              </div>
          </div>
          <div class="col-md-7 mt-4 mt-lg-0 <?php echo ( $count % 2 === 0 ) ? '' : 'order-md-1'; ?>">
              <div class="shadow">
                    <?php if(has_post_thumbnail()):?>
                  <picture>
                      <source media="(min-width: 768px)" srcset="<?php echo $desktop[0]; ?>">
                      <img src="<?php echo $mobile[0]; ?>" alt="Brick Inmobiliaria">
                  </picture>
                    <?php else:?><h3>
                        <img src="<?php bloginfo('template_directory');?>/assets/img/imgNoDisponible.png" alt="Brick Inmobiliaria">
                    <?php endif;?>
              </div>
          </div>
        </div>