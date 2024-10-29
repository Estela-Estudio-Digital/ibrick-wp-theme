<?php ?>
<!-- <div class="container-fluid position-relative bg-white"> -->
    <div class="container project-wrapper-section">
        <div class="row align-items-stretch mb-4">
            <div class="col-md-12 project-wrapper-content px-0">
                <ul class="d-md-flex justify-content-between align-items-stretch m-0">
                    <?php if ($tipologia_select && $tipologia_select != 'Seleccionar') :?>
                    <li class="py-4 py-md-0 projec-wrapper-content-item project-wrapper-content-tipo d-flex align-items-center justify-content-center">
                        <h2 class="tipologia-label">
                            <?php echo $tipologia_select['label']; ?>
                        </h2>
                    </li>
                    <hr class="d-md-none">
                    <?php endif; ?>
                    <?php if ($precio_desde):?>
                    <li class="project-wrapper-content-item d-flex align-items-center">
                        <div class="w-100 project-wrapper-content-ubicacion" data-toggle="tooltip" data-placement="bottom" title="<?php echo $legal; ?>">
                            <ul class="d-flex align-items-center justify-content-center w-100 precio-block">
                                <li class="mr-1 precio-block-item">
                                    <ul class="precio-block-span">
                                        <li class="precio-block-desde">DESDE</li>
                                        <li class="precio-block-uf">UF</li>
                                    </ul>
                                </li>
                                <li class="precio-block-item">
                                    <h4 class="m-0"><span class="precio-block-title"><?php echo $precio_desde;?></span></h4>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <?php endif; ?>
                    <?php if ($imagen_de_promocion_desktop):?>
                        <li class="project-wrapper-content-item d-flex  align-items-center justify-content-center">
                            <div class="d-flex align-items-center px-5 py-1">
                                <img style="min-height: 50px; width:100%;" class="px-1" src="<?php echo $imagen_de_promocion_desktop['url'];?>" alt="Promoción">
                            </div>
                        </li>
                        <hr class="d-md-none">
                    <?php endif; ?>
                    <?php if ($caracteristicas_complemento || $imagen_de_promocion_desktop) : ?>
                    <li class="pt-md-0 d-flex justify-content-center">
                        <div class="complement-ads-container shadow d-flex justify-content-center align-items-center p-md-2">
                            <?php if ($caracteristicas_complemento_url) : ?>
                                <a href="<?php echo $caracteristicas_complemento_url; ?>" class="complement-ads-bottom">
                                    <img src="<?php echo $caracteristicas_complemento['url'];?>" alt="<?php echo $caracteristicas_complemento['alt'];?>" class="w-100">
                                </a>
                            <?php endif; ?>
                        </div>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
<!-- </div> -->