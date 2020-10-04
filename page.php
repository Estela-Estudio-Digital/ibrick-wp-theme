<?php
    get_template_part('includes/header'); 
    bk_main_before();
?>
<?php if(have_posts()) : while(have_posts()) : the_post(); 

the_content();
?>
    
<?php endwhile; endif;?>
<?php 
    bk_main_after();
    get_template_part('includes/footer'); 
?>
