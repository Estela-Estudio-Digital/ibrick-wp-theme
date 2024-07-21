<?php ?>

<section class="container project-wrapper-container">
<div class="row align-items-stretch mb-4">
    <?php if ($logo_proyecto):?>
    <div class="col-12 d-md-none bg-white">
        <div class="p-4 text-center">
            <h1 class="m-0">
                <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="pr-4" >
                <div class="sr-only"><?php echo the_title(); ?></div>
            </h1>
        </div>
    </div>
    <?php endif; ?>
    <div class="<?php echo ($caracteristicas_complemento) ? "col-md-8" : "col-md-12";?> project-wrapper-content">
        <ul class="d-md-flex justify-content-around align-items-stretch m-0 mb-2 pt-3">
            <?php if ($logo_proyecto):?>
            <li class="project-wrapper-content-item project-wrapper-content-img d-none d-md-flex align-items-center justify-content-center ml-4">
                <div class="wrapper-img-project">
                    <h1 class="m-0">
                        <img src="<?php echo $logo_proyecto['url'];?>" alt="<?php echo $logo_proyecto['alt'];?>" class="pr-4" >
                        <div class="sr-only"><?php echo the_title(); ?></div>
                    </h1>
                </div>
            </li>
            <?php endif; ?>
            <?php if ($tipologia_select && $tipologia_select != 'Seleccionar') :?>
            <li class="py-4 py-md-0projec-wrapper-content-item project-wrapper-content-ubicacion project-wrapper-content-tipo d-flex align-items-center justify-content-center">
                <h2 class="tipologia-label">
                    <?php echo $tipologia_select['label']; ?>
                </h2>
            </li>
            <hr class="d-md-none">
            <?php endif; ?>
            <?php if ($imagen_de_promocion_mobile):?>
                <li class="project-wrapper-content-item d-md-none d-flex align-items-center justify-content-center">
                    <div class="text-center">
                        <img style="min-height: 50px; width:100%;" class="px-1" src="<?php echo $imagen_de_promocion_mobile['url'];?>" alt="Promoción">
                    </div>
                </li>
                <hr class="d-md-none">
            <?php endif; ?>
            <?php if ($precio_desde):?>
            <li class="project-wrapper-content-item d-flex align-items-center">
                <div class="w-100" data-toggle="tooltip" data-placement="bottom" title="<?php echo $legal; ?>">
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
        </ul>
    </div>
    <?php if ($caracteristicas_complemento || $imagen_de_promocion_desktop) : ?>
    <div class="col-md-4 w-100 pt-5 pt-md-0 d-flex justify-content-center">
        <div class="complement-ads-container shadow">
            <?php if ($caracteristicas_complemento_url) : ?>
                <a href="<?php echo $caracteristicas_complemento_url; ?>" class="complement-ads-bottom">
                    <img src="<?php echo $caracteristicas_complemento['url'];?>" alt="<?php echo $caracteristicas_complemento['alt'];?>" class="w-100">
                </a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
</section>