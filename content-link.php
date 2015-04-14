<?php
/**
*	content - link.php
*		
*	Default template for displaying post with Link format
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- Article Header -->

	<!-- Article Content -->
	<div class="entry-content">
		<?php
			the_content( __( 'Continue reading &rarr;', 'alpha'));
			wp_link_pages();
		?>
	</div>

	<!-- Article Footer -->
	<div class="entry-footer">
		<p class="entry_meta">
			<?php  
				// displays meta information
				alpha_post_meta();
			?>
		</p>

		<?php
			// If there is a single page and the author bio exists, display it
			if (is_single() && get_the_author_meta( 'description' ) ) {
				echo '<h2>' . __( 'Written by', 'alpha') . get_the_author() . '</h2>';
				echo '<p>' . the_author_meta ( 'description' ) . '</p>';
			}
		?>
	</div>
</article>