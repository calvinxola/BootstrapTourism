<?php
/*
 *
 *      Template Name: Left Sidebar
 *
 */
 ?>

<?php get_header(); ?>

<div class="page-width left-sidebar">  
    <?php 
    if (have_posts()) : 
        get_template_part( 'content', 'post' );
    else : 
        get_template_part( 'content', 'none' ); 
    endif;   
    
    get_sidebar();
    ?>
</div>

<?php get_footer(); ?>