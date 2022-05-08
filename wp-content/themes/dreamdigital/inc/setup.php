<?php
add_action( 'wp_enqueue_scripts', 'wp_enqueue' );
function wp_enqueue() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_style( 'app', get_template_directory_uri() . '/dest/css/app.css' );
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/dest/css/swiper-bundle.min.css' );
	wp_enqueue_script( 'app', get_template_directory_uri() . '/dest/js/app.js', array( 'jquery' ) );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/dest/js/swiper-bundle.min.js', array( 'jquery' ) );
}

add_filter( 'upload_mimes', 'upload_allow_types' );
function upload_allow_types( $mimes ) {
	$mimes['svg']  = 'image/svg';
	$mimes['webp'] = 'image/webp';
	$mimes['json'] = 'text/plain';

	return $mimes;
}

function get( $value, $keysDot, $default = null ) {
	$keys = explode( '.', $keysDot );
	foreach ( $keys as $key ) {
		$value = is_array( $value ) && array_key_exists( $key, $value ) ? $value[ $key ] : $default;
		if ( $value === $default ) {
			break;
		}
	}

	return $value;
}

add_action( 'after_setup_theme', 'theme_register_nav_menu', 0 );
function theme_register_nav_menu() {
	register_nav_menus( array(
		'header' => __( 'Header Menu', 'dreamdigital' ),
		'footer' => __( 'Footer Menu', 'dreamdigital' ),
	) );
}

add_theme_support( 'custom-logo' );

if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme General Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );

	acf_add_options_sub_page( array(
		'page_title'  => 'Theme Footer Settings',
		'menu_title'  => 'Footer',
		'parent_slug' => 'theme-general-settings',
	) );

}

add_action( 'init', 'register_reviews_post_type' );
function register_reviews_post_type() {
	$labels = array(
		'name'          => __( 'Reviews', 'dreamdigital' ),
		'singular_name' => __( 'Review', 'dreamdigital' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'review' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-comments',
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'reviews', $args );
}

add_action( 'init', 'register_faq_post_type' );
function register_faq_post_type() {
	$labels = array(
		'name'          => __( 'FAQ', 'dreamdigital' ),
		'singular_name' => __( 'FAQ', 'dreamdigital' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'faq' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-comments',
		'supports'           => array( 'title', 'editor' ),
		'taxonomies'         => array( 'category' ),
	);

	register_post_type( 'faq', $args );
}

add_action( 'init', 'register_blog_post_type' );
function register_blog_post_type() {
	$labels = array(
		'name'          => __( 'Blog', 'dreamdigital' ),
		'singular_name' => __( 'Blog', 'dreamdigital' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'blog' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'menu_icon'          => 'dashicons-admin-comments',
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'blog', $args );
}

add_filter( 'woocommerce_get_price_html', 'changeFreePriceNotice', 10, 2 );

function changeFreePriceNotice( $price, $product ) {
	if ( $price == wc_price( 0.00 ) ) {
		return 'FREE';
	} else {
		return $price;
	}
}

// ************* Remove default Posts type since no blog *************

// Remove side menu
add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
	remove_menu_page( 'edit.php' );
}

// Remove +New post in top Admin Menu Bar
add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'new-post' );
}

// Remove Quick Draft Dashboard Widget
add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove post type

add_action( 'admin_init', function () {
	global $pagenow;
	if ( $pagenow === 'edit-comments.php' ) {
		wp_redirect( admin_url() );
		exit;
	}
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	foreach ( get_post_types() as $post_type ) {
		if ( post_type_supports( $post_type, 'comments' ) ) {
			remove_post_type_support( $post_type, 'comments' );
			remove_post_type_support( $post_type, 'trackbacks' );
		}
	}
} );

add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );
add_filter( 'comments_array', '__return_empty_array', 10, 2 );
add_action( 'admin_menu', function () {
	remove_menu_page( 'edit-comments.php' );
} );
add_action( 'init', function () {
	if ( is_admin_bar_showing() ) {
		remove_action( 'admin_bar_menu', 'wp_admin_bar_comments_menu', 60 );
	}
} );