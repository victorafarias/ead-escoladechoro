<?php
/**
 * eCademy Dashboard Functionalities
 *
 * Handles theme dashboard pages, menu items, scripts, and redirections.
 */

// Load required files
require get_parent_theme_file_path('/inc/theme-dashboard/tgmpa/tgmpa.php');

/**
 * Add eCademy Theme dashboard menu and submenu pages.
 */
function ecademy_dashboard_submenu_page() {
    add_menu_page(
        esc_html__('eCademy Theme', 'ecademy'),
        esc_html__('eCademy Theme', 'ecademy'),
        'manage_options',
        'ecademy-dashboard',
        '',
        get_template_directory_uri() . '/inc/theme-dashboard/images/dashboard.svg',
        2
    );

    // Define submenu pages
    $submenus = array(
        'ecademy-dashboard'      => array('title' => __('Getting Started', 'ecademy'), 'callback' => 'ecademy_screen_welcome'),
        'ecademy-admin-plugins'  => array('title' => __('Plugins', 'ecademy'), 'callback' => 'ecademy_screen_plugin'),
        'ecademy-activation'     => array('title' => __('Activation', 'ecademy'), 'callback' => 'ecademy_activation_page'),
        'ecademy-demo-import'    => array('title' => __('Demo Import', 'ecademy'), 'callback' => 'ecademy_demo_page'),
        'ecademy_opt'            => array('title' => __('Theme Options', 'ecademy'), 'callback' => 'ecademy_options_page'),
        'ecademy-support'        => array('title' => __('Support + Others', 'ecademy'), 'callback' => 'ecademy_support_page'),
        'ecademy-more-themes'    => array('title' => __('+ More Themes', 'ecademy'), 'callback' => 'ecademy_more_themes_page'),
    );

    if (!function_exists('ecademy_function_pcs')) {
        unset($submenus['ecademy-activation']);
        unset($submenus['ecademy-demo-import']);
        unset($submenus['ecademy_opt']);
    }

    foreach ($submenus as $slug => $menu) {
        add_submenu_page(
            'ecademy-dashboard',
            $menu['title'],
            $menu['title'],
            'manage_options',
            $slug,
            $menu['callback']
        );
    }
}
add_action('admin_menu', 'ecademy_dashboard_submenu_page');

/**
 * Load the "Getting Started" page.
 */
function ecademy_screen_welcome() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    locate_template('/inc/theme-dashboard/welcome.php', true, true);
}

/**
 * Load the "Support" page.
 */
function ecademy_support_page() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    locate_template('/inc/theme-dashboard/theme-support.php', true, true);
}

/**
 * Load the "Demo Import" page.
 */
function ecademy_demo_page() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    locate_template('/inc/theme-dashboard/theme-demo.php', true, true);
}

/**
 * Load the "More Themes" page.
 */
function ecademy_more_themes_page() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    locate_template('/inc/theme-dashboard/theme-more-themes.php', true, true);
}

/**
 * Load the "Plugin Installation" page.
 */
function ecademy_screen_plugin() {
	echo '<div class="wrap" style="height:0;overflow:hidden;"><h2></h2></div>';
    locate_template('/inc/theme-dashboard/install-plugins.php', true, true);
}

// Load admin-related files if in the admin dashboard
if (is_admin()) {
    include_once get_template_directory() . '/inc/theme-dashboard/et-admin.php';
}

/**
 * Enqueue admin dashboard styles and scripts.
 */
function ecademy_enqueue_scripts() {
    wp_enqueue_style('ecademy-admin-styles', ECADEMY_THEME_URI . '/inc/theme-dashboard/css/admin-pages.css', array(), wp_get_theme()->get('Version'));
    wp_enqueue_script('ecademy-admin', ECADEMY_THEME_URI . '/inc/theme-dashboard/js/theme-admin.min.js', array('jquery'), wp_get_theme()->get('Version'), true);
}
add_action('admin_enqueue_scripts', 'ecademy_enqueue_scripts');

/**
 * Generate eCademy Admin Navigation Tabs.
 *
 * @param string $active_tab Active tab identifier.
 */
function ecademy_admin_navigation_tabs($active_tab) {
    $ecademy_my_theme = wp_get_theme();
    $plugin_active = function_exists('ecademy_function_pcs');

    if ($ecademy_my_theme->parent_theme) {
        $ecademy_my_theme = wp_get_theme(basename(get_template_directory()));
    }

    // Determine theme activation status class
    $theme_status = '';
    if ($plugin_active) {
        $theme_status = get_option('ecademy_purchase_code_status') === 'valid' ? 'et-valid-nav' : 'et-not-valid-nav';
    }

    ?>
    <div class="et-header">
        <h1><?php echo esc_html__('Welcome to ', 'ecademy') . esc_html($ecademy_my_theme->Name) . esc_html__(' Theme', 'ecademy'); ?></h1>
        <div class="about-text"><?php printf(esc_html__('Version: %s', 'ecademy'), esc_html($ecademy_my_theme->Version)); ?></div>
        <div class="about-text">
            <?php echo esc_html__('Thank you for choosing ', 'ecademy') . esc_html($ecademy_my_theme->Name) . esc_html__(' WordPress Theme! Get started building your stunning site by easily importing theme prebuilt demos and customizing the theme options to suit your needs.', 'ecademy'); ?>
        </div>
        <img class="welcome-shape" src="<?php echo esc_url(get_template_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr__('Banner', 'ecademy'); ?>">
        <a href="https://themeforest.net/downloads" target="_blank" class="etd-rating">
            <span class="dashicons dashicons-star-filled"></span>
            <?php echo esc_html__('Rate ', 'ecademy') . esc_html($ecademy_my_theme->Name) . esc_html__(' Theme on ThemeForest', 'ecademy'); ?>
        </a>
    </div>

    <?php
    $tabs = array(
        'dashboard'          => array('title' => __('Getting Started', 'ecademy'), 'url' => 'admin.php?page=ecademy-dashboard'),
        'ecademy-admin-plugins' => array('title' => __('Plugins', 'ecademy'), 'url' => 'admin.php?page=ecademy-admin-plugins'),
        'ecademy-activation'    => array('title' => __('Activation', 'ecademy'), 'url' => 'admin.php?page=ecademy-activation'),
        'ecademy-demo-import'   => array('title' => __('Demo Import', 'ecademy'), 'url' => 'admin.php?page=ecademy-demo-import'),
        'options'            => array('title' => __('Theme Options', 'ecademy'), 'url' => 'admin.php?page=ecademy_opt'),
        'ecademy-support'      => array('title' => __('Support + Others', 'ecademy'), 'url' => 'admin.php?page=ecademy-support'),
        'ecademy-more-themes'  => array('title' => __('+ More Themes', 'ecademy'), 'url' => 'admin.php?page=ecademy-more-themes'),
    );

    $disabled_tabs = array('ecademy-activation', 'ecademy-demo-import', 'options');
    ?>
    <h2 class="nav-tab-wrapper wp-clearfix <?php echo esc_attr($theme_status); ?>">
        <?php
        foreach ($tabs as $key => $tab) {
            $is_disabled = (!$plugin_active && in_array($key, $disabled_tabs));
            $class = 'et-nav-' . $key . ' nav-tab' . ($active_tab === $key ? ' nav-tab-active' : '') . ($is_disabled ? ' et-disabled-tab' : '');
            $href = $is_disabled ? '#' : esc_url(self_admin_url($tab['url']));
            $tooltip = $is_disabled ? 'title="' . esc_attr__('Required: eCademy Toolkit Plugin!', 'ecademy') . '"' : '';

            echo '<a class="' . esc_attr($class) . '" href="' . esc_url($href) . '" ' . $tooltip . '>';
            echo esc_html($tab['title']);
            echo '</a>';
        }
        ?>
    </h2>
    <?php
}

/**
 * Redirect to theme dashboard after activation.
 */
function ecademy_theme_redirect_on_activation() {
    if (is_admin() && isset($_GET['activated']) && !function_exists('ecademy_function_pcs')) {
        wp_safe_redirect(admin_url('admin.php?page=ecademy-dashboard'));
        exit;
    }
}
add_action('after_switch_theme', 'ecademy_theme_redirect_on_activation');