<?php
/**
 * eCademy functions and definitions
 * @package eCademy
 */
update_option( 'ecademy_purchase_code_status', 'valid' );
/**
 * Shorthand contents for theme assets url
 */
define('ECADEMY_VERSION', (defined('WP_DEBUG') && WP_DEBUG) ? time() : wp_get_theme()->get('Version'));
define('ECADEMY_THEME_URI', get_template_directory_uri());
define('ECADEMY_THEME_DIR', get_template_directory());
define('ECADEMY_IMG',ECADEMY_THEME_URI . '/assets/img');
define('ECADEMY_CSS',ECADEMY_THEME_URI . '/assets/css');
define('ECADEMY_JS',ECADEMY_THEME_URI . '/assets/js');
$pcs = trim( get_option( 'ecademy_purchase_code_status' ) );
if( !defined('ECADEMY_FRAMEWORK_VAR') ) define('ECADEMY_FRAMEWORK_VAR', 'ecademy_opt');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'ecademy_setup' ) ) :

	function ecademy_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'ecademy', ECADEMY_THEME_DIR. '/languages' );
		$locale		 = get_locale();
		$locale_file = get_template_directory() . "/languages/$locale.php";

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Theme support WooCommerce
		add_theme_support( 'woocommerce' );

		// Add support for LearnPress
		if ( class_exists( 'LearnPress' ) ) {
        	add_filter( 'learn-press/override-templates', function(){ return true; } );
		}

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Add theme support yost seo plugin breadcrumbs
		add_theme_support( 'yoast-seo-breadcrumbs' );

		// eCademy image size
		add_image_size( 'ecademy_default_thumb', 750, 500, true );
		add_image_size( 'ecademy_advisor_thumb_one', 545, 820, true );
		add_image_size( 'ecademy_advisor_thumb_two', 590, 570, true );
		add_image_size( 'ecademy_blog_thumb', 900, 500, true );
		add_image_size( 'ecademy_400x400', 400, 400, true );
		add_image_size( 'ecademy_810x545', 810, 545, true );
		add_image_size( 'ecademy_850x900_thumb', 850, 900, true );
		add_image_size( 'ecademy_100x110_thumb', 100, 110, true );
		add_image_size( 'ecademy_620x455_thumb', 620, 455, true );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
endif;
add_action( 'after_setup_theme', 'ecademy_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function ecademy_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'ecademy_content_width', 640 );
}
add_action( 'after_setup_theme', 'ecademy_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'ecademy_scripts' ) ) :

	function ecademy_scripts() {
        global $ecademy_opt;
		$is_cursor      = !empty($ecademy_opt['is_cursor']) ? $ecademy_opt['is_cursor'] : '';
		if( isset( $ecademy_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $ecademy_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

		wp_enqueue_style( 'ecademy-style', get_stylesheet_uri() );
		wp_style_add_data( 'ecademy-style', 'rtl', 'replace' );

		wp_enqueue_style( 'vendor', 				ECADEMY_CSS . '/vendor.min.css', null, ECADEMY_VERSION );
		// Video CSS
		if( is_singular('lp_course') ):
			wp_enqueue_style( 'video', 				ECADEMY_CSS . '/video.min.css', null, ECADEMY_VERSION );
		endif;

		// WooCommerce CSS
		if ( class_exists( 'WooCommerce' ) ):
			wp_enqueue_style( 'ecademy-woocommerce', get_template_directory_uri() . '/assets/css/woocommerce.css');
		endif;

		// BuddyPress CSS
		if ( class_exists( 'BuddyPress' ) ):
			wp_enqueue_style( 'ecademy-buddypress', get_template_directory_uri() . '/assets/css/buddypress.css');
		endif;

		wp_enqueue_style( 'ecademy-main-style', 	ECADEMY_CSS . '/style.css', null, ECADEMY_VERSION );
		wp_enqueue_style( 'ecademy-responsive', 	ECADEMY_CSS . '/responsive.css', null, ECADEMY_VERSION );

		// RTL CSS
		if( ecademy_rtl() == true ):
			wp_enqueue_style( 'ecademy-rtl', get_template_directory_uri() . '/style-rtl.css' );
		endif;

		wp_enqueue_script( 'vendor', 		ECADEMY_JS . '/vendor.min.js', array('jquery'), ECADEMY_VERSION );

		// Smartify JS
		if( $is_lazyloader == true ):
			wp_enqueue_script( 'jquery-smartify', ECADEMY_JS . '/jquery.smartify.js', array('jquery'), ECADEMY_VERSION );
			wp_enqueue_script( 'ecademy-smartify', ECADEMY_JS . '/ecademy-smartify.js', array('jquery'), ECADEMY_VERSION );
		endif;

		// Video JS
		if( is_singular('lp_course') ):
			wp_enqueue_style( 'videojs', 			ECADEMY_JS . '/videojs.min.js', null, ECADEMY_VERSION );
		endif;
		wp_enqueue_script( 'jquery-cookie', 		ECADEMY_JS . '/jquery.cookie.min.js', array('jquery'), ECADEMY_VERSION );
        if( $is_cursor == '1' ):
            wp_enqueue_script( 'ecademy-cursor', 		ECADEMY_JS . '/cursor.min.js', array('jquery'), ECADEMY_VERSION );
        endif;
		wp_enqueue_script( 'ecademy-main', 			ECADEMY_JS . '/main.js', array('jquery'), ECADEMY_VERSION );

		wp_deregister_style( 'wpems-fronted-css' );
		wp_deregister_style( 'wpems-owl-carousel-css' );
		wp_deregister_script( 'wpems-owl-carousel-js' );
		wp_deregister_style( 'bp-nouveau' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
endif;
add_action( 'wp_enqueue_scripts', 'ecademy_scripts' );

if ( ! function_exists( 'ecademy_fonts' ) ) {
	function ecademy_fonts() {
		wp_enqueue_style( 'ecademy-fonts', "//fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;0,600;0,700;0,800;0,900;1,600;1,700;1,800;1,900&display=swap", '', '1.0.0', 'screen' );
	}
}
add_action( 'wp_enqueue_scripts', 'ecademy_fonts' );

/**
 * Custom template tags for this theme.
 */
require ECADEMY_THEME_DIR. '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require ECADEMY_THEME_DIR. '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require ECADEMY_THEME_DIR. '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require ECADEMY_THEME_DIR. '/inc/jetpack.php';
}

/**
 * Load bootstrap navwalker
 */
require ECADEMY_THEME_DIR. '/inc/bootstrap-navwalker.php';

/**
 * Load theme widgets
 */
require ECADEMY_THEME_DIR. '/inc/widget.php';

/**
 * Custom style
 */
require ECADEMY_THEME_DIR. '/inc/custom-style.php';

/**
 * Social link
 */
require ECADEMY_THEME_DIR. '/inc/social-link.php';

/**
 * Custom functions for LearnPress
 */
if ( class_exists( 'LearnPress' ) ) {
	require ECADEMY_THEME_DIR. '/inc/learnpress.php';
}

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Load BuddyPress compatibility file.
if ( class_exists( 'BuddyPress' ) ) {
	require get_template_directory() . '/inc/buddypress-functions.php';
}

/**
 * eCademy Menus
 */
if ( ! function_exists( 'ecademy_register_menus' ) ) :
	function ecademy_register_menus(){
		register_nav_menus(
			array(
				'primary' 		=> esc_html__('Primary Menu', 'ecademy'),
				'footer-menu' 	=> esc_html__( 'Footer Menu', 'ecademy' ),

			)
		);
	}
endif;
add_action('init', 'ecademy_register_menus');

/**
 * Filter the categories archive widget to add a span around post count
 */
if ( ! function_exists( 'ecademy_cat_count_span' ) ) {
	function ecademy_cat_count_span( $links ) {
		$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'wp_list_categories', 'ecademy_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
if ( ! function_exists( 'ecademy_archive_count_span' ) ) {
	function ecademy_archive_count_span( $links ) {
		$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'ecademy_archive_count_span' );

/**
 * Excerpt more text
 */
if ( ! function_exists( 'ecademy_excerpt_more' ) ) :
	function ecademy_excerpt_more( $more ) {
		return ' ';
	}
endif;
add_filter('excerpt_more', 'ecademy_excerpt_more');

/**
 * Remove pages from search result
 */
if ( ! function_exists( 'ecademy_remove_pages_from_search' ) ) :
    function ecademy_remove_pages_from_search() {
		global $ecademy_opt;
		global $wp_post_types;

		if( isset( $ecademy_opt['ecademy_search_page'] ) ):
			if( $ecademy_opt['ecademy_search_page'] != true ):
				$wp_post_types['page']->exclude_from_search = true;
			else:
				$wp_post_types['page']->exclude_from_search = false;
			endif;
		else:
			$wp_post_types['page']->exclude_from_search = false;
		endif;
		if ( post_type_exists( 'events' ) ) {
			// exclude from search results
			$wp_post_types['events']->exclude_from_search = true;
		}
		if ( post_type_exists( 'products' ) ) {
			// exclude from search results
			$wp_post_types['products']->exclude_from_search = true;
		}
	}
endif;
add_action('init', 'ecademy_remove_pages_from_search');

/**
 * If page edited by elementor
 */
if ( ! function_exists( 'ecademy_is_elementor' ) ) :
	function ecademy_is_elementor() {

	// Elementor not active/loaded → definitely not an Elementor page.
	if ( ! did_action( 'elementor/loaded' ) || ! class_exists( '\Elementor\Plugin', false ) ) {
	return false;
	}

	// bbPress/user/profile/archive/search screens are never Elementor documents.
	if ( ( function_exists( 'is_bbpress' ) && is_bbpress() )
	|| is_author()
	|| is_archive()
	|| is_search()
	|| is_home()
	|| is_404()
	) {
		return false;
	}

	// Must be a singular post/page with a global $post.
	if ( ! is_singular() ) {
		return false;
	}

	global $post;
	if ( empty( $post ) || empty( $post->ID ) ) {
		return false;
	}

	// Get the Elementor document safely and check it before calling methods.
	$doc = \Elementor\Plugin::$instance->documents->get( (int) $post->ID );

	if ( $doc && method_exists( $doc, 'is_built_with_elementor' ) ) {
		return (bool) $doc->is_built_with_elementor();
	}

		return false;
	}
endif;

/**
 * Notice dismiss handle
 */
add_action( 'admin_init', function() {
    if ( isset($_GET['dismissed']) && $_GET['dismissed'] == 1 ) {
        update_option('notice_dismissed', '1');
    }
    if ( isset($_GET['plugin_dismissed']) && $_GET['plugin_dismissed'] == 1 ) {
        update_option('plugin_notice_dismissed', '1');
    }
});

add_action( 'admin_notices', 'ecademy_admin_notice' );

function ecademy_admin_notice() {
	$out = '<div class="notice notice-warning is-dismissible ecademy-plugin-purchase-notice"><p><b>'.esc_html( 'Note: If you want to use LearnDash plugin then please install the plugin manually from Plugins->Add New.' ).'</b></p></div>';
	if ( get_option('plugin_notice_dismissed') ) {
		return;
	}
	echo wp_kses_post($out);
}

/**
 * Check a plugin activate
 */
function et_plugin_active( $plugin ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( $plugin ) ) {
		return true;
	}
	return false;
}

add_action( 'admin_menu', 'ecademy_remove_theme_settings', 999 );
function ecademy_remove_theme_settings() {
    remove_submenu_page( 'themes.php', 'fw-settings' );
}

/**
 * Inc
 */
include_once get_template_directory() . '/inc/init.php';


// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false', 100 );

// Disables the block editor from managing widgets. renamed from wp_use_widgets_block_editor
add_filter( 'use_widgets_block_editor', '__return_false' );

/**
 * eCademy Dashboard
*/
require get_parent_theme_file_path( '/inc/theme-dashboard/core.php' );


// ALTERAÇÃO - Colocar o nome de usuário igual ao email no cadastro de usuário
add_action( 'tutor_student_register_validation_errors', function( $validation_errors ) {
    // Verifica se o formulário foi submetido
    if ( isset( $_POST['tutor_register_student_btn'] ) ) {
        // Verifica se o campo 'email' está presente e contém um email válido
        if ( isset( $_POST['email'] ) && is_email( $_POST['email'] ) ) {
            // Define o user_login igual ao email, se user_login estiver vazio
            if ( empty( $_POST['user_login'] ) ) {
                $_POST['user_login'] = sanitize_user( $_POST['email'] );
            }
        } else {
            // Adiciona a mensagem de erro apenas na submissão
            $validation_errors[] = __( 'Please provide a valid email address.', 'tutor' );
        }
    }

    return $validation_errors;
}, 10, 1 );

// ALTERAÇÃO - Customização do dashboard
add_filter('tutor_dashboard/nav_items', 'remove_some_links_dashboard');
function remove_some_links_dashboard($links){
	unset($links['reviews']);
	unset($links['wishlist']);
	unset($links['social-profile']);
	return $links;
}

/**
 * ==========================================
 * LOGS E CORREÇÃO DE REGISTRO TUTOR LMS
 * ==========================================
 */

if ( ! function_exists( 'write_log' ) ) {
    function write_log( $log ) {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
}

/**
 * 1. Interceptar dados ANTES da validação e Logar
 */
add_action( 'init', 'debug_tutor_registration_data' );

function debug_tutor_registration_data() {
    // Verifica se é um POST de registro do Tutor
    if ( isset( $_POST['tutor_action'] ) && $_POST['tutor_action'] === 'tutor_register_student' ) {
        
        write_log( '--- INICIO TENTATIVA DE REGISTRO ---' );
        write_log( 'Dados Originais Recebidos (POST):' );
        write_log( $_POST );

        // FORÇA BRUTA: Preencher campos obrigatórios vazios
        if ( empty( $_POST['user_login'] ) && ! empty( $_POST['email'] ) ) {
            $_POST['user_login'] = $_POST['email'];
            write_log( 'CORREÇÃO APLICADA: user_login estava vazio, preenchido com email.' );
        }

        if ( empty( $_POST['last_name'] ) ) {
            $_POST['last_name'] = '-'; // Um traço é menos propenso a falhas que espaço vazio
            write_log( 'CORREÇÃO APLICADA: last_name estava vazio, preenchido com hifen.' );
        }
    }
}

/**
 * 2. Monitorar Erros de Validação
 */
add_filter( 'tutor_student_register_validation_errors', 'log_and_clear_validation_errors', 9999 );

function log_and_clear_validation_errors( $errors ) {
    
    if ( ! empty( $errors ) ) {
        write_log( 'ERROS DE VALIDAÇÃO DETECTADOS (Antes da Limpeza):' );
        write_log( $errors );
    } else {
        write_log( 'Nenhum erro de validação inicial detectado.' );
    }

    // Remove erro de sobrenome
    if ( isset( $errors['last_name'] ) ) {
        unset( $errors['last_name'] );
        write_log( 'LIMPEZA: Erro de last_name removido.' );
    }

    // Remove erro de user_login
    if ( isset( $errors['user_login'] ) ) {
        unset( $errors['user_login'] );
        write_log( 'LIMPEZA: Erro de user_login removido.' );
    }

    // Varredura extra por texto (caso a chave seja numérica)
    if ( is_array( $errors ) ) {
        foreach ( $errors as $key => $msg ) {
            // Procura por termos comuns de erro
            if ( stripos( $msg, 'Last name' ) !== false || stripos( $msg, 'Sobrenome' ) !== false ) {
                unset( $errors[ $key ] );
                write_log( 'LIMPEZA FORÇADA: Erro de sobrenome removido por texto.' );
            }
        }
    }

    return $errors;
}

/**
 * 3. Monitorar se o usuário foi criado
 */
add_action( 'user_register', 'log_new_user_creation', 10, 1 );

function log_new_user_creation( $user_id ) {
    write_log( 'SUCESSO: Novo usuário criado com ID: ' . $user_id );
    write_log( '--- FIM TENTATIVA DE REGISTRO ---' );
}