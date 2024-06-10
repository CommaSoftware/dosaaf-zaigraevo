<section class="section light-background" id="main-section">
	<div class="container">
		<div class="main-name"></div>
		<div class="main-banner">
			<div class="main-banner__text-block">
				<h1 class="main-banner__text-block__title"><?php echo get_theme_mod('main_banner_title', 'Подготовка водителей всех категорий'); ?></h1>
				<h2 class="main-banner__text-block__text"><?php echo get_theme_mod('main_banner_subtitle', 'ПОУ Заигравеский РСТК РО ДОСААФ России РБ'); ?></h2>
				<a href="<?php echo get_theme_mod('main_banner_btn_link', '#contacts'); ?>" class="btn btn is--red" type="submit"><?php echo get_theme_mod('main_banner_btn_name', 'Связаться'); ?></a>
			</div>
			<div class="main-banner__image-block">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/car.png" alt="Автомобиль учебный" class="car-logo">
				<svg class="car-blick" width="681" height="387" viewBox="0 0 681 387" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g filter="url(#filter0_f_2008_5)"><path d="M315.327 157.72L322.455 139L327.545 156.68L353 163.96L329.582 173.32L322.455 191L315.327 173.32L297 163.96L315.327 157.72Z" fill="url(#paint0_radial_2008_5)"/></g><defs><pattern id="pattern0_2008_5" patternContentUnits="objectBoundingBox" width="1" height="1"><use xlink:href="#image0_2008_5" transform="scale(0.000295247 0.000664495)"/></pattern><filter id="filter0_f_2008_5" x="286.7" y="128.7" width="76.6" height="72.6" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feBlend mode="normal" in="SourceGraphic" in2="BackgroundImageFix" result="shape"/><feGaussianBlur stdDeviation="5.15" result="effect1_foregroundBlur_2008_5"/></filter><radialGradient id="paint0_radial_2008_5" cx="0" cy="0" r="1" gradientUnits="userSpaceOnUse" gradientTransform="translate(325 167) rotate(93.5763) scale(24.0468 25.8966)"><stop stop-color="white"/><stop offset="0.225" stop-color="#FFD951"/><stop offset="0.445" stop-color="#FF6737"/></radialGradient></defs></svg>
			</div>
			<?php if (get_theme_mod('main_banner_bg') != '') { ?><img class="main-banner__bg" src="<?php echo get_theme_mod('main_banner_bg'); ?>" /><?php } ?>
		</div>
		<div class="main-banner__scroll-down">
			<a href="#courses">Вниз</a>
		</div>
	</div>
</section>