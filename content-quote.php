<?php
/**
*	content - quote.php
*		
*	Default template for displaying post with quote format
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
	</div>
</article>