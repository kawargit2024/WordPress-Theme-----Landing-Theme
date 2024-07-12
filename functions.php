<?php

function landing_wp_theme_setup(){

    // automatic-feed-links
   	add_theme_support("automatic-feed-links");
    // title-tag
   	add_theme_support("title-tag");
   	// post-formas
   	// add_theme_support(
   	//   'post-formats', 
   	//  array('image','video','gallery', 'audio','slider',
   	//   )
    // );

// nav menus //
   	register_nav_menus(
   		array(
	      "menu"=> esc_html ("Main Menu For All Pages","landing"),
	      // "secondary"=> esc_html ("Secondary Menu","landing"),
   	   )
     );

// custom logo
    
   $logo_width = 300;
   $logo_height = 300;

   add_theme_support('custom-logo',
   	array(
    'width'=> $logo_width,
    'height'=> $logo_height,
    'flexible-width' =>true,
    'flexible-height' =>true,
   ));

   // html5 supports
   add_theme_support( 'html5', 
   	array( 
   		'comment-list', 
   		'comment-form', 
   		'search-form', 
   		'gallery', 
   		'caption', 
   		'style', 
   		'script' ) 
   );

   // custom-header
   add_theme_support( 'custom-header' );

   // post-thumbnail
   	add_theme_support("post-thumbnails");

   // category-thumbnail
    add_image_size("cat-thumb", 300, 999);

   // customizer support
   	add_theme_support('customizer');

   // customize-selective-refresh support
   	add_theme_support( 'customize-selective-refresh-widgets' );

    // searechform  support.
    add_theme_support( 'html5', array( 'search-form' ) );

   //custom-header
   add_action('landing-custom-header-display', 'landing_custom_header_display');
   add_action('landing-custom-header-page', 'landing_custom_header_page');
   add_action('landing-custom-header-global', 'landing_custom_header_global');
   
   // custom footer
    add_action('landing-custom-footer-display','landing_custom_footer_display');
  
    add_theme_support('wp-block-styles');

    //add_theme_support( 'woocommerce' );
   //comment reply
    add_action('wp_enqueue_scripts', 'landing_enqueue_comments_reply');


}
add_action("after_setup_theme","landing_wp_theme_setup");

// Enqueue Scripts
function landing_wp_theme_scripts(){
wp_enqueue_style("bootstrap-min-css", get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(),
    wp_get_theme()->get( 'Version' ) );
wp_enqueue_style("fancybox-css", get_template_directory_uri() . "/assets/css/jquery.fancybox.css", array(),
    wp_get_theme()->get( 'Version' ) );
 wp_enqueue_style("owl-carousel-min-css", get_template_directory_uri() . "/assets/css/owl-carousel.min.css", array(),
     wp_get_theme()->get( 'Version' ) );
wp_enqueue_style("queries-css", get_template_directory_uri() . "/assets/css/queries.css", array(),
    wp_get_theme()->get( 'Version' ) );
wp_enqueue_style("animate-css", get_template_directory_uri() . "/assets/css/animate.css", array(),
    wp_get_theme()->get( 'Version' ) );
wp_enqueue_style("font-awesome-css", get_template_directory_uri() . "/assets/css/all.min.css", array(),
   wp_get_theme()->get( 'Version' ) );

wp_enqueue_style("montserrat-fonts", "https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,600,700,800", array(), wp_get_theme()->get( 'Version' ) );

wp_enqueue_style("Playfair-fonts", "https://fonts.googleapis.com/css?family=Playfair+Display:400,400i&amp;subset=cyrillic", array(),wp_get_theme()->get( 'Version' ) );

wp_enqueue_style("Open-Sans-fonts", "https://fonts.googleapis.com/css?family=Open+Sans:300,400", array(), wp_get_theme()->get( 'Version' ) );

wp_enqueue_style("Oswald-fonts", "https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap", array(),wp_get_theme()->get( 'Version' ) );

wp_enqueue_style('langing-page-style-sheet', get_stylesheet_uri(). '', array(), wp_get_theme()->get( 'Version' ) );

wp_enqueue_script('bootstrap-bundle', get_template_directory_uri(). "/assets/js/bootstrap.bundle.min.js", array('jquery'),'5.2.3', true);
wp_enqueue_script('portfolio-work-scripts', get_template_directory_uri(). "/assets/js/work.js", array('jquery'),'1.0.0', true);

wp_enqueue_script('modernizr', get_template_directory_uri(). "/assets/js/modernizr.js", false ,'', false);

wp_enqueue_script('wow-js', get_template_directory_uri(). "/assets/js/wow.min.js", array(),wp_get_theme()->get( 'Version' ), true);

wp_enqueue_script('scrolltop-js', get_template_directory_uri(). "/assets/js/jquery.scrolltop.min.js", array(), wp_get_theme()->get( 'Version' ), true);  

wp_enqueue_script('custom', get_template_directory_uri(). "/assets/js/custom.js", array(), wp_get_theme()->get( 'Version' ), true);
}
add_action("wp_enqueue_scripts","landing_wp_theme_scripts");



//site logo

function landing_site_logo(){
    $custom_logo_id = get_theme_mod('custom_logo');
    $custom_logo_url = esc_url ( wp_get_attachment_url($custom_logo_id) );
    if( $custom_logo_url ){
    echo '<img src="' . $custom_logo_url . '" alt="'. __('site logo','landing').'">';
    }else{
    echo esc_html ( get_bloginfo('name') );
    }

}


//comment reply script
function landing_enqueue_comments_reply()
{
    if (is_single()) {
        wp_enqueue_script("comment-reply");
    }
}


// adding sidebar widget

function landing_resiter_sidebar(){
    register_sidebar(array(
        'name' => esc_html__('Default Sidebar', 'landing'),
        'id' => 'default-sidebar',
        'description' => esc_html__('Appears as the sidebar on blog and pages', 'landing'),
        'before_widget' => '<div id="%1$s" class="widget %2$s clearfix">', 'after_widget' => '</div>',
        'before_title' => '<h3 class="widgettitle">',
        'after_title' => '</h3> <div class="widget-border"></div>',
    ));
}
add_action('widgets_init','landing_resiter_sidebar');


// modify post excerpt & remove [...]

function modify_post_excerpt_more($readMoreBtn){
 $readMoreBtn = sprintf('<a class="readMoreBtn" href="%1$s">%2$s</a>',  
    get_permalink(get_the_ID() ),
     __('Continue...','landing'));

 return $readMoreBtn;

}
add_filter('excerpt_more','modify_post_excerpt_more');


//excerpt word limit
function post_excerpt_length_limit($excerpt_length){
 return 35;
}
add_filter('excerpt_length','post_excerpt_length_limit',999);


remove_filter('the_content', 'wpautop');


//  woocommerce hook for wishlist

function modify_browse_wishlist_label(){
  return "<i class='fa-solid fa-heart'></i>";
}
add_filter('yith-wcwl-browse-wishlist-label','modify_browse_wishlist_label');





// Include Theme Scripts & Style

include(get_template_directory() . '/inc/plugin-install.php');
include(get_template_directory() . '/inc/custom-header.php');
include(get_template_directory() . '/inc/custom-footer.php');
include(get_template_directory() . '/inc/comment-template.php');
include(get_template_directory() . '/inc/related-post.php');









