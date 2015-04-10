<?php
/**
*
* -----------------------------------------------------------------
*	Defined constants
* -----------------------------------------------------------------
*/

define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'FRAMEWORK', get_template_directory() . '/framework' );


/**
*
* -----------------------------------------------------------------
*	Load framework
* -----------------------------------------------------------------
*/

require_once( FRAMEWORK . '/init.php' );


/**
*
* -----------------------------------------------------------------
*	Setting the content width based on the theme
* -----------------------------------------------------------------
*/

if ( ! isset( $content_width ) ) {
	$content_width = 800;
}

/**
*
* -----------------------------------------------------------------
*	Set up skelez default and register various supported features
* -----------------------------------------------------------------
*/

if ( ! function_exists('alpha_setup') ) {
	function alpha_setup() {
		// Make the theme available for translation
		$lang_dir = THEMEROOT . '/languages';
		load_theme_textdomain( 'skelez', $lang_dir );

		// Add support for post formats
		add_theme_support( 'post-formats',
			array(
				'gallery',
				'link',
				'image',
				'quote',
				'video',
				'audio'
			);
		 );

		// Add support for automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// Add support for post thumbnails 
		add_theme_support('post-thumbnails' );

		// Register nav menus
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'skelez' );
			);
		 );
	}

	add_action( 'after_theme_setup', 'alpha_setup' ); 
}