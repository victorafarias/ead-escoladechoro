<?php
$theme = wp_get_theme(); // gets the current theme
if ( 'eCademy' == $theme->name || 'eCademy' == $theme->parent_theme ) {
	/**	
	 * Classes
	 */
	require_once(ECADEMY_ACC_PATH . 'inc/classes/eCademy_base.php');
	require_once(ECADEMY_ACC_PATH . 'inc/classes/eCademy_rt.php');
	require_once(ECADEMY_ACC_PATH . 'inc/classes/eCademy_admin_page.php');
	require_once(ECADEMY_ACC_PATH . 'inc/admin/dashboard/eCademy_admin_dashboard.php');
	require_once(ECADEMY_ACC_PATH . 'inc/functions.php');

    if (version_compare($theme->get('Version'), ECADEMY_TOOLKIT_VERSION, '>')) {
        $update_message = "A new version of eCademy Toolkit is available. Please go to Dashboard->Plugins and delete the old eCademy Toolkit plugin and then install the updated eCademy Toolkit plugin from Appearance > Install Plugins.";
        add_action('admin_notices', function() use ($update_message) {
            echo '<div class="notice notice-warning" style="background-color: #fff2ce;"><p>' . esc_html($update_message) . '</p></div>';
        });
    }
}