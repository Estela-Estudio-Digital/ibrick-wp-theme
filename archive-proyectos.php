<?php
    get_template_part('includes/header'); 
    bk_main_before();
?>
<div class="container-fluid mt-5 pt-5">
  <div class="row align-items-stretch">
    
    <div class="col-md-4 py-5 bg-primary d-none d-md-block pl-lg-5">
      <p class="text-white font-italic text-uppercase">Proyectos en venta</p>
      <!-- Se llenan los proyectos mediante javascript -->
      <ul class="bk--proyectos__venta-menu flex-column">
      </ul>

    </div>

    <div class="col-md-8">
      <div class="container-fluid">
          <div class="row align-items-stretch bk--proyectos">
          </div>
      </div>
    </div>

  </div><!-- /.row -->
</div><!-- /.container -->

<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
