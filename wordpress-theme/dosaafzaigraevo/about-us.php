<?php
	$the_query = new WP_Query( array(
		'post_type' => 'page',
		'name'		=> 'about-us',
	) );
	// цикл вывода полученных записей
	while( $the_query->have_posts() ){
		$the_query->the_post();
?>
	<section class="section dark-background  is--top-round is--bottom-round">
		<div class="container" id="about-us">
			<article class="article-content wp-content">
				<?php the_content(); ?>
			</article>
		</div>
	</section>
<?php } wp_reset_postdata(); wp_reset_query(); ?>
<!-- <div class="about-us__btn">
	<a href="#!" class="btn is--red" type="submit" id="document-section">Документы</a>
</div> -->