<?php

if ( ! function_exists( 'stylist_setup' ) ) :

	function stylist_setup() {

		load_theme_textdomain( 'stylist', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'stylist' ),
		) );

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-background', apply_filters( 'stylist_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'stylist_setup' );

function stylist_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'stylist_content_width', 640 );
}
add_action( 'after_setup_theme', 'stylist_content_width', 0 );

function stylist_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'stylist' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'stylist' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'stylist_widgets_init' );

function stylist_scripts() {

    wp_enqueue_style( 'all-css', 'https://use.fontawesome.com/releases/v5.1.1/css/all.css');
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style( 'stylist-style', get_stylesheet_uri() );

    wp_enqueue_script( 'jquery-1', get_template_directory_uri() . '/libs/jquery-3.3.1.slim.min.js', array(), '20151215', true );
    wp_enqueue_script( 'jquery-2', get_template_directory_uri() . '/libs/jquery-2.2.4.min.js', array(), '20151215', true );
    wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/libs/popper.min.js', array(), '20151215', true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/libs/bootstrap.min.js', array(), '20151215', true );
    wp_enqueue_script( 'libs-js', get_template_directory_uri() . '/js/libs.min.js', array(), '20151215', true );
    wp_enqueue_script( 'common-js', get_template_directory_uri() . '/js/common.js', array(), '20151215', true );
	wp_enqueue_script( 'stylist-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'stylist-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'stylist_scripts' );



add_filter('wpcf7_form_elements', function($content) {
    $content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
    return $content;
});

add_action('manage_posts_custom_column', 'jss_custom_columns');
add_filter('manage_edit-gallery_columns', 'jss_add_new_gallery_columns');

function jss_add_new_gallery_columns( $columns ){
    $columns = array(
        'cb'				=>		'<input type="checkbox">',
        'jss_post_thumb'	=>		'Thumbnail',
        'title'				=>		'Photo Title',
        'phototype'			=>		'Photo Type',
        'author'			=>		'Author',
        'date'				=>		'Date'

    );
    return $columns;
}

function jss_custom_columns( $column ){
    global $post;

    switch ($column) {
        case 'jss_post_thumb' : echo the_post_thumbnail('admin-list-thumb'); break;
        case 'description' : the_excerpt(); break;
        case 'phototype' : echo get_the_term_list( $post->ID, 'phototype', '', ', ',''); break;
    }
}

//add thumbnail images to column
add_filter('manage_posts_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'jss_add_post_thumbnail_column', 5);

// Add the column
function jss_add_post_thumbnail_column($cols){
    $cols['jss_post_thumb'] = __('Thumbnail');
    return $cols;
}

function jss_display_post_thumbnail_column($col, $id){
    switch($col){
        case 'jss_post_thumb':
            if( function_exists('the_post_thumbnail') )
                echo the_post_thumbnail( 'admin-list-thumb' );
            else
                echo 'Not supported in this theme';
            break;
    }
}


add_theme_support( 'post-thumbnails' );




add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
    echo '<style>
        td.jss_post_thumb.column-jss_post_thumb img {
            max-width: 100px;
            height: 100px;
            width: auto;
        }
  </style>';
}












require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';

if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

