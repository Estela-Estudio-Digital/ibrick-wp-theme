<?php
    get_template_part('includes/header'); 
    bk_main_before();
      $taxonomy = 'tipo';
      $terms_args = array(
      'orderby' => 'title',
      'hide_empty' => true,
      'parent' => 4
      );
      
      $cats = get_terms( $taxonomy, $terms_args );
      foreach ($cats as $cat) :
?>
<div class="container">
    <div class="row laign-items-stretch">
        <div class="col-12 mt-5">
            <h3 class="text-uppercase"><span class="secondary-title font-weight-bold"><?php echo $cat->name; ?></span></h3>
        </div>
    </div>
</div>

<?php 
$query = new WP_Query(array(
    'post_type'      	=> 'proyectos',
    'posts_per_page'	=> -1,
    'post_status'		=> 'publish',
    'tax_query'         => array (
        array(
            'taxonomy'      => $taxonomy,
            'field'          => 'slug',
            'terms'         => $cat->slug
        ),
    ),
  ));
  include( locate_template( './includes/templates/proyectos_destacados.php', false, false) ); ?>

<?php endforeach; ?>
<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
