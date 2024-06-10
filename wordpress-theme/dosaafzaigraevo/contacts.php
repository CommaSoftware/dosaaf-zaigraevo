<section class="section light-background">
	<div class="container" id="contacts">
		<h2 class="container-title">Контакты</h2>
		<article class="contact-info">
			<div class="contact-info__item">
				<p class="contact-info__data-field has--icon contact--phone"><?php echo get_theme_mod('contacts_phone_basic', '8 (900) 000-00-00'); ?></p>
				<p class="contact-info__data-field has--icon contact--phone"><?php echo get_theme_mod('contacts_phone_additional', '8 (900) 000-00-00'); ?></p>
				<p class="contact-info__data-field has--icon contact--email"><?php echo get_theme_mod('contacts_email', 'example@site.com'); ?></p> <!-- zaigraevo.dosaaf@yandex.ru -->
			</div>
			<div class="contact-info__item">
				<p class="contact-info__data-field"><b>Режим работы:</b> <?php echo get_theme_mod('contacts_work_schedule', '...'); ?></p>
				<p class="contact-info__data-field"><b>Обед:</b> <?php echo get_theme_mod('contacts_lanch_schedule', '...'); ?></p>
			</div>
			<div class="contact-info__item">
				<p class="contact-info__data-field"><b>Адрес:</b> <?php echo get_theme_mod('contacts_adress', '...'); ?></p>
				<p class="contact-info__data-field"><b>Индекс:</b> <?php echo get_theme_mod('contacts_index', '...'); ?></p>
			</div>
		</article>
		<article class="contact-form <?php if ( get_theme_mod('contacts_form') == '' ) { echo 'is__only-map'; } ?>">
			<?php if ( get_theme_mod('contacts_form') != '' ) { ?>
				<h3 class="contact-form__title">Мы свяжемся с вами</h3>
			<?php } ?>
			<?php echo do_shortcode( get_theme_mod('contacts_form') ); ?>
			<div class="contact-form__map">
				<a href="https://yandex.ru/maps/org/dosaaf/133889789160/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">ДОСААФ</a><a href="https://yandex.ru/maps/11330/republic-of-buryatia/category/driving_school/184105264/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Автошкола в Республике Бурятия</a><iframe src="https://yandex.ru/map-widget/v1/?from=mapframe&ll=108.258133%2C51.839537&mode=poi&poi%5Bpoint%5D=108.257505%2C51.839317&poi%5Buri%5D=ymapsbm1%3A%2F%2Forg%3Foid%3D133889789160&z=15.77" frameborder="0" allowfullscreen="true" style="position:relative;" title="Яндекс.Карты - Автошкола в Республике Бурятия" loading="lazy"></iframe>
			</div>
		</article>
	</div>
</section>