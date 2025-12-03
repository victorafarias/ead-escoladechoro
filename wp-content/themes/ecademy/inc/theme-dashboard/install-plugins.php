<?php
/**
 * eCademy Dashboard - Install Plugins Page
 *
 * @package ecademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="wrap about-wrap et-admin-wrap">

    <?php ecademy_admin_navigation_tabs( 'ecademy-admin-plugins' ); ?>

    <div id="ecademy-dashboard" class="wrap about-wrap">
        <div class="welcome-content w-clearfix extra">
            <div class="ecademy-plugins ecademy-theme-browser-wrap">
                <div class="theme-browser rendered">
                    <?php
                    if ( isset($_POST['lms']) ) {
                        echo "<meta http-equiv='refresh' content='0'>";
                        update_option('et_lms_plugin_name', $_POST['lms'], 'yes');
                                    }
                    $lms = get_option( 'et_lms_plugin_name' );
                    if($lms):
                        update_option('et_selected_lms_plugin', $lms, 'yes');
                    else:
                        update_option('et_selected_lms_plugin', 'learnpress', 'yes');
                    endif;
                    ?>

                    <form action="" method="post" id="et-lms-check" class="et-theme-register-form">
                        <div class="lms-plugin">
                            <h3><?php echo esc_html__('Please select the LMS plugin which you want to use.', 'ecademy'); ?></h3>
                            <ul>
                                <li>
                                    <input type="radio" id="tutor" name="lms" value="tutor" <?php if($lms == 'tutor'): ?>checked<?php endif; ?>>
                                    <label for="tutor"><?php echo esc_html__('Tutor LMS', 'ecademy'); ?></label>
                                </li>
                                <li>
                                    <input type="radio" id="learnpress" name="lms" value="learnpress" <?php if($lms == 'learnpress'): ?>checked<?php endif; ?>>
                                    <label for="learnpress"><?php echo esc_html__('LearnPress', 'ecademy'); ?></label>
                                </li>
                                <li>
                                    <input type="radio" id="learndash" name="lms" value="learndash" <?php if($lms == 'learndash'): ?>checked<?php endif; ?>>
                                    <label for="learndash"><?php echo esc_html__('LearnDash', 'ecademy'); ?></label>
                                </li>
                            </ul>
                        </div>

                        <?php if($lms == 'learndash'): ?>
                            <div class="ld-notice"><p><?php echo esc_html('LearnDash is a premium plugin, you have to buy this plugin. Please install the plugin manually from Plugins->Add New', 'ecademy'); ?></p></div>
                        <?php endif; ?>

                        <input type="submit" class="et-lms-btn" value='Save'>
                    </form>
                    
                    
                    <!-- Plugin Installation Heading & Button -->
                    <div class="whi-install-plugins-wrap">
                        <h3><?php echo esc_html__( 'The following plugins are recommended', 'ecademy' ); ?></h3>
                        <a href="#" class="ecademy-admin-btn whi-install-plugins">
                            <?php echo esc_html__( 'Activate All Plugins', 'ecademy' ); ?>
                        </a>
                    </div>

                    <div class="ecademy-plugins-wrap ecademy-plugins">
                        <?php
                        // Initialize TGM Plugin Activation List Table
                        $tgmpa_list_table = new TGMPA_List_Table();
                        $plugins          = TGM_Plugin_Activation::$instance->plugins;

                        foreach ( $plugins as $plugin ) :
                            $plugin_status = '';

                            // Ensure 'type' is set
                            $plugin['type'] = isset( $plugin['type'] ) ? sanitize_text_field( $plugin['type'] ) : 'recommended';
                            $plugin['sanitized_plugin'] = sanitize_text_field( $plugin['name'] );

                            // Get plugin action buttons
                            $plugin_action = $tgmpa_list_table->actions_plugin( $plugin );

                            // Check if plugin is active
                            if ( strpos( $plugin_action, 'deactivate' ) !== false ) {
                                $plugin_status = 'active';
                                $plugin_action = '<div class="row-actions visible active">
                                    <span class="activate">
                                        <a class="button ecademy-admin-btn">' . esc_html__( 'Activated', 'ecademy' ) . '</a>
                                    </span>
                                </div>';
                            }
                        ?>
                            <!-- Plugin Box -->
                            <div class="ecademy-plugin wp-clearfix <?php echo esc_attr( $plugin_status ); ?>" 
                                data-plugin-name="<?php echo esc_attr( $plugin['sanitized_plugin'] ); ?>">
                                <h4><?php echo esc_html( $plugin['sanitized_plugin'] ); ?></h4>
                                <?php echo wp_kses_post($plugin_action); ?>
                            </div> 
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div> <!-- End Wrap -->