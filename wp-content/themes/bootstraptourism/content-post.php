<?php

/*
 * 
 * 
 * 
 */

?>

<?php while ( have_posts() ) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php  if (is_single()){ ?>
            <div class="post-header">
                <h3 class="post-title"> <?php the_title(); ?> </h3>
            </div>
        <?php } ?>    
        
        <?php
        if ( has_post_thumbnail() ){
            the_post_thumbnail('large');
        } 
        ?>
        
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
        
        <?php 
        if (is_single() && comments_open()){
            comments_template();
        }
         ?>
    </div>
<?php endwhile;  ?>