<section class="section dark-background is--top-round is--bottom-round" id="courses">
		<div class="secrion__scroll-wrapper">
			<?php
				$the_query = new WP_Query( array(
					'post_type' => 'service',
					'posts_per_page'=> -1,
					'order' => 'ASC'
				) );

				$i = 1;
				// цикл вывода полученных записей
				while( $the_query->have_posts() ){
					$the_query->the_post();
				?>
				<div class="courses <?php if ($i == 1) { echo 'is--active'; } ?>">
					<?php if (has_post_thumbnail()) { ?>
						<img class="courses__bg" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php get_the_post_thumbnail_caption( $post ); ?>" loading="lazy">
					<?php } ?>
					<div class="container">
						<article class="courses__article">
							<div class="courses__title-block">
								<h3 class="container-title"><?php the_title(); ?></h3>
								<div class="courses__info">
									<ul>
										<?php if (get_post_meta($post->ID, 'education_period', 1) != '') { ?><li><b>Срок освоения</b> – <?php echo get_post_meta($post->ID, 'education_period', 1); ?></li><?php } ?>
										<?php if (get_post_meta($post->ID, 'education_form', 1) != '') { ?><li><b>Форма обучения</b> – <?php echo get_post_meta($post->ID, 'education_form', 1); ?></li><?php } ?>
										<?php if (get_post_meta($post->ID, 'education_level', 1) != '') { ?><li><b>Уровень образования</b> – <?php echo get_post_meta($post->ID, 'education_level', 1); ?></li><?php } ?>
										<?php if (get_post_meta($post->ID, 'education_profession', 1) != '') { ?><li><b>Код и наименование профессии</b> – <?php echo get_post_meta($post->ID, 'education_profession', 1); ?></li><?php } ?>
									</ul>
								</div>
							</div>
							<div class="courses__price">
								<?php if (get_post_meta($post->ID, 'price', 1) != '') { ?>
									<p><?php echo get_post_meta($post->ID, 'price', 1); ?><sup>₽</sup></p>
								<?php } ?>
								<div class="courses__btns">
									<a href="<?php echo get_home_url(); ?>#contacts" class="btn is--red" type="submit">Связаться</a>
									<a href="<?php the_permalink(); ?>" class="btn is--black" type="submit">Подробнее</a>
								</div>
							</div>
							<div class="courses__mouse-icon">
								<svg class="mouse-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27 34" style="enable-background:new 0 0 27 34;" xml:space="preserve"><path d="M13.5,5.1c0.2,0,0.4,0.1,0.6,0.2c0.2,0.2,0.2,0.4,0.2,0.6v3.2c0,0.2-0.1,0.4-0.2,0.6c-0.1,0.2-0.4,0.2-0.6,0.2s-0.4-0.1-0.6-0.2c-0.2-0.2-0.2-0.4-0.2-0.6V5.9c0-0.2,0.1-0.4,0.2-0.6C13.1,5.2,13.3,5.1,13.5,5.1z M19.9,18.1c0,1.7-0.7,3.4-1.9,4.6c-1.2,1.2-2.8,1.9-4.5,1.9s-3.3-0.7-4.5-1.9c-1.2-1.2-1.9-2.9-1.9-4.6V8.4C7.1,6.6,7.8,5,9,3.8c1.2-1.2,2.8-1.9,4.5-1.9s3.3,0.7,4.5,1.9c1.2,1.2,1.9,2.9,1.9,4.6V18.1z M13.5,0.2c-2.1,0-4.2,0.9-5.7,2.4C6.3,4.1,5.5,6.2,5.5,8.4v9.8c0,2.2,0.8,4.2,2.3,5.7c1.5,1.5,3.5,2.4,5.7,2.4s4.2-0.9,5.7-2.4c1.5-1.5,2.3-3.6,2.3-5.7V8.4c0-2.2-0.8-4.2-2.3-5.7C17.7,1.1,15.6,0.2,13.5,0.2z M14.4,33.4l4.6-4.6c0.3-0.3,0.3-0.8,0-1.1s-0.8-0.3-1.1,0l-4.5,4.5L9,27.7c-0.3-0.3-0.8-0.3-1.1,0s-0.3,0.8,0,1.1l4.6,4.6c0.2,0.2,0.6,0.4,0.9,0.4S14.1,33.6,14.4,33.4z"/></svg>
							</div>
							<span class="courses__page-info"><?php echo $i, "/", $the_query->found_posts; ?></span>
						</article>
					</div>
				</div>
			<?php $i++; } wp_reset_postdata(); wp_reset_query(); ?>
		</div>
	</section>