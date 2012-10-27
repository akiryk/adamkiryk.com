<?php

/**
***********************
** IMPORTANT **
* If you move this to the remote server it won't display home page!!!
* Update display_category() below to the correct ids
*/

// Make theme available for translation
// Translations can be filed in the /languages/ directory
load_theme_textdomain( 'your-theme', TEMPLATEPATH . '/languages' );
 
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
    require_once($locale_file);
 
// Get the page number
function get_page_number() {
    if ( get_query_var('paged') ) {
        print ' | ' . __( 'Page ' , 'your-theme') . get_query_var('paged');
    }
} // end get_page_number

// Add featured images
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 75, 75, true ); // default post thumbnails
add_image_size( 'index-post-thumb', 175,175,true );
add_image_size( 'single-post-thumbnail', 150, 150, true ); // Permalink thumbnail size
add_image_size( 'agg-page', 610,9999 ); // 
add_image_size( 'post-wide-image', 740, 9999);
add_image_size( 'post-outset-image', 930, 9999);

/**
* Add custom image to wordpress media gallery
*/
add_filter( 'image_size_names_choose', 'custom_image_sizes_choose' );  
function custom_image_sizes_choose( $sizes ) {  
    $custom_sizes = array(  
        'post-wide-image' => 'Wide Image (for standard placement)',
        'post-outset-image' => 'Widest Image (for outset placement)'
    );  
    return array_merge( $sizes, $custom_sizes );  
} 

// ************************************************
// Register nav menu (wordpress 3.0: http://bitly.com/cDxMX4)
// ************************************************
add_action( 'init', 'register_my_menu' );

function register_my_menu() {
	register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
}


// ************************************************
// Let home page display post types other then "POST"
// ************************************************

add_filter( 'pre_get_posts', 'get_other_content_types' );

function get_other_content_types( $query ) {

	if ( is_home() && false == $query->query_vars['suppress_filters'] )
		$query->set( 'post_type', array( 'post', 'portfolio-item', 'gallery' ) );

	return $query;
}

/*
* Load scripts in correct wp manner
*/
function my_scripts_method() {
    wp_enqueue_script(
        'scripts',
        get_template_directory_uri() . '/js/scripts.js',
        array('jquery')
    );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

function load_fit_vids() {
    wp_enqueue_script(
        'fitvids',
        get_template_directory_uri() . '/js/fitvids/jquery.fitvids.js'
    );
}
add_action('wp_enqueue_scripts', 'load_fit_vids');

function load_modernizr() {
    wp_enqueue_script(
        'modernizr',
        get_template_directory_uri() . '/js/modernizr-2.5.3.js'
    );
}
add_action('wp_enqueue_scripts', 'load_modernizr');

/*
* Only display certain categories on the home page
* 
*/
function display_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'cat', '19, 21' ); // 4 live; e.g. 19 = 'news' and 21 = 'politics'
    }
}
add_action( 'pre_get_posts', 'display_category' );

?>