<?php

// function set_custom_ver_css_js( $src ) {
// 	// style.css URI
// 	$style_file = get_stylesheet_directory().'/style.css'; 

// 	if ( $style_file ) {
// 		// css file timestamp
// 		$version = filemtime($style_file); 

// 		if ( strpos( $src, 'ver=' ) )
// 			// use the WP function add_query_arg() 
// 			// to set the ver parameter in 
// 			$src = add_query_arg( 'ver', $version, $src );
// 		return esc_url( $src );

// 	}

// }

// function css_js_versioning() {
// 	add_filter( 'style_loader_src', 'set_custom_ver_css_js', 9999 ); 	// css files versioning
// 	add_filter( 'script_loader_src', 'set_custom_ver_css_js', 9999 ); // js files versioning
// }

// add_action('init', 'css_js_versioning');

remove_action('init', 'wp_schedule_update_themes');
remove_action('init', 'wp_schedule_update_plugins');
remove_action('init', 'wp_schedule_update_core');
add_filter('site_transient_update_themes', '__return_null');
remove_action('wp_version_check', 'wp_version_check');
remove_action('load-plugins.php', 'wp_update_plugins');
remove_action('load-update.php', 'wp_update_plugins');
remove_action('load-themes.php', 'wp_update_themes');
remove_action('admin_init', '_maybe_update_plugins');
remove_action('admin_init', '_maybe_update_themes');

add_filter('wpml_show_notice', '__return_false');

if (!function_exists('utopian_theme_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function utopian_theme_setup()
	{

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'header-menu' => esc_html__('Header Menu', 'utopian-theme'),
			'inner-header-menu' => esc_html__('Header Open Menu', 'utopian-theme'),
			'main-menu' => esc_html__('Main Menu', 'utopian-theme'),
			'first-menu' => esc_html__('First Column', 'utopian-theme'),
			'second-menu' => esc_html__('Second Column', 'utopian-theme'),
			'third-menu' => esc_html__('Third Column', 'utopian-theme'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('_s_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'utopian_theme_setup');

function be_reusable_blocks_admin_menu()
{
	add_menu_page('Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22);
}
add_action('admin_menu', 'be_reusable_blocks_admin_menu');

/**
 * Gutenberg scripts and styles
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
function be_gutenberg_scripts()
{

	wp_enqueue_script(
		'fontawesome',
		'https://kit.fontawesome.com/e85a276bff.js',
		array('wp-blocks', 'wp-dom'),
		'1',
		false
	);

	wp_enqueue_script(
		'be-editor',
		get_stylesheet_directory_uri() . '/js/editor.js',
		array('wp-blocks', 'wp-dom'),
		'1',
		true
	);

	// Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap', [], null);

	// wp_enqueue_style('theme-fonts', get_stylesheet_directory_uri() . '/css/fonts.css');
	wp_enqueue_style('gutenberg-style', get_stylesheet_directory_uri() . '/css/gutenberg.css');
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), '3.1.14');
	wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/swiper/swiper-bundle.min.css');

	wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/swiper/swiper-bundle.min.js');
	wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/js/gsap/gsap.min.js');
	wp_enqueue_script('scrolltrigger', get_stylesheet_directory_uri() . '/js/gsap/ScrollTrigger.min.js');
	wp_enqueue_script('ScrollToPlugin', get_stylesheet_directory_uri() . '/js/gsap/ScrollToPlugin.min.js');
	wp_enqueue_style('lightgallery', get_stylesheet_directory_uri() . '/lightgallery/css/lightgallery-bundle.min.css');
	wp_enqueue_script('lightgallery', get_stylesheet_directory_uri() . '/lightgallery/lightgallery.min.js', '1', array(), true);
	wp_enqueue_script('lightgallery-zoom', get_stylesheet_directory_uri() . '/lightgallery/plugins/zoom/lg-zoom.min.js', '1', array('lightgallery'), true);
	wp_enqueue_script('lightgallery-thumbnail', get_stylesheet_directory_uri() . '/lightgallery/plugins/thumbnail/lg-thumbnail.min.js', '1', array(), true);
}
add_action('enqueue_block_editor_assets', 'be_gutenberg_scripts');

/**
 * Enqueue scripts and styles.
 */
function utopian_theme_scripts()
{

	wp_enqueue_script(
		'fontawesome',
		'https://kit.fontawesome.com/e85a276bff.js',
		array(),
		'1',
		false
	);

	// Google Fonts
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap', [], null);

	// wp_enqueue_style('theme-fonts', get_stylesheet_directory_uri() . '/css/fonts.css');
	wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), '3.0.0');
	wp_enqueue_style('swiper', get_stylesheet_directory_uri() . '/swiper/swiper-bundle.min.css');
	wp_enqueue_style('keen', 'https://cdn.jsdelivr.net/npm/keen-slider@latest/keen-slider.min.css');

	wp_enqueue_script('swiper', get_stylesheet_directory_uri() . '/swiper/swiper-bundle.min.js', '1', array(), true);
	wp_enqueue_script('keen', 'https://cdn.jsdelivr.net/npm/keen-slider@latest/keen-slider.js', '1', array(), true);
	wp_enqueue_script('gsap', get_stylesheet_directory_uri() . '/js/gsap/gsap.min.js', '1', array(), true);
	wp_enqueue_script('scrolltrigger', get_stylesheet_directory_uri() . '/js/gsap/ScrollTrigger.min.js', '1', array('gsap'), true);
	wp_enqueue_script('ScrollToPlugin', get_stylesheet_directory_uri() . '/js/gsap/ScrollToPlugin.min.js');

	wp_enqueue_style('lightgallery', get_stylesheet_directory_uri() . '/lightgallery/css/lightgallery-bundle.min.css');
	wp_enqueue_script('lightgallery', get_stylesheet_directory_uri() . '/lightgallery/lightgallery.min.js', '1', array(), true);
	wp_enqueue_script('lightgallery-zoom', get_stylesheet_directory_uri() . '/lightgallery/plugins/zoom/lg-zoom.min.js', '1', array('lightgallery'), true);
	wp_enqueue_script('lightgallery-thumbnail', get_stylesheet_directory_uri() . '/lightgallery/plugins/thumbnail/lg-thumbnail.min.js', '1', array(), true);

	wp_enqueue_script('utopian', get_stylesheet_directory_uri() . '/js/index.js', array('scrolltrigger'), '3.0.0', true);
}

add_filter('wpcf7_autop_or_not', '__return_false');

add_action('wp_enqueue_scripts', 'utopian_theme_scripts');

add_filter('script_loader_tag', 'add_id_to_script', 10, 3);

function add_id_to_script($tag, $handle, $src)
{
	if ('fontawesome' === $handle) {
		$tag = '<script id="fontawesome" src="' . esc_url($src) . '" crossorigin="anonymous"></script>';
	}

	return $tag;
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function utopian_theme_pingback_header()
{
	if (is_singular() && pings_open()) {
		echo '<link rel="pingback" href="', esc_url(get_bloginfo('pingback_url')), '">';
	}
}
add_action('wp_head', 'utopian_theme_pingback_header');

function gtmCode()
{
?>
	<!-- Google Tag Manager -->
	<script>
		(function(w, d, s, l, i) {
			w[l] = w[l] || [];
			w[l].push({
				'gtm.start': new Date().getTime(),
				event: 'gtm.js'
			});
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s),
				dl = l != 'dataLayer' ? '&l=' + l : '';
			j.async = true;
			j.src =
				'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
			f.parentNode.insertBefore(j, f);
		})(window, document, 'script', 'dataLayer', 'GTM-PFVXL75N');
	</script>
	<!-- End Google Tag Manager -->
	<?php
}

// add_action('wp_head', 'gtmCode', 1);

add_action('acf/init', 'my_acf_blocks_init');
function my_acf_blocks_init()
{

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page();
	}

	// Check function exists.
	if (function_exists('acf_register_block_type')) {

		acf_register_block_type(array(
			'title'			=> __('Large Hero', 'utopian'),
			'name'			=> 'hero',
			'render_template'	=> 'template-parts/blocks/block-hero/hero.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-hero/hero.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-hero/hero.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Accordion Container', 'utopian'),
			'name'			=> 'accordion-container',
			'render_template'	=> 'template-parts/blocks/block-accordion/accordion-container.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-accordion/accordion.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-accordion/accordion.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Accordion', 'utopian'),
			'name'			=> 'accordion',
			'render_template'	=> 'template-parts/blocks/block-accordion/accordion.php',
			'parent' => ['acf/accordion-container'],
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Hero', 'utopian'),
			'name'			=> 'default-hero',
			'render_template'	=> 'template-parts/blocks/block-default-hero/default-hero.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-default-hero/default-hero.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Columns-Container', 'utopian'),
			'name'			=> 'columns-container',
			'render_template'	=> 'template-parts/blocks/block-columns-container/columns-container.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-columns-container/columns-container.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Contact', 'utopian'),
			'name'			=> 'contact-form',
			'render_template'	=> 'template-parts/blocks/block-contact-form/contact-form.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-contact-form/contact-form.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Title-Collapse', 'utopian'),
			'name'			=> 'title-collapse',
			'render_template'	=> 'template-parts/blocks/block-title-collapse/title-collapse.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-title-collapse/title-collapse.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Partners', 'utopian'),
			'name'			=> 'partners',
			'render_template'	=> 'template-parts/blocks/block-info-partners/info-partners.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-info-partners/info-partners.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Partners Slider', 'utopian'),
			'name'			=> 'partners-slider',
			'render_template'	=> 'template-parts/blocks/block-partners-slider/partners.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-partners-slider/partners.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-partners-slider/partners.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('FAQ', 'utopian'),
			'name'			=> 'faq',
			'render_template'	=> 'template-parts/blocks/block-faq/faq.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-faq/faq.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-faq/faq.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('FAQ Filter', 'utopian'),
			'name'			=> 'faq-filter',
			'render_template'	=> 'template-parts/blocks/block-faq/filter/faq.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-faq/filter/faq.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-faq/filter/faq.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Slider-Activities', 'utopian'),
			'name'			=> 'slider-activities',
			'render_template'	=> 'template-parts/blocks/block-slider-activities/slider-activities.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-slider-activities/slider-activities.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-slider-activities/slider-activities.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('FAQ Search', 'utopian'),
			'name'			=> 'faq-search',
			'render_template'	=> 'template-parts/blocks/block-faq/search/faq-search.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-faq/faq.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-faq/faq.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Blogue', 'utopian'),
			'name'			=> 'blogue',
			'render_template'	=> 'template-parts/blocks/block-blogue/blogue.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-blogue/blogue.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-blogue/blogue.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Montgolfières', 'utopian'),
			'name'			=> 'montgolfieres',
			'render_template'	=> 'template-parts/blocks/block-montgolfieres-gallery/montgolfieres-gallery.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-montgolfieres-gallery/montgolfieres-gallery.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-montgolfieres-gallery/montgolfieres-gallery.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Filter', 'utopian'),
			'name'			=> 'montgolfiere-filter',
			'render_template'	=> 'template-parts/blocks/block-montgolfieres-gallery/montgolfieres-filter.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-montgolfieres-gallery/montgolfieres-filter.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-montgolfieres-gallery/montgolfieres-filter.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Drapeaux', 'utopian'),
			'name'			=> 'drapeaux',
			'render_template'	=> 'template-parts/blocks/block-drapeaux/drapeaux.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-drapeaux/drapeaux.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Hébergements', 'utopian'),
			'name'			=> 'hebergements',
			'render_template'	=> 'template-parts/blocks/block-hebergements/hebergements.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-hebergements/hebergements.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Container', 'utopian'),
			'name'			=> 'container',
			'render_template'	=> 'template-parts/blocks/block-container/container.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-container/container.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-container/container.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Event', 'utopian'),
			'name'			=> 'event',
			'render_template'	=> 'template-parts/blocks/block-event-info/event.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-event-info/event.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-event-info/event.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Program Slider', 'utopian'),
			'name'			=> 'programmation',
			'render_template'	=> 'template-parts/blocks/block-program-slider/program.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-program-slider/program.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-program-slider/program.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Programmation', 'utopian'),
			'name'			=> 'programmation-2022',
			'render_template'	=> 'template-parts/blocks/block-programmation/programmation.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-programmation/programmation.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-programmation/programmation.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('About-Activities', 'utopian'),
			'name'			=> 'about-activities',
			'render_template'	=> 'template-parts/blocks/block-about-activities/about-activities.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-about-activities/about-activities.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-about-activities/about-activities.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Team members', 'utopian'),
			'name'			=> 'team-members',
			'render_template'	=> 'template-parts/blocks/block-person-list/block-person-list.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-person-list/block-person-list.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Board members', 'utopian'),
			'name'			=> 'board-members',
			'render_template'	=> 'template-parts/blocks/block-board-member/board-member.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-board-member/board-member.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Activities', 'utopian'),
			'name'			=> 'activities-filter',
			'render_template'	=> 'template-parts/blocks/block-activities/activities.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-activities/activities.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-activities/activities.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Image gallery', 'utopian'),
			'name'			=> 'image-gallery',
			'render_template'	=> 'template-parts/blocks/block-image-gallery/block-image-gallery.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-image-gallery/block-image-gallery.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-image-gallery/block-image-gallery.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Timeline', 'utopian'),
			'name'			=> 'timeline',
			'render_template'	=> 'template-parts/blocks/block-timeline/timeline.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-timeline/timeline.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-timeline/timeline.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Single activity header', 'utopian'),
			'name'			=> 'single-activity-header',
			'render_template'	=> 'template-parts/blocks/block-activity-info/activity-header.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-activity-info/activity-header.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Single activity content', 'utopian'),
			'name'			=> 'single-activity-content',
			'render_template'	=> 'template-parts/blocks/block-activity-info/activity-content.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-activity-info/activity-content.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-activity-info/activity-content.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Activity Info', 'utopian'),
			'name'			=> 'activity-info',
			'render_template'	=> 'template-parts/blocks/block-activity-info/activity-info.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-activity-info/activity-info.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Single activity', 'utopian'),
			'name'			=> 'single-activity',
			'render_template'	=> 'template-parts/blocks/block-activity-info/single-activity.php',
			// 'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-activity-info/activity-info.css',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Guests slider', 'utopian'),
			'name'			=> 'guests-slider',
			'render_template'	=> 'template-parts/blocks/block-guests-slider/guests-slider.php',
			// 'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-guests-slider/guests.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-guests-slider/guests-slider.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Guests list', 'utopian'),
			'name'			=> 'guests-list',
			'render_template'	=> 'template-parts/blocks/block-guests-slider/guests.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-guests-slider/guests.css',
			// 'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-guests-slider/guests.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Related programs', 'utopian'),
			'name'			=> 'related programs',
			'render_template'	=> 'template-parts/blocks/block-related-programs/block-related-programs.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-related-programs/block-related-programs.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-related-programs/block-related-programs.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));

		acf_register_block_type(array(
			'title'			=> __('Popup button', 'utopian'),
			'name'			=> 'popup-btn',
			'render_template'	=> 'template-parts/blocks/block-popup-btn/popup-btn.php',
			'enqueue_style'     => get_template_directory_uri() . '/template-parts/blocks/block-popup-btn/popup-btn.css',
			'enqueue_script'     => get_template_directory_uri() . '/template-parts/blocks/block-popup-btn/popup-btn.js',
			'mode'			=> 'preview',
			'supports'		=> [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
				'jsx' 			=> true,
			]
		));
	}
}

// Extra functions you might need

// Adding something to a menu
add_filter('wp_nav_menu_items', 'wdm_add_menu_items', 10, 2);

function wdm_add_menu_items($menu, $args)
{
	if ('header-menu' === $args->theme_location || 'inner-header-menu' === $args->theme_location) {

		ob_start();
		$languages = apply_filters('wpml_active_languages', NULL, 'orderby=id&order=desc');

		if (1 < count($languages)) {

			foreach ($languages as $l) {
				if (!$l['active']) {
	?>
					<li class="menu-item language">
						<a href="<?php echo $l['url']; ?>">
							<span><?php echo $l['code']; ?></span>
						</a>
					</li>
	<?php
				}
			}
		}

		$data = ob_get_clean();
		$menu  .= $data;
	}

	return $menu;
}

//Add red class
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args) {
    if (!in_array($args->theme_location, ['header-menu', 'inner-header-menu', 'header-menu-en', 'inner-header-menu-en'])) {
        return $items;
    }

    foreach ($items as &$item) {
        $red = get_field('red_background', $item);

        error_log("Menu item ID {$item->ID} - Title: {$item->title} - red_background: " . var_export($red, true));

        if ($red) {
            $item->classes[] = 'red';
        }

        error_log("Menu item ID {$item->ID} classes: " . implode(', ', $item->classes));
    }

    return $items;
}

//Add red class



function blogPost($ID)
{
	?>
	<article class="eachInfoBlogGrid">
		<div class="image">
			<?php echo get_the_post_thumbnail($ID); ?>
		</div>
		<div class="contentInfo">
			<h2><?php echo get_the_title($ID); ?></h2>
			<p>
				<?php echo get_the_excerpt($ID); ?>
			</p>
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link" href="<?php echo get_permalink($ID); ?>" rel="noreferrer noopener"><?php echo __('En savoir plus', 'utopian'); ?></a></div>
				<!-- /wp:button -->
			</div>
		</div>
	</article>
	<?php
}

function getPosts()
{
	ob_start();

	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'post',
	);

	// if ($_POST['paged']) {
	// 	$args['paged'] = $_POST['paged'];
	// }

	if ($_POST['posts']) {
		$args['posts_per_page'] = -1;
	}

	if ($_POST['category'] != '') {
		$args['cat'] = $_POST['category'];
	}

	// The Query
	$the_query = new WP_Query($args);

	// The Loop
	if ($the_query->have_posts()) {
		while ($the_query->have_posts()) {
			$the_query->the_post();
			blogPost(get_the_ID());
		}
	}

	$data = ob_get_clean();
	wp_send_json_success($data);
	wp_die();
}

add_action('wp_ajax_getPosts', 'getPosts');
add_action('wp_ajax_nopriv_getPosts', 'getPosts');

// Our custom post type function
function create_posttype()
{

	register_taxonomy('partner_category', array(), array(
		'labels' => array(
			'name' => 'Partner Categories',
			'singular_name' => 'Partner Category'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'partner_category'),
	));

	register_taxonomy('faq_category', array(), array(
		'labels' => array(
			'name' => 'FAQ Categories',
			'singular_name' => 'FAQ Category'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'publicly_queryable' => false,
		'query_var' => true,
		'rewrite' => array('slug' => 'faq_category'),
	));

	register_taxonomy('activity_category', array(), array(
		'labels' => array(
			'name' => 'Categories',
			'singular_name' => 'Category'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'publicly_queryable' => false,
		'query_var' => true,
		'rewrite' => array('slug' => 'partner_category'),
	));

	register_taxonomy('age_group', array(), array(
		'labels' => array(
			'name' => 'Age Group',
			'singular_name' => 'Age Group'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'publicly_queryable' => false,
		'rewrite' => array('slug' => 'age_group'),
	));

	register_taxonomy('event_date', array(), array(
		'labels' => array(
			'name' => 'Event Dates',
			'singular_name' => 'Event Date'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'publicly_queryable' => false,
		'query_var' => true,
		'rewrite' => array('slug' => 'event_date'),
	));

	register_taxonomy('event_scene', array(), array(
		'labels' => array(
			'name' => 'Event Scènes',
			'singular_name' => 'Event Scènes'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'publicly_queryable' => false,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'scene'),
	));

	register_taxonomy('event_style', array(), array(
		'labels' => array(
			'name' => 'Event Styles',
			'singular_name' => 'Event Style'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'publicly_queryable' => false,
		'query_var' => true,
		'rewrite' => array('slug' => 'style'),
	));

	register_taxonomy('montgolfiere_cat', array(), array(
		'labels' => array(
			'name' => 'Montgolfiere categories',
			'singular_name' => 'Montgolfiere category'
		),
		'hierarchical' => true,
		'show_ui' => true,
		'publicly_queryable' => false,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'montgolfiere_cat'),
	));


	register_post_type(
		'programmation',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Programmation'),
				'singular_name' => __('Programmation')
			),
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'has_archive' => false,
			'taxonomies' => array('event_date', 'event_scene', 'event_style'),
			'rewrite' => array('slug' => 'programmation'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'partner',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Partners'),
				'singular_name' => __('Partner')
			),
			'supports' => array('title', 'thumbnail'),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array('partner_category'),
			'rewrite' => array('slug' => 'partner'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'team_member',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Team Members'),
				'singular_name' => __('Team Member')
			),
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array(),
			'rewrite' => array('slug' => 'team-member'),
		)
	);

	register_post_type(
		'faq',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('FAQs'),
				'singular_name' => __('FAQ')
			),
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array('faq_category'),
			'rewrite' => array('slug' => 'faq'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'board_member',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Board Members'),
				'singular_name' => __('Board Member')
			),
			'supports' => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array(),
			'rewrite' => array('slug' => 'board-member'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'hebergement',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Hébergements'),
				'singular_name' => __('Hébergement')
			),
			'supports' => array('title', 'editor', 'thumbnail'),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array(),
			'rewrite' => array('slug' => 'hebergement'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'montgolfiere',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Montgolfières'),
				'singular_name' => __('Montgolfière')
			),
			'supports' => array('title', 'thumbnail'),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array('montgolfiere_cat'),
			'rewrite' => array('slug' => 'montgolfiere'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'history',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('History'),
				'singular_name' => __('history')
			),
			'supports' => array('title', 'editor'),
			'public' => true,
			'publicly_queryable' => false,
			'has_archive' => false,
			'taxonomies' => array(''),
			'rewrite' => array('slug' => 'history'),
			'show_in_rest' => true
		)
	);

	register_post_type(
		'activity',
		// CPT Options
		array(
			'labels' => array(
				'name' => __('Activities'),
				'singular_name' => __('Activity')
			),
			'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
			'public' => true,
			'has_archive' => false,
			'taxonomies' => array('age_group', 'event_date', 'event_scene', 'activity_category'),
			'rewrite' => array('slug' => 'activites-familiales'),
			'show_in_rest' => true
		)
	);
}
// Hooking up our function to theme setup
add_action('init', 'create_posttype');

add_action('init', 'wpshout_add_taxonomies_to_courses');
function wpshout_add_taxonomies_to_courses()
{
	register_taxonomy_for_object_type('event_scene', 'activity');
}

function singleContentBox($id, $date = null)
{

	if (get_post_type($id) === "programmation") {
	?>

		<a href="<?php echo the_permalink($id) ?>" class="imageContent">

			<div class="image">
				<?php echo get_the_post_thumbnail($id); ?>
			</div>
			<div class="content">
				<div class="title">
					<h3><?php echo get_the_title($id) ?></h3>
					<div class="smalle">
						<?php if ($date != null) {
							$term = get_term($date, 'event_date');
							echo $term ? $term->name : '<span></span>'; ?>
						<?php } else { ?>
							<?php echo get_the_terms($id, 'event_date')[0]->name; ?>
							<?php if (get_the_terms($id, 'event_date')[0] != null) {
								echo ' <span></span> ';
							} ?>
						<?php } ?>
						<?php echo get_field('time', $id); ?>
					</div>
				</div>
			</div>

		</a>

	<?php } else { ?>

		<a href="<?php echo the_permalink($id) ?>" class="imageContent">

			<div class="image">
				<?php echo get_the_post_thumbnail($id); ?>
			</div>
			<div class="content">
				<div class="title">
					<h3><?php echo get_the_title($id) ?></h3>
					<?php if (get_post_type($id) === "activity" && get_field('sous_titre', $id)) { ?>
						<div class="smalle">
							<?php echo get_field('sous_titre', $id); ?>
						</div>
					<?php } ?>
				</div>
			</div>

		</a>

	<?php }
}

function redirectPage()
{

	if (get_field('redirect_url')) {
		wp_redirect(get_field('redirect_url'));
		die;
	}

	// 	if ( !is_user_logged_in() && is_singular('programmation') ) {
	// 		wp_redirect(home_url()); 
	// 		die;
	// 	}

}
add_action('template_redirect', 'redirectPage');

function contentFilter()
{

	$tax_query = json_decode(stripslashes($_POST['tax_query']), true, 512);

	$args = array(
		'post_status' => 'publish',
		'post_type' => $_POST['post_type'],
		'orderby' => 'menu_order',
		'tax_query' => $tax_query,
		'posts_per_page' => -1,
	);

	$event_date_terms = null;

	// Iterate over the array to check for taxonomy "event_date"
	foreach ($tax_query as $item) {
		if ($item['taxonomy'] === 'event_date') {
			$event_date_terms = $item['terms'];
			break; // Exit the loop once we find the desired item
		}
	}

	if ($_POST['post_type'] == 'programmation') {
		$args['meta_key'] = 'hide_program';
		$args['meta_value'] = '0';
		$args['order'] = 'ASC';
	}

	ob_start();

	$posts = new WP_Query($args);

	if ($posts->have_posts()) {

		while ($posts->have_posts()) {
			$posts->the_post();
			if ($event_date_terms != null) {
				singleContentBox(get_the_ID(), $event_date_terms);
			} else {
				singleContentBox(get_the_ID());
			}
		}
	} else {
		if ($_POST['post_type'] == 'activity') {
			echo __('Aucune activité disponible avec ces filtres', 'utopian');
		} else if ($_POST['post_type'] == 'programmation') {
			echo __('Aucun programme disponible avec ces filtres', 'utopian');
		}
	}

	wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success($data);
	wp_die();
}

add_action('wp_ajax_contentFilter', 'contentFilter');
add_action('wp_ajax_nopriv_contentFilter', 'contentFilter');


function singleMontgolfiere($id)
{
	?>
	<a href="<?php echo get_the_post_thumbnail_url($id); ?>" class="gallery-item">
		<div class="montgolfiereImage">
			<?php echo get_the_post_thumbnail($id); ?>
			<div class="item-title">
				<p><?php echo get_the_title($id); ?></p>
			</div>
		</div>
		<div class="item-description">
			<p class="title"><?php echo get_the_title($id); ?></p>
			<p class="name"><?php echo get_field('name', $id); ?></p>
			<p class="location"><?php echo get_field('location', $id); ?></p>
		</div>
	</a>

<?php
}

function montgolfieresFilter()
{

	$tax_query = json_decode(stripslashes($_POST['tax_query']), true, 512);

	$args = array(
		'post_status' => 'publish',
		'post_type' => $_POST['post_type'],
		'order' => 'menu_order',
		'tax_query' => $tax_query,
		'posts_per_page' => -1
	);

	ob_start();

	$posts = new WP_Query($args);

	if ($posts->have_posts()) {

		while ($posts->have_posts()) {
			$posts->the_post();
			singleMontgolfiere(get_the_ID());
		}
	} else {

		echo __('Aucune montgolfiere disponible avec ces filtres', 'utopian');
	}

	wp_reset_postdata();
	$data = ob_get_clean();
	wp_send_json_success($data);
	wp_die();
}

add_action('wp_ajax_montgolfieresFilter', 'montgolfieresFilter');
add_action('wp_ajax_nopriv_montgolfieresFilter', 'montgolfieresFilter');

function get_the_terms_orderby_termorder($taxonomy)
{
	global $post;
	$terms = get_the_terms($post->ID, $taxonomy);
	$array = array();
	foreach ($terms as $term) {
		$array[$term->term_order] = (object)array(
			"term_id"          => $term->term_id,
			"name"             => $term->name,
			"slug"             => $term->slug,
			"term_group"       => $term->term_group,
			"term_order"       => $term->term_order,
			"term_taxonomy_id" => $term->term_taxonomy_id,
			"taxonomy"         => $term->taxonomy,
			"description"      => $term->description,
			"parent"           => $term->parent,
			"count"            => $term->count,
			"object_id"        => $term->object_id
		);
	}
	ksort($array);
	$array = (object)$array;

	return $array;
}

// show all options on wpml 
// function wpmlsupp_1706_reset_wpml_capabilities() {
//     if ( function_exists( 'icl_enable_capabilities' ) ) {
//         icl_enable_capabilities();
//     }
// }
// add_action( 'shutdown', 'wpmlsupp_1706_reset_wpml_capabilities' );
// show all options on wpml 
