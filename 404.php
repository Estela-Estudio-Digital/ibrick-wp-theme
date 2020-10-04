<?php
    get_template_part('includes/header'); 
    bk_main_before();
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center py-4">
            <img src="<?php echo bloginfo('template_directory');?>/assets/img/404.png" alt="Contenido no encontrado" class="img-404">
            <div class="mt-5">
            <a href="<?php echo site_url() ?>" class="btn btn-secondary btn-sm bk--btn__primary shadow">
              Volver al sitio
            </a>
            </div>
        </div>
    </div>
</div>

<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
