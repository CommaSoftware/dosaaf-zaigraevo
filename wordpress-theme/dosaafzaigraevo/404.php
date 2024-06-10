<?php
get_header();
?>

	<section id="page-404" class="section">
		<div class="container">
			<div class="page-404__error-message">
				<h2>Ошибка 404</h2>
				<p>К сожалению, запрашиваемая вами страница не найдена</p>
			</div>
			<div class="page-404__bg">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/car-404.jpg" alt="Автомобиль с наклейкой 404">
			</div>
		</div>
	</section>

<?php
get_footer();
?>