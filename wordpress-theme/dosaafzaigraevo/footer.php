	<footer class="section dark-background is--top-round">
		<div class="container">
			<nav class="nav-footer">
				<?php wp_nav_menu( ['theme_location' => 'dosaafzaigr_main_menu'] ); ?>
			</nav>
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
			<div class="copyright-banner">
				<p>© досаафзаиграево.рф 2015-<?php echo date("Y"); ?></p>
				<a href="https://commasoft.ru">Сайт создан командой CommaSoftware</a>
			</div>
		</div>
	</footer>
</body>
</html>
<?php wp_footer(); ?>