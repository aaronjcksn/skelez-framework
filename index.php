<?php
/**
* The is the main template file
*
*/
?>

<?php get_header(); ?>

<section class="container">
	<article class="content" role="main">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part('content', get_post_format() ); ?>
		<?php endwhile; ?>


		<?php alpha_paging_nav(); ?>

		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>
	</article>
</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>