<?php
/**
 *  
 * 
 * 
 */
?>

<?php while ( have_posts() ) : the_post(); ?>
    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
        <div class="post-thumb">
            
            <a href="<?php the_permalink(); ?>">
                <?php 

                if ( has_post_thumbnail() ){
                    the_post_thumbnail('medium');
                }else{ ?>

                    <img src="<?php echo get_template_directory_uri(); ?>/images/post-thumb-medium.jpg"/>

                <?php
                }
                ?>  
            </a>
        </div>

        <div class="post-body">
            <h2 class="post-title">
                <a href="<?php the_permalink(); ?>"><?php short_title('...', 45); ?></a>
            </h2>
        
            <div class="post-excerpt">
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
<?php endwhile;  ?>