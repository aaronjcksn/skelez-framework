<?php
/**
* The is the main template file
*
*/
?>

<section class="container">
	<article class="content">
		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<?php get_template_part('content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part('content', 'none'); ?>
		<?php endif; ?>
	</article>
</section>