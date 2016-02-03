<?php
/*
 *
 *      The main template file.
 *
 */
 ?>

<?php get_header(); ?>

<div class="page-width">  
    <?php 
    if (have_posts()) : 
//        if (is_front_page() && !is_home()){
            get_template_part( 'content', 'blog' );
//        }else{
//            get_template_part( 'content', 'blog' );
//        }
    else : 
        get_template_part( 'content', 'none' ); 
    endif; 
    ?>
</div>

<?php get_footer(); ?>