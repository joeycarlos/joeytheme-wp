<?php

function learningWordPress_resources() {

	wp_enqueue_style('style', get_stylesheet_uri());

}

add_action('wp_enqueue_scripts', 'learningWordPress_resources');

// Navigation Menus
register_nav_menus(array(
	'primary' => __('Primary Menu'),
));

function wpb_load_fa() {

wp_enqueue_style( 'wpb-fa', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

}

add_action( 'wp_enqueue_scripts', 'wpb_load_fa' );

function get_cats_by_slug($catslugs) {
    $catids = array();
    foreach($catslugs as $slug) {
        $catids[] = get_category_by_slug($slug)->term_id; 
        //store the id of each slug in $catids
    }
    return $catids;
}