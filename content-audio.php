<?php
/**
*	content - audio.php
*		
*	Default template for displaying Audio post format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article Header -->
	<header class="entry_header">
		
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
		
			the_content( __( 'Continue reading &rarr;', 'alpha'));

			wp_link_pages();

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