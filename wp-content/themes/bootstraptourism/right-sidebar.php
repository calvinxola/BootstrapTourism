<?php
/*
 *
 *      Template Name: Right Sidebar
 *
 */
 ?>

<?php get_header(); ?>

<div class="page-width right-sidebar">  
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