<?php
define('FS_METHOD','direct');

// Auto Save
define('AUTOSAVE_INTERVAL', 3000);
define('WP_DEBUG', true);

// Filter~Actions
add_filter( 'auto_update_plugin', '__return_true' );
add_filter( 'pre_option_link_manager_enabled', '__return_true' );

// Remove GENERATED BY WORDPRESS
remove_action('wp_head', 'wp_generator');

// Windows Liver Writer
remove_action('wp_head', 'wlwmanifest_link');

// Remove the Shortcut link of header.
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_filter('term_description','wpautop');


remove_action('wp_head', 'wp_generator');

function wpbeginner_remove_version() {
    return '';
}
add_filter('the_generator', 'wpbeginner_remove_version');

// remove os emojis
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// on call js add #async ex: jquery.min.js#async
function async_scripts( $url )
{
    if ( strpos( $url, '#async') === false )
        return $url;
    else if ( is_admin() )
        return str_replace( '#async', '', $url );
    else
        return str_replace( '#async', '', $url )."' async='async";
}
add_filter( 'clean_url', 'async_scripts', 11, 1 );