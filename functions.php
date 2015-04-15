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
			)
		 );

		// Add support for automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// Add support for post thumbnails 
		add_theme_support('post-thumbnails' );

		// Register nav menus
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'skelez' )
			)
		 );
	}

	add_action( 'after_theme_setup', 'alpha_setup' ); 
}

/**
*
* -----------------------------------------------------------------
*	Displays meta information for specific post
* -----------------------------------------------------------------
*/

if ( ! function_exists('alpha_post_meta') ) {
	function alpha_post_meta() {
		echo '<ul class="list-inline entry-meta">';

		if ( get_post_type() === 'post' ) {
			// shows marked sticky post
			if ( is_sticky() ) {
				echo '<li class="meta-featured-post"><i class="fa fa-thumb-tack"></i> ' . __( 'Sticky', 'alpha' ) . '</li>';
			}

			// get post author
			printf(
					'<li class="meta-author"><a href="%1$s" rel="author">%2$s</a></li>',
					esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
					get_the_author()
				);

			// get the date
			echo '<li class="meta-date"> ' . get_the_date() . ' </li>';

			// the categories
			$category_list = get_the_category_list(',' );
			if ( $category_list ) {
				echo '<li class="meta-categories"> ' . $category_list . ' </li>';
			}

			// the tags
			$tag_list = get_the_tag_list('', ',' );
			if ( $tag_list ) {
				echo '<li class="meta-tag"> ' . $tag_list . ' </li>';
			}

			// comments
			if ( comments_open() ) : 
				echo '<li>';
				echo '<span class="meta-reply">';
				comments_popup_link( __( 'Level a comment', 'alpha'), __('One comment so far', 'alpha' ), __( 'Veiw all % comments', 'alpha') );
				echo '</span>';
				echo '</li>';
			endif;
			
			// edit link
			if ( is_user_logged_in() ) {
				echo '<li>';
				edit_post_link( __('Edit', 'alpha'), '<span class="meta-edit">', '</span>');
				echo '</li>';
			}	
		}
	}
}

/**
*
* -----------------------------------------------------------------
*	Display navigation to the next/previous set of post
* -----------------------------------------------------------------
*/

if ( ! function_exists('alpha_paging_nav') ) {
	function alpha_paging_nav() { ?>
		<ul>
			<?php if ( get_previous_posts_link(); ?>
			<li class="next">
				<?php get_previous_posts_link( __( 'Newer Posts &rarr;', 'alpha' ) ); ?>
			</li>
			<?php endif; ?>
			<?php if ( get_next_posts_link(); ?>
			<li class="next">
				<?php get_next_posts_link( __( 'Newer Posts &rarr;', 'alpha' ) ); ?>
			</li>
			<?php endif; ?>

		</ul> <?php

	}
}
?>