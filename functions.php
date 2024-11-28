<?php
/**
 * Logistico functions.php file
 *
 * Author:          mlimon <limon@pixiefy.com>
 * Created on:      17/01/2019
 *
 * @package Logistico
 */

define( 'LOGISTICO_VERSION', '1.0' );
define( 'LOGISTICO_INC_DIR', trailingslashit( get_template_directory() ) . 'inc/' );
define( 'LOGISTICO_LIB_DIR', trailingslashit( get_template_directory() ) . 'lib/' );
define( 'LOGISTICO_ASSETS_URL', trailingslashit( get_template_directory_uri() ) . 'assets/' );


/**
 * Logistico functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Logistico
 */

if ( ! function_exists( 'logistico_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function logistico_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Logistico, use a find and replace
		 * to change 'logistico' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'logistico', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'logistico-featured-thumb', 350, 230, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'logistico' ),
				'menu-2' => esc_html__( 'Footer', 'logistico' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/*
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 180,
				'width'       => 40,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );
		
		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( 'assets/css/editor-style.css', logistico_fonts_url() ) );

		// Add custom editor font sizes.
		add_theme_support(
			'editor-font-sizes',
			array(
				array(
					'name'      => esc_html__( 'Extra small', 'logistico' ),
					'shortName' => esc_html_x( 'XS', 'Font size', 'logistico' ),
					'size'      => 12,
					'slug'      => 'extra-small',
				),
				array(
					'name'      => esc_html__( 'Small', 'logistico' ),
					'shortName' => esc_html_x( 'S', 'Font size', 'logistico' ),
					'size'      => 14,
					'slug'      => 'small',
				),
				array(
					'name'      => esc_html__( 'Normal', 'logistico' ),
					'shortName' => esc_html_x( 'M', 'Font size', 'logistico' ),
					'size'      => 16,
					'slug'      => 'normal',
				),
				array(
					'name'      => esc_html__( 'Large', 'logistico' ),
					'shortName' => esc_html_x( 'L', 'Font size', 'logistico' ),
					'size'      => 20,
					'slug'      => 'large',
				),
				array(
					'name'      => esc_html__( 'Extra large', 'logistico' ),
					'shortName' => esc_html_x( 'XL', 'Font size', 'logistico' ),
					'size'      => 22,
					'slug'      => 'extra-large',
				),
				array(
					'name'      => esc_html__( 'Huge', 'logistico' ),
					'shortName' => esc_html_x( 'XXL', 'Font size', 'logistico' ),
					'size'      => 45,
					'slug'      => 'huge',
				),
				array(
					'name'      => esc_html__( 'Gigantic', 'logistico' ),
					'shortName' => esc_html_x( 'XXXL', 'Font size', 'logistico' ),
					'size'      => 60,
					'slug'      => 'gigantic',
				),
			)
		);

		// Custom background color.
		add_theme_support(
			'custom-background',
			array(
				'default-color' => 'd1e4dd',
			)
		);

		// Editor color palette.
		$black     = '#172145';
		$orchid    = '#8741D3';
		$gray      = '#39414D';
		$green     = '#D1E4DD';
		$magnolia  = '#f6f4ff';
		$purple    = '#D1D1E4';
		$red       = '#E4D1D1';
		$orange    = '#E4DAD1';
		$yellow    = '#EEEADD';
		$white     = '#FFFFFF';

		add_theme_support(
			'editor-color-palette',
			array(
				array(
					'name'  => esc_html__( 'Dark Black', 'logistico' ),
					'slug'  => 'dard-black',
					'color' => $black,
				),
				array(
					'name'  => esc_html__( 'Dark Orchid', 'logistico' ),
					'slug'  => 'dark-orchid',
					'color' => $orchid,
				),
				array(
					'name'  => esc_html__( 'Mongolia', 'logistico' ),
					'slug'  => 'magnolia',
					'color' => $magnolia,
				),
				array(
					'name'  => esc_html__( 'Gray', 'logistico' ),
					'slug'  => 'gray',
					'color' => $gray,
				),
				array(
					'name'  => esc_html__( 'Green', 'logistico' ),
					'slug'  => 'green',
					'color' => $green,
				),
				
				array(
					'name'  => esc_html__( 'Purple', 'logistico' ),
					'slug'  => 'purple',
					'color' => $purple,
				),
				array(
					'name'  => esc_html__( 'Red', 'logistico' ),
					'slug'  => 'red',
					'color' => $red,
				),
				array(
					'name'  => esc_html__( 'Orange', 'logistico' ),
					'slug'  => 'orange',
					'color' => $orange,
				),
				array(
					'name'  => esc_html__( 'Yellow', 'logistico' ),
					'slug'  => 'yellow',
					'color' => $yellow,
				),
				array(
					'name'  => esc_html__( 'White', 'logistico' ),
					'slug'  => 'white',
					'color' => $white,
				),
			)
		);
	
		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Add support for custom line height controls.
		add_theme_support( 'custom-line-height' );

		// Add support for link color control.
		add_theme_support( 'link-color' );

		// Add support for experimental cover block spacing.
		add_theme_support( 'custom-spacing' );

		// Add support for custom units.
		// This was removed in WordPress 5.6 but is still required to properly support WP 5.5.
		add_theme_support( 'custom-units' );

		// Remove feed icon link from legacy RSS widget.
		add_filter( 'rss_widget_feed_link', '__return_empty_string' );


	}
endif;
add_action( 'after_setup_theme', 'logistico_setup' );


if ( ! function_exists( 'logistico_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @since 1.0
	 */
	function logistico_header_style() {

		$logistico_header_text_color = get_header_textcolor();

		/*
		* If no custom options for text are set, let's bail.
		* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).
		*/
		if ( get_theme_support( 'custom-header', 'default-text-color' ) === $logistico_header_text_color ) {
			return;
		}
		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
			/*<![CDATA[*/
			<?php
			if ( display_header_text() ) {
				?>
			.lgtico-breadcrumb-content-wrap h1.logistico-breadcrumb-title,
			.lgtico-breadcrumb-content-wrap h5.post_meta_output {
				color: #<?php echo esc_attr( $logistico_header_text_color ); ?>;
			}
				<?php
			}
			?>
			/*]]>*/
		</style>
		<?php
	}
endif;


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function logistico_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'logistico_content_width', 1140 );
}
add_action( 'after_setup_theme', 'logistico_content_width', 0 );



/**
 * Enqueue styles for the block-based editor.
 *
 * @since Logistico 1.0
 */
function logistico_block_editor_styles() {
	// Add custom fonts.
	wp_enqueue_style( 'logistico-fonts', logistico_fonts_url(), array(), wp_get_theme()->get( 'Version' ) );
}
add_action( 'enqueue_block_editor_assets', 'logistico_block_editor_styles' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function logistico_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'logistico_skip_link_focus_fix' );



/**
 * Implement the Custom Header feature.
 */
require LOGISTICO_INC_DIR . 'custom-header.php';

/**
 * Custom template tags for this theme.
 */
require LOGISTICO_INC_DIR . 'template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require LOGISTICO_INC_DIR . 'template-functions.php';

/**
 * Customizer additions.
 */
// require LOGISTICO_INC_DIR . 'customizer/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require LOGISTICO_INC_DIR . 'jetpack.php';
}



/**
 * Custom files for hook
 */
require LOGISTICO_INC_DIR . 'hooks/general-hooks.php';
require LOGISTICO_INC_DIR . 'hooks/single-hooks.php';

/*
 * Import themify icons list.
 */
require LOGISTICO_INC_DIR . '/widgets/themify-icons.php';

/*
 * Breadcrumb.
 */
require LOGISTICO_INC_DIR . '/class-logistico-breadcrumb.php';

/**
 * Custom Widgets
 */
require LOGISTICO_INC_DIR . 'widgets/class-logisticocontacts.php';
require LOGISTICO_INC_DIR . 'widgets/class-logisticoabout.php';
require LOGISTICO_INC_DIR . 'widgets/class-logisticorecentpost.php';


function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

class Mega_Menu_Walker extends Walker_Nav_Menu {
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        $indent = str_repeat("\t", $depth);
        $classes = $depth === 0 ? 'sub-menu mega-menu' : 'sub-menu';
        $output .= "\n$indent<ul class=\"$classes\">\n";
    }

    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
	
		// Get image ID and URL
		$image_id = get_post_meta($item->ID, '_menu_item_image_id', true);
		$image_url = $image_id ? wp_get_attachment_image_url($image_id, 'full') : '';
	
		// Add special class if an image is set
		$classes = empty($item->classes) ? [] : (array)$item->classes;
		if ($image_id) {
			$classes[] = 'has-menu-image';
		}
		$classes[] = 'menu-item-' . $item->ID;
	
		$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
	
		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = $id ? ' id="' . esc_attr($id) . '"' : '';
	
		$output .= $indent . '<li' . $id . $class_names . '>';
	
		$atts = array();
		$atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
		$atts['target'] = ! empty($item->target) ? $item->target : '';
		$atts['rel']    = ! empty($item->xfn) ? $item->xfn : '';
		$atts['href']   = ! empty($item->url) ? $item->url : '';
	
		$atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);
	
		$attributes = '';
		foreach ($atts as $attr => $value) {
			if (! empty($value)) {
				$value = ( 'href' === $attr ) ? esc_url($value) : esc_attr($value);
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}
	
		$title = apply_filters('the_title', $item->title, $item->ID);
	
		// Ensure $args is an object before accessing its properties
		$args = is_object($args) ? $args : (object) [];
	
		// Construct item output
		$item_output = isset($args->before) ? $args->before : '';
		if ($image_url) {
			$item_output .= '<img src="' . esc_url($image_url) . '" alt="' . esc_attr($title) . '" class="menu-item-image">';
		}
		$item_output .= '<a' . $attributes . '>';
		$item_output .= (isset($args->link_before) ? $args->link_before : '') . $title . (isset($args->link_after) ? $args->link_after : '');
		$item_output .= '</a>';
		$item_output .= isset($args->after) ? $args->after : '';
	
		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
	
}




// Enqueue Media Uploader
function custom_menu_image_uploader_scripts($hook) {
    if ('nav-menus.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_script('menu-image-uploader', get_template_directory_uri() . '/assets/js/menu-image-uploader.js', ['jquery'], null, true);
    }
}
add_action('admin_enqueue_scripts', 'custom_menu_image_uploader_scripts');

// Add Image Upload Field to Menu Items
function custom_menu_image_field($item_id, $item, $depth, $args) {
    $image_id = get_post_meta($item_id, '_menu_item_image_id', true);
    $image_url = $image_id ? wp_get_attachment_image_url($image_id, 'thumbnail') : '';
    ?>
    <p class="description description-thin">
        <label for="edit-menu-item-image-<?php echo $item_id; ?>">
            Image<br>
            <input type="hidden" id="edit-menu-item-image-<?php echo $item_id; ?>" class="widefat code edit-menu-item-image" name="menu-item-image[<?php echo $item_id; ?>]" value="<?php echo esc_attr($image_id); ?>">
            <button type="button" class="button upload-menu-item-image">Upload Image</button>
            <img src="<?php echo esc_url($image_url); ?>" alt="" style="max-width: 100px; display: <?php echo $image_url ? 'block' : 'none'; ?>;">
        </label>
    </p>
    <?php
}
add_action('wp_nav_menu_item_custom_fields', 'custom_menu_image_field', 10, 4);

// Save Image Field Value
function save_custom_menu_image_field($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-image'][$menu_item_db_id])) {
        update_post_meta($menu_item_db_id, '_menu_item_image_id', $_POST['menu-item-image'][$menu_item_db_id]);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_image_id');
    }
}
add_action('wp_update_nav_menu_item', 'save_custom_menu_image_field', 10, 3);


/**
 * Register theme blocks.
 */
function redacted_theme_register_blocks() {
    $block_path = get_template_directory() . '/block.json';

    if ( file_exists( $block_path ) ) {
        register_block_type_from_metadata( $block_path );
    }
}
add_action( 'init', 'redacted_theme_register_blocks' );


if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'redacted-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}


function enqueue_slick_carousel() {
    // Slick Carousel CSS
    wp_enqueue_style( 'slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
    wp_enqueue_style( 'slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );

    // Slick Carousel JS
    wp_enqueue_script( 'slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );
}
add_action( 'wp_enqueue_scripts', 'enqueue_slick_carousel' );
