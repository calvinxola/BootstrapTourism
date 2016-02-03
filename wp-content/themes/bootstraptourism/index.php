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
        if (is_front_page() && !is_home()){
            get_template_part( 'content', 'post' );
        }else{
            get_template_part( 'content', 'blog' );
        }
    else : 
        get_template_part( 'content', 'none' ); 
    endif; 
    
    if (is_front_page() && !is_home()){
    ?>
        <div class="block-features">  
            <h2 class="subheading"><span><?php features_archive_title(); ?></span></h2>
            <div class="features">
                <?php
                
                $posts = get_posts ("post_type='feature'&showposts=3");
                
                if ($posts) {
                    foreach ($posts as $post):
                        setup_postdata($post); ?>
                        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <div class="feature-thumb">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                            
                            <div class="feature-content">
                                <h2 class="feature-title">
                                    <a href="<?php the_permalink(); ?>"><?php short_title('...', 45); ?></a>
                                </h2>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                <?php endforeach;
                }     
                ?>
            </div>
        </div>
    
        <div class="block-rows"> 
            <?php if (!dynamic_sidebar('Home Content')) : endif; ?>
        </div>
    <?php } ?>
</div>

<?php get_footer(); ?>