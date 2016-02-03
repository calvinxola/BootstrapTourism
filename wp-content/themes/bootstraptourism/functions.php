<?php

    /*
     *      
     *      THEME FUNCTIONS
     */  
    if ( __FILE__ == $_SERVER['SCRIPT_FILENAME'] ) { die(); }

       
    
    //Clean up the <head>
    function removeHeadLinks() {
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    
    //RSS feeds support
    add_theme_support( 'automatic-feed-links' );
    
    
    //Scripts and Styles
    function bootstraptourism_scripts() {
        wp_register_style( 'style', get_stylesheet_uri(), array(), '1.0.0', all ); 
        
        wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    
        wp_enqueue_script( 'jquery', '/wp-includes/js/jquery/jquery.js' );
        
        wp_enqueue_script( 'custom-sj', get_template_directory_uri() . '/js/bootstraptourism.js' , array( 'jquery' ));
    
        wp_enqueue_style( 'style');
    }
    add_action( 'wp_enqueue_scripts', 'bootstraptourism_scripts' );
    
    
    //Removing default image link  
    function wpb_imagelink_setup() {
        $image_set = get_option( 'image_default_link_type' );
        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
    }
    add_action('admin_init', 'wpb_imagelink_setup', 10);

    
    //Title for posts page
    function posts_page_title() {
        $posts_page = get_option( 'page_for_posts' );            
        $title   = get_post( $posts_page )->post_title;
        echo $title;
    }

    
    //Short title for posts
    function short_title( $after = '', $length ) {
        $mytitle = get_the_title();
        if( mb_strlen( $mytitle ) > $length ) {
            $mytitle = substr( $mytitle, 0, $length );
            echo $mytitle . $after;
        } else echo $mytitle;
    }
    
    
    //Post thumbnail support    
    add_theme_support( 'post-thumbnails',array( 'post','feature') );
    
    
    //Custom post type (featuer)
    add_action( 'init', 'create_post_type' );
    function create_post_type() {
        register_post_type( 
            'feature',
            array(
                'labels' => array(
                    'name' => __( 'Features' ),
                    'singular_name' => __( 'Feature' ),
                    'plural_name' => __( 'Features' ),
                    'add_new' => __( 'New Feature' ),
                    'add_new_item' => __( 'New Feature' ),
                    'edit_item' => __( 'Edit Feature'),
                    'view_item'  => __( 'View Feature'),
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'features'),
//                'hierarchical' => true,
                'page-attributes'=>true,
                'supports' => array( 
                    'title',
                    'editor',
                    'author' ,
                    'thumbnail',
                    'excerpt', 
                    'custom-fields',
                    'page-attributes',
                    'revisions',  
                ),
            )
      );
    }

    
    //Title for features archive
    function features_archive_title() {
        $obj = get_post_type_object( 'feature' );
        echo $obj->labels->name;
    }
    
    
    //Length for post excerpts 
    function custom_excerpt_length( $length ) {
	return 40;
    }
    add_filter( 'excerpt_length', 'custom_excerpt_length' );
    
	
    //Replacing the excerpt "more" text by a link  
    function new_excerpt_more($more) {
        return '<p class="more-link-wrap"><a class="more-link" href="'. get_permalink($post->ID) . '">Read more</a><p>';
    }
    add_filter('excerpt_more', 'new_excerpt_more');
    
    
    //Menus    
    register_nav_menu('main_menu', __('Main menu'));
    
    
    //Widgetized areas
    register_sidebar(array(
        'name' => 'Header',
        'id'   => 'site-header',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Home Content',
        'id'   => 'home-content',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="subheading"><span>',
        'after_title'   => '</span></h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Left Sidebar',
        'id'   => 'sidebar-left',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
    
    register_sidebar(array(
        'name' => 'Right Sidebar',
        'id'   => 'sidebar-right',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
    register_sidebar(array(
        'name' => 'Site Footer',
        'id'   => 'site-footer',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ));
?>