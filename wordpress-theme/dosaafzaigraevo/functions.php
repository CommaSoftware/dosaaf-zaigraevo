<?php

function dosaafzaigr_styles_n_scripts() {
	// Main styles
	enqueue_versioned_style( 'dosaafzaigr-main',            '/style.css' );
	enqueue_versioned_style( 'dosaafzaigr-root',            '/assets/css/root.css' );
	enqueue_versioned_style( 'dosaafzaigr-normalize',       '/assets/css/normalize.css' );
	enqueue_versioned_style( 'dosaafzaigr-main-ui',         '/assets/css/ui.css' );
	enqueue_versioned_style( 'dosaafzaigr-header',          '/assets/css/sections/header.css' );
	enqueue_versioned_style( 'dosaafzaigr-footer',          '/assets/css/sections/footer.css' );
	enqueue_versioned_style( 'dosaafzaigr-section-contacts','/assets/css/sections/contacts.css' );
	enqueue_versioned_style( 'dosaafzaigr-section-page', '/assets/css/sections/page.css' );

	if(is_front_page()) {
		enqueue_versioned_style( 'dosaafzaigr-section-about-us',     '/assets/css/sections/about-us.css' );
		enqueue_versioned_style( 'dosaafzaigr-section-main-banner',  '/assets/css/sections/main-banner.css' );
		enqueue_versioned_style( 'dosaafzaigr-section-courses',      '/assets/css/sections/courses.css' );
		enqueue_versioned_style( 'dosaafzaigr-section-teachers',     '/assets/css/sections/teachers.css' );
	}

	if(is_404()) { enqueue_versioned_style( 'dosaafzaigr-section-page-404', '/assets/css/sections/page-404.css' ); }



	// Scripts
	enqueue_versioned_script( 'dosaafzaigr-script', '/assets/js/script.js', array( 'jquery'), true );
	enqueue_versioned_script( 'dosaafzaigr-ease-scroll-to-ancor', '/assets/js/ease-scroll-to-ancor.js', array( 'jquery'), true );
}
add_action( 'wp_enqueue_scripts', 'dosaafzaigr_styles_n_scripts' );


// Dynamic versioning of files with styles
function enqueue_versioned_script( $handle, $src = false, $deps = array(), $in_footer = false ) {
	wp_enqueue_script( $handle, get_stylesheet_directory_uri() . $src, $deps, filemtime( get_stylesheet_directory() . $src ), $in_footer );
}
function enqueue_versioned_style( $handle, $src = false, $deps = array(), $media = 'all' ) {
	wp_enqueue_style( $handle, get_stylesheet_directory_uri() . $src, $deps = array(), filemtime( get_stylesheet_directory() . $src ), $media );
}


// Add Post Thumbnails
add_theme_support( 'post-thumbnails' ); 



// New excerpt size length
function wph_excerpt_length($length) {
	return 30; 
}
add_filter('excerpt_length', 'wph_excerpt_length');



add_filter('excerpt_more', function($more) {
	return '...';
});



// Remove wrapper tags from the taxonomy description
add_filter('term_description', 'del_term_description_p');
function del_term_description_p( $value ){
	return preg_replace('~<[/p]+>~i', '', $value);
}
echo term_description(134, 'post_tag');



// Hide admin bar for subscribers
if ( current_user_can( 'subscriber' ) ) {
	show_admin_bar( false );
}

// Hide items on admin menu
add_action('admin_menu', 'remove_admin_menu');
function remove_admin_menu() {
	remove_menu_page('edit.php'); 
	remove_menu_page('edit-comments.php');
	remove_menu_page('theme-editor.php');
}

// Hide items on admin menu
function wph_new_toolbar() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu('comments');
	$wp_admin_bar->remove_menu('new-post');
	$wp_admin_bar->remove_menu('new-user');
}
add_action('wp_before_admin_bar_render', 'wph_new_toolbar');


// ---------- Register post types ---------- //

function register_post_types(){
	register_post_type( 'service', [
		'label'  => null,
		'labels' => [
			'name'               => 'Услуги', // the main name for the record type
			'singular_name'      => 'Услугу', // name for one record of this type
			'add_new'            => 'Добавить услугу', // to add a new entry
			'add_new_item'       => 'Добавление услуги', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование услуги', // to edit the record type
			'new_item'           => 'Новая услуга', // text of the new entry
			'view_item'          => 'Смотреть услугу', // to view a record of this type
			'search_items'       => 'Искать услугу', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
			'menu_name'          => 'Услуги', // menu name
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // whether to show it in the admin menu
		'show_in_admin_bar'   => true, // depends on show_in_menu
		'show_in_rest'        => true, // add to the REST API. C WP 4.7
		'rest_base'           => 'service', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail', 'editor'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ ],
		'has_archive'         => false,
		'rewrite'             => array( 'slug'=>'services'),
		'query_var'           => true,
		'menu_icon'           => 'dashicons-store',
	] );
	register_post_type( 'teacher', [
		'label'  => null,
		'labels' => [
			'name'               => 'Преподаватели', // the main name for the record type
			'singular_name'      => 'Преподавателя', // name for one record of this type
			'add_new'            => 'Добавить преподавателя', // to add a new entry
			'add_new_item'       => 'Добавление преподавателя', // the title of the newly created entry in the admin panel
			'edit_item'          => 'Редактирование преподавателя', // to edit the record type
			'new_item'           => 'Новый преподаватель', // text of the new entry
			'view_item'          => 'Смотреть преподавателя', // to view a record of this type
			'search_items'       => 'Искать преподавателя', // to search for these types of records
			'not_found'          => 'Не найдено', // if nothing was found in the search result
			'menu_name'          => 'Преподаватели', // menu name
			'not_found_in_trash' => 'Не найдено в корзине', // if it was not found in the trash
		],
		'description'         => '',
		'public'              => true,
		'show_in_menu'        => true, // whether to show it in the admin menu
		'show_in_admin_bar'   => true, // depends on show_in_menu
		'show_in_rest'        => false, // add to the REST API. C WP 4.7
		'rest_base'           => 'teacher', // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		'hierarchical'        => false,
		'supports'            => [ 'title', 'thumbnail', 'editor'], // 'title','editor','author','excerpt','trackbacks','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [ ],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
		'menu_icon'           => 'dashicons-admin-users',
	] );
}
add_action( 'init', 'register_post_types' );



// ---------- Custom fields ---------- //

// Стоимость услуги
function price_field() { add_meta_box( 'price_field', 'Cтоимость услуги', 'price_field_box', 'service', 'normal', 'high'  ); }
function price_field_box( $post ){ ?>
	<p><label><input type="number" name="extra[price]" value="<?php echo get_post_meta($post->ID, 'price', 1); ?>" /> ₽</label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'price_field', 1);

// Срок освоения
function education_period_field() { add_meta_box( 'education_period_field', 'Срок освоения', 'education_period_field_box', 'service', 'normal', 'high'  ); }
function education_period_field_box( $post ){ ?>
	<p><label><input type="text" name="extra[education_period]" value="<?php echo get_post_meta($post->ID, 'education_period', 1); ?>" style="width:50%" /></label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'education_period_field', 1);

// Форма обучения
function education_form_field() { add_meta_box( 'education_form_field', 'Форма обучения', 'education_form_field_box', 'service', 'normal', 'high'  ); }
function education_form_field_box( $post ){ ?>
	<?php $saved_value = get_post_meta($post->ID, 'education_form', 1); ?>
	<p><label><input type="text" name="extra[education_form]" value="<?php if ($saved_value != "") { echo $saved_value; } else { echo "очная (вечерняя, дневная)"; } ?>" style="width:50%" /></label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'education_form_field', 1);

// Уровень образования
function education_level_field() { add_meta_box( 'education_level_field', 'Уровень образования', 'education_level_field_box', 'service', 'normal', 'high'  ); }
function education_level_field_box( $post ){ ?>
	<?php $saved_value = get_post_meta($post->ID, 'education_level', 1); ?>
	<p><label><input type="text" name="extra[education_level]" value="<?php if ($saved_value != "") { echo $saved_value; } else { echo "не ниже основного общего образования"; } ?>" style="width:50%" /></label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'education_level_field', 1);

// Код и наименование профессии
function education_profession_field() { add_meta_box( 'education_profession_field', 'Код и наименование профессии', 'education_profession_field_box', 'service', 'normal', 'high'  ); }
function education_profession_field_box( $post ){ ?>
	<?php $saved_value = get_post_meta($post->ID, 'education_profession', 1); ?>
	<p><label><input type="text" name="extra[education_profession]" value="<?php if ($saved_value != "") { echo $saved_value; } else { echo "11442, водитель автомобиля"; } ?>" style="width:50%" /></label></p>
	<input type="hidden" name="extra_fields_nonce" value="<?php echo wp_create_nonce(__FILE__); ?>" />
<?php }
add_action('add_meta_boxes', 'education_profession_field', 1);


// Save Meta Data
function my_extra_fields_update( $post_id ){
	// базовая проверка
	if (
		   empty( $_POST['extra'] )
		|| ! wp_verify_nonce( $_POST['extra_fields_nonce'], __FILE__ )
		|| wp_is_post_autosave( $post_id )
		|| wp_is_post_revision( $post_id )
	)
		return false;

	// Все ОК! Теперь, нужно сохранить/удалить данные
	$_POST['extra'] = array_map( 'sanitize_text_field', $_POST['extra'] ); // чистим все данные от пробелов по краям
	foreach( $_POST['extra'] as $key => $value ){
		if( empty($value) ){
			delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
			continue;
		}

		update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
	}

	return $post_id;
}
// включаем обновление полей при сохранении
add_action( 'save_post', 'my_extra_fields_update', 0 );



// ---------- Custom menu areas ---------- //
function theme_register_nav_menu() {
	register_nav_menu( 'dosaafzaigr_main_menu', 'Главное меню' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );



// ---------- Customizer ---------- //
function my_theme_customize_register( WP_Customize_Manager $wp_customize ) {

	// Customizer "Контакты"
	$wp_customize->add_section(
		'contacts',
		array(
			'title' => 'Контакты',
			'description' => 'Номера телефонов и почта для связи',
			'priority' => 1001,
		)
	);

	$wp_customize->add_setting(
		'contacts_email',
		array('default' => 'example@site.com')
	);
	$wp_customize->add_control(
		'contacts_email',
		array(
			'label' => 'Электронная очта',
			'section' => 'contacts',
			'settings' => 'contacts_email',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_phone_basic',
		array('default' => '8 (900) 000-00-00')
	);
	$wp_customize->add_control(
		'contacts_phone_basic',
		array(
			'label' => 'Основной номер телефона',
			'section' => 'contacts',
			'settings' => 'contacts_phone_basic',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_phone_additional',
		array('default' => '8 (900) 000-00-00')
	);
	$wp_customize->add_control(
		'contacts_phone_additional',
		array(
			'label' => 'Дополнительный номер телефона',
			'section' => 'contacts',
			'settings' => 'contacts_phone_additional',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_adress',
		array('default' => '...')
	);
	$wp_customize->add_control(
		'contacts_adress',
		array(
			'label' => 'Адрес',
			'section' => 'contacts',
			'settings' => 'contacts_adress',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_index',
		array('default' => '...')
	);
	$wp_customize->add_control(
		'contacts_index',
		array(
			'label' => 'Почтовый индекс',
			'section' => 'contacts',
			'settings' => 'contacts_index',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_work_schedule',
		array('default' => '...')
	);
	$wp_customize->add_control(
		'contacts_work_schedule',
		array(
			'label' => 'График работы',
			'section' => 'contacts',
			'settings' => 'contacts_work_schedule',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_lanch_schedule',
		array('default' => '...')
	);
	$wp_customize->add_control(
		'contacts_lanch_schedule',
		array(
			'label' => 'График обеда',
			'section' => 'contacts',
			'settings' => 'contacts_lanch_schedule',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'contacts_form',
		array('default' => '')
	);
	$wp_customize->add_control(
		'contacts_form',
		array(
			'label' => 'Шорткод формы обратной связи (необхолдим плагин Contacts Form 7 или другой)',
			'section' => 'contacts',
			'settings' => 'contacts_form',
			'type' => 'text',
		)
	);



	// Customizer "Главный баннер"
	$wp_customize->add_section(
		'main_banner',
		array(
			'title' => 'Главный баннер',
			'description' => 'Блок приветствия на сайте',
			'priority' => 1001,
		)
	);

	$wp_customize->add_setting(
		'main_banner_title',
		array('default' => 'Подготовка водителей всех категорий')
	);
	$wp_customize->add_control(
		'main_banner_title',
		array(
			'label' => 'Заголовок',
			'section' => 'main_banner',
			'settings' => 'main_banner_title',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'main_banner_subtitle',
		array('default' => 'ПОУ Заиграевский РСТК РО ДОСААФ России РБ')
	);
	$wp_customize->add_control(
		'main_banner_subtitle',
		array(
			'label' => 'Заголовок',
			'section' => 'main_banner',
			'settings' => 'main_banner_subtitle',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'main_banner_btn_name',
		array('default' => 'Связаться')
	);
	$wp_customize->add_control(
		'main_banner_btn_name',
		array(
			'label' => 'Текст кнопки',
			'section' => 'main_banner',
			'settings' => 'main_banner_btn_name',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'main_banner_btn_link',
		array('default' => '#contacts')
	);
	$wp_customize->add_control(
		'main_banner_btn_link',
		array(
			'label' => 'Ссылка кнопки',
			'section' => 'main_banner',
			'settings' => 'main_banner_btn_link',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting( 'main_banner_bg', array(
		// 'default' => get_theme_file_uri('assets/image/logo.jpg'), // Add Default Image URL 
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'main_banner_bg_control', array(
		'label' => 'Фоновое изображение',
		'priority' => 20,
		'section' => 'main_banner',
		'settings' => 'main_banner_bg',
		'button_labels' => array(// All These labels are optional
					'select' => 'Выбрать изображение',
					'remove' => 'Удалить изображение',
					'change' => 'Сменить изображение',
					)
	)));



	// Customizer "Преподаватели"
	$wp_customize->add_section(
		'teachers',
		array(
			'title' => 'Блок "Преподаватели"',
			'priority' => 1001,
		)
	);

	$wp_customize->add_setting(
		'teachers_info_btn_name',
		array('default' => 'Скачать сведения')
	);
	$wp_customize->add_control(
		'teachers_info_btn_name',
		array(
			'label' => 'Текст кнопки для подробной информации о преподавательском составе',
			'section' => 'teachers',
			'settings' => 'teachers_info_btn_name',
			'type' => 'text',
		)
	);

	$wp_customize->add_setting(
		'teachers_info_btn_link',
		array('default' => '#!')
	);
	$wp_customize->add_control(
		'teachers_info_btn_link',
		array(
			'label' => 'Ссылка на документ или страницу',
			'section' => 'teachers',
			'settings' => 'teachers_info_btn_link',
			'type' => 'text',
		)
	);
}
add_action( 'customize_register', 'my_theme_customize_register' );