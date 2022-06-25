<?php
/**
 * Theme functions and definitions
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_VERSION', '2.5.0' );

if ( ! isset( $content_width ) ) {
	$content_width = 800; // Pixels.
}

if ( ! function_exists( 'hello_elementor_setup' ) ) {
	/**
	 * Set up theme support.
	 *
	 * @return void
	 */
	function hello_elementor_setup() {
		if ( is_admin() ) {
			hello_maybe_update_theme_version_in_db();
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_load_textdomain', [ true ], '2.0', 'hello_elementor_load_textdomain' );
		if ( apply_filters( 'hello_elementor_load_textdomain', $hook_result ) ) {
			load_theme_textdomain( 'hello-elementor', get_template_directory() . '/languages' );
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_menus', [ true ], '2.0', 'hello_elementor_register_menus' );
		if ( apply_filters( 'hello_elementor_register_menus', $hook_result ) ) {
			register_nav_menus( [ 'menu-1' => __( 'Header', 'hello-elementor' ) ] );
			register_nav_menus( [ 'menu-2' => __( 'Footer', 'hello-elementor' ) ] );
		}

		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_add_theme_support', [ true ], '2.0', 'hello_elementor_add_theme_support' );
		if ( apply_filters( 'hello_elementor_add_theme_support', $hook_result ) ) {
			add_theme_support( 'post-thumbnails' );
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'title-tag' );
			add_theme_support(
				'html5',
				[
					'search-form',
					'comment-form',
					'comment-list',
					'gallery',
					'caption',
				]
			);
			add_theme_support(
				'custom-logo',
				[
					'height'      => 100,
					'width'       => 350,
					'flex-height' => true,
					'flex-width'  => true,
				]
			);

			/*
			 * Editor Style.
			 */
			add_editor_style( 'classic-editor.css' );

			/*
			 * Gutenberg wide images.
			 */
			add_theme_support( 'align-wide' );

			/*
			 * WooCommerce.
			 */
			$hook_result = apply_filters_deprecated( 'elementor_hello_theme_add_woocommerce_support', [ true ], '2.0', 'hello_elementor_add_woocommerce_support' );
			if ( apply_filters( 'hello_elementor_add_woocommerce_support', $hook_result ) ) {
				// WooCommerce in general.
				add_theme_support( 'woocommerce' );
				// Enabling WooCommerce product gallery features (are off by default since WC 3.0.0).
				// zoom.
				add_theme_support( 'wc-product-gallery-zoom' );
				// lightbox.
				add_theme_support( 'wc-product-gallery-lightbox' );
				// swipe.
				add_theme_support( 'wc-product-gallery-slider' );
			}
		}
	}
}
add_action( 'after_setup_theme', 'hello_elementor_setup' );

function hello_maybe_update_theme_version_in_db() {
	$theme_version_option_name = 'hello_theme_version';
	// The theme version saved in the database.
	$hello_theme_db_version = get_option( $theme_version_option_name );

	// If the 'hello_theme_version' option does not exist in the DB, or the version needs to be updated, do the update.
	if ( ! $hello_theme_db_version || version_compare( $hello_theme_db_version, HELLO_ELEMENTOR_VERSION, '<' ) ) {
		update_option( $theme_version_option_name, HELLO_ELEMENTOR_VERSION );
	}
}

if ( ! function_exists( 'hello_elementor_scripts_styles' ) ) {
	/**
	 * Theme Scripts & Styles.
	 *
	 * @return void
	 */
	function hello_elementor_scripts_styles() {
		$enqueue_basic_style = apply_filters_deprecated( 'elementor_hello_theme_enqueue_style', [ true ], '2.0', 'hello_elementor_enqueue_style' );
		$min_suffix          = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		if ( apply_filters( 'hello_elementor_enqueue_style', $enqueue_basic_style ) ) {
			wp_enqueue_style(
				'hello-elementor',
				get_template_directory_uri() . '/style' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}

		if ( apply_filters( 'hello_elementor_enqueue_theme_style', false ) ) {
			wp_enqueue_style(
				'hello-elementor-theme-style',
				get_template_directory_uri() . '/theme' . $min_suffix . '.css',
				[],
				HELLO_ELEMENTOR_VERSION
			);
		}
		// wp_enqueue_style(
		// 	'bootstrap-reboot-style',
		// 	get_template_directory_uri() . '/assets/styles/bootstrap/css/bootstrap-grid' . $min_suffix . '.css',
		// 	[],
		// 	HELLO_ELEMENTOR_VERSION
		// );
		wp_enqueue_style(
			'bootstrap-grid-style',
			get_template_directory_uri() . '/assets/styles/bootstrap/css/bootstrap-grid' . $min_suffix . '.css',
			[],
			HELLO_ELEMENTOR_VERSION
		);
		wp_enqueue_style(
			'bootstrap-grid-utilities',
			get_template_directory_uri() . '/assets/styles/bootstrap/css/bootstrap-utilities' . $min_suffix . '.css',
			[],
			HELLO_ELEMENTOR_VERSION
		);
		wp_enqueue_style(
			'bootstrap-grid-utilities',
			get_template_directory_uri() . '/assets/styles/bootstrap/css/bootstrap' . $min_suffix . '.css',
			[],
			HELLO_ELEMENTOR_VERSION
		);
		wp_enqueue_style(
			'test-styles',
			get_template_directory_uri() . '/styles.css',
			[],
			HELLO_ELEMENTOR_VERSION
		);
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_scripts_styles' );

if ( ! function_exists( 'hello_elementor_register_elementor_locations' ) ) {
	/**
	 * Register Elementor Locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Classes\Locations_Manager $elementor_theme_manager theme manager.
	 *
	 * @return void
	 */
	function hello_elementor_register_elementor_locations( $elementor_theme_manager ) {
		$hook_result = apply_filters_deprecated( 'elementor_hello_theme_register_elementor_locations', [ true ], '2.0', 'hello_elementor_register_elementor_locations' );
		if ( apply_filters( 'hello_elementor_register_elementor_locations', $hook_result ) ) {
			$elementor_theme_manager->register_all_core_location();
		}
	}
}
add_action( 'elementor/theme/register_locations', 'hello_elementor_register_elementor_locations' );

if ( ! function_exists( 'hello_elementor_content_width' ) ) {
	/**
	 * Set default content width.
	 *
	 * @return void
	 */
	function hello_elementor_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'hello_elementor_content_width', 800 );
	}
}
add_action( 'after_setup_theme', 'hello_elementor_content_width', 0 );

if ( is_admin() ) {
	require get_template_directory() . '/includes/admin-functions.php';
}

/**
 * If Elementor is installed and active, we can load the Elementor-specific Settings & Features
*/

// Allow active/inactive via the Experiments
require get_template_directory() . '/includes/elementor-functions.php';

/**
 * Include customizer registration functions
*/
function hello_register_customizer_functions() {
	if ( hello_header_footer_experiment_active() && is_customize_preview() ) {
		require get_template_directory() . '/includes/customizer-functions.php';
	}
}
add_action( 'init', 'hello_register_customizer_functions' );

if ( ! function_exists( 'hello_elementor_check_hide_title' ) ) {
	/**
	 * Check hide title.
	 *
	 * @param bool $val default value.
	 *
	 * @return bool
	 */
	function hello_elementor_check_hide_title( $val ) {
		if ( defined( 'ELEMENTOR_VERSION' ) ) {
			$current_doc = Elementor\Plugin::instance()->documents->get( get_the_ID() );
			if ( $current_doc && 'yes' === $current_doc->get_settings( 'hide_title' ) ) {
				$val = false;
			}
		}
		return $val;
	}
}
add_filter( 'hello_elementor_page_title', 'hello_elementor_check_hide_title' );

/**
 * Wrapper function to deal with backwards compatibility.
 */
if ( ! function_exists( 'hello_elementor_body_open' ) ) {
	function hello_elementor_body_open() {
		if ( function_exists( 'wp_body_open' ) ) {
			wp_body_open();
		} else {
			do_action( 'wp_body_open' );
		}
	}
}


// add scripts for form and send ajax url to frontend
function add_user_scripts() {
    if(is_home()) {
		wp_enqueue_script('validator_scripts', get_template_directory_uri() . '/assets/js/js-form-validator.min.js', '', '1.1.0', true);
    	wp_enqueue_script('form_add_user_scripts', get_template_directory_uri() . '/assets/js/form.js', ['validator_scripts'], '1.1.0', true);
    	wp_localize_script( 'form_add_user_scripts', 'ajax_data', array(
    		'ajax_url' => admin_url( 'admin-ajax.php' ),
    		'nonce' => wp_create_nonce( 'add-user-nonce' ),
		) );
    }
  }

add_action('wp_enqueue_scripts', 'add_user_scripts');


// function to insert new user from form with wp_ajax
// use built in wordpress password generator and PHPmailer

function form_add_user() {

	// sanitize data for insertion
	$name = sanitize_text_field($_POST['name|required']);
	$email = sanitize_text_field($_POST['email|required']);
	$phone = sanitize_text_field($_POST['phone']);
	$username = join("_", preg_split("/[-\s]/", $name));
	$pass = wp_generate_password();
	$date = date_create();
	$subject = "Account Created!";
	$msg = "Hi $name, Your account has been created with the password: $pass";
	$response = ['status' => 1];
	$errors = ['errors' => []];

	// check if data meets criteria
	if (strlen($name) < 2 || !validate_username($username)) {
		$response['status'] = 0;
		$errors['errors'][] = "name $name|$username is invalid";
	}
	if (!is_email($email)) {
		$response['status'] = 0;
		$errors['errors'][] = "email is invalid";
	}
	if (!$response['status']) {
		$response['data'] = $errors;
		echo json_encode($response);
		wp_die();
	}

	$user_data = [
	    'display_name'=>$name,
	    'user_login'=> $username,
	    'user_pass'=>$pass,
	    'user_email'=> $email,
		'meta_input' => [
			'user_phone' => $phone
		],
	    'user_registered'=> date_timestamp_get($date)
	];

	$insert_result = wp_insert_user($user_data);
	
	if (is_wp_error($insert_result)) {
		$response['status'] = 0;
		$wperrors = $insert_result->errors;
		$errors = ['errors' => []];
		foreach(array_values($wperrors) as $k => $error) {
			$errors['errors'][] = $error[0];
		}
		$response['data'] = $errors;
		echo json_encode($response);
		wp_die();
	}

	$mail_result = wp_mail($email, $subject, $msg);
	if (!$mail_result) {
		$response['status'] = 0;
		$response['data'] = ["errors" => ["email wasn't successfully sent please use another email."]];

		echo json_encode($response);
		wp_die();
	}
	
	$response['data'] = [
	    'name'=>$name,
	    'email'=> $email,
	];
	
	echo json_encode($response);
	wp_die();
}

add_action('wp_ajax_nopriv_form_add_user', 'form_add_user');