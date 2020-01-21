<?php

//Enqueue styles
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    wp_enqueue_style( 'responsive-style', get_stylesheet_directory_uri() . '/css/response.css' );    
}

function theme_js() {
    wp_enqueue_script( 'main_js', get_stylesheet_directory_uri() . '/js/main.js', '1.0', true );
    wp_enqueue_script( 'embed_js', get_stylesheet_directory_uri() . '/js/embed.js', '1.0', true );
}
add_action('wp_enqueue_scripts', 'theme_js');

//Blog 'Read More'
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">Continue reading...</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

//Content tags
function wpse_allowedtags() {
    return '<script>,<style>,<br>,<em>,<i>,<ul>,<ol>,<li>,<a>,<p>,<img>,<video>,<audio>';
}
add_filter('wpse_custom_wp_trim_excerpt','wpden_excerpt');

//JS Parsing
if (!(is_admin() )) {
    function defer_parsing_of_js ( $url ) {
        if ( FALSE === strpos( $url, '.js' ) ) return $url;
        if ( strpos( $url, 'jquery.js' ) ) return $url;
        // return "$url' defer ";
        return "$url' defer onload='";
    }
    add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );
}