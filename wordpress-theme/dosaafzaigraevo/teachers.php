<section class="section light-background">
	<div class="container" id="teachers">
		<h2 class="container-title">Преподаватели</h2>
		<article class="teachers">
			<?php
				$the_query = new WP_Query( array(
					'post_type' => 'teacher',
					'posts_per_page'=> -1,
					'order' => 'DESC'
				) );
				// цикл вывода полученных записей
				while( $the_query->have_posts() ){
					$the_query->the_post();
			?>
				<div class="teachers__card">
					<div class="teachers__card__photo">
						<?php if (has_post_thumbnail()) { ?>
							<img loading="lazy" src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>">
						<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/teacher.jpg" alt="photo" loading="lazy">
						<?php } ?>
					</div>
					<h3 class="teachers__card__name"><?php the_title(); ?></h3>
					<div class="teachers__card__info">
						<?php the_content(); ?>
					</div>
				</div>
			<?php } wp_reset_postdata(); wp_reset_query(); ?>
		</article>
		<div class="teachers__btn">
			<a href="<?php echo get_theme_mod('teachers_info_btn_link', '#!'); ?>" target="blank" class="btn is--default"><?php echo get_theme_mod('teachers_info_btn_name', 'Скачать сведения'); ?></a>
		</div>
	</div>
</section>