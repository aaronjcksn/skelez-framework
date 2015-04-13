<?php
/**
*	Content.php
*		
*	Default template for displaying content
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article Header -->
	<header class="entry_header">
		<!-- if a single post as a thumbnail and it is not password protected then it is displayed as the thumbnail -->
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
			<figure class="entry_thumbnail">
				<?php the_post_thumbnail(); ?>
			</figure>
		<?php endif; ?>

		<?php if ( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<p class="entry_meta">
			<?php  
				// displays meta information
				alpha_post_meta();
			?>
		</p>
	</header>

	<!-- Article Content -->
	<div class="entry-content">
		<?php
			if ( is_search() ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading &rarr;', 'alpha'));

				wp_link_pages();
			}

		?>
	</div>

	<!-- Article Footer -->
	<div class="entry-footer">
		<?php
			// If there is a single page and the author bio exists, display it
			if (is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by', 'alpha') . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta ( 'description' ) . '</p>';
			}
		?>
	</div>
</article>