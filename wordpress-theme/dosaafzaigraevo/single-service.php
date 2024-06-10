<?php

/*
 Template name: Страница
 Template post type: service
*/

get_header();
?>

<?php $args = array(
	'post_type' => array( 'service' ),
	'publish'	=> true,	);
	$query = new WP_Query( $args );
	if( have_posts() ) {
		while (have_posts()) {	the_post(); ?>
			<section class="section">
				<div class="thumbnail-wrapper dark-background is--bottom-round">
					<?php if (has_post_thumbnail()) { ?>
						<div class="thumbnail-block">
							<img class="thumbnail-bg" loading="lazy" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
						</div>
					<?php } ?>
					<div class="container">
						<h1 class="container-title"><?php the_title(); ?></h1>
					</div>
				</div>
				<div class="container wp-content">
					<?php the_content(); ?>
				</div>
			</section>
		<?php } wp_reset_postdata(); ?>	
	<?php } wp_reset_query(); ?>

<?php
get_footer();
?>