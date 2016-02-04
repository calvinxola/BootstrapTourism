<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    
    <meta charset="<?php bloginfo('charset'); ?>" />
    
    <?php if (is_search()) { ?>
       <meta name="robots" content="noindex, nofollow" /> 
    <?php } ?>

    <title><?php bloginfo('name'); wp_title(); ?></title>
    
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
    <![endif]-->

    <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="master-header"> 
        <div class="page-width ">
            <div class="site-info">
                <div class="site-logo">
                    <a href="<?php echo get_option('home'); ?>" title="<?php echo get_bloginfo('name'); ?>" >
                        <img src="<?php echo get_template_directory_uri(); ?>/images/bootstrap-tourism-logo.png"/>
                    </a>
                </div>
            </div>
            
            <div class="contacts">
                <?php if (!dynamic_sidebar('Header')) :?><?php endif; ?>
            </div>
            
            <?php 
                wp_nav_menu( 
                    array(
                        'theme_location' => 'main_menu',
                        'menu_class' => 'main-menu menu closed' ,
                        'menu_id' => 'main-menu',
                        'container_class'=>'main-menu-wrap menu-wrap',
                        'container_id'=>''
                    )
                );
            ?>
        </div>
    </header>
    
    <section class="master-content"> 
        <?php  
        if (!is_front_page()){ 
        ?>
            <div class="page-header">
                <h2 class="page-title">
                    <?php  
                    if(is_home()){ 
                        posts_page_title();
                    }elseif(is_post_type_archive()){
                        post_type_archive_title();
                    }elseif(is_singular('feature')){
                        features_archive_title();
                    }else{
                        the_title();
                    }
                    ?>
                </h2>  
            </div>
        <?php 
        } 
        ?>