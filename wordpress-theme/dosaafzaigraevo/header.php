<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
	<meta name="theme-color" content="#FFFFFF">

	<title><?php wp_title('–', true, 'right');?> <?php bloginfo('name'); ?></title>

	<!-- Meta for SEO -->
	<?php if(is_front_page()) { ?>
		<meta name="description" content="<?php echo get_bloginfo('description'); ?>">
	<?php } elseif(is_single()) { ?>
		<meta name="description" content="<?php echo get_post()->post_excerpt; ?>">
		<?php if(get_post_meta($post->ID, 'keyword', 1) != '') { ?>
		<meta name="keywords" content="<?php echo get_post_meta($post->ID, 'keyword', 1); ?>" />
		<?php } ?>
	<?php } ?>

	<!-- Meta for social network -->
	<meta property="og:title" content="<?php wp_title('–', true, 'right');?> <?php bloginfo('name'); ?>" />
	<?php if(is_single() && has_post_thumbnail( get_post())) { ?>
		<meta property="og:image" content="<?php echo get_the_post_thumbnail_url( get_post(), "large" ) ?>" />
	<?php } else { ?>
		<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/main-banner.jpg" />
	<?php } ?>

	<?php wp_head(); ?>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
		<div class="header__container">
			<div class="nav__header">
				<div class="nav-info">
					<a href="<?php echo get_home_url(); ?>" class="nav__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.jpg" alt="dosaaf" class="dosaaf__logo">
					</a>
					<div class="nav-info__item">
						<p class="nav-info__data-field"><b>Режим работы:</b> <?php echo get_theme_mod('contacts_work_schedule', '...'); ?></p>
						<p class="nav-info__data-field"><b>Обед:</b> <?php echo get_theme_mod('contacts_lanch_schedule', '...'); ?></p>
					</div>
				</div>
				<div class="nav__menu">
					<div class="nav__btn" id="changeImgBtn"></div>
					<div class="nav__menu--hidden">
						<div class="nav__hidden">
							<nav class="nav-footer--hidden">
								<?php wp_nav_menu( ['theme_location' => 'dosaafzaigr_main_menu'] ); ?>
							</nav>
							<div class="nav__contact-info">
								<div class="contact-info__item">
									<p class="contact-info__data-field has--icon contact--phone"><?php echo get_theme_mod('contacts_phone_basic', '8 (900) 000-00-00'); ?></p>
									<p class="contact-info__data-field has--icon contact--phone"><?php echo get_theme_mod('contacts_phone_additional', '8 (900) 000-00-00'); ?></p>
									<p class="contact-info__data-field has--icon contact--email"><?php echo get_theme_mod('contacts_email', 'example@site.com'); ?></p> <!-- zaigraevo.dosaaf@yandex.ru -->
								</div>
								<div class="contact-info__item">
									<p class="contact-info__data-field"><b>Адрес:</b> <?php echo get_theme_mod('contacts_adress', '...'); ?></p>
									<p class="contact-info__data-field"><b>Индекс:</b> <?php echo get_theme_mod('contacts_index', '...'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>