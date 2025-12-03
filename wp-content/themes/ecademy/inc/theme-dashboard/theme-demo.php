<?php
/**
 * eCademy Dashboard - Support Page
 *
 * @package ecademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wrap about-wrap et-admin-wrap">
    <?php ecademy_admin_navigation_tabs( 'ecademy-demo-import' ); ?>

    <div id="ecademy-dashboard" class="wrap about-wrap">
        <div class="welcome-content w-clearfix extra">
            <div class="w-row">
                <!-- Automatic Import Section -->
                <div class="w-col-sm-6">
                    <div class="w-box">
                        <div class="w-box-head">
                            <?php esc_html_e( '🚀 Automatic Import', 'ecademy' ); ?>
                            <b><?php esc_html_e( 'Recommended', 'ecademy' ); ?></b>
                        </div>
                        <div class="w-box-content">
                            <div class="demo-import-notice">
                                <p>
                                    <?php esc_html_e( 'Using this demo import method will delete your existing data and import a fresh copy of the demo content. Additionally, please ensure that cURL is enabled on your server. If you encounter any difficulties, we recommend trying the Alternative Demo Import method.', 'ecademy' ); ?>
                                </p>

                                <!-- Display warnings and notices based on conditions -->
                                <?php if ( ! defined( 'FW' ) ) : ?>
                                    <div class="demo-import-warning">
                                        <p>
                                            <strong><?php esc_html_e( 'Warning:', 'ecademy' ); ?></strong> 
                                            <?php esc_html_e( 'The Envy Demo Importer plugin is required to automatically import demo data. Please install and activate the plugin from', 'ecademy' ); ?> 
                                            <strong><?php esc_html_e( 'eCademy Theme → Plugins', 'ecademy' ); ?></strong>.
                                        </p>
                                    </div>
                                <?php elseif ( get_option( 'ecademy_purchase_code_status' ) === 'valid' ) : ?>
                                    <div class="demo-import-note">
                                        <p>
                                            <strong><?php esc_html_e( 'Note:', 'ecademy' ); ?></strong> 
                                            <?php esc_html_e( 'After completing the demo import, you can deactivate the Envy Demo Importer plugin.', 'ecademy' ); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <?php if ( get_option( 'ecademy_purchase_code_status' ) !== 'valid' ) : ?>
                                    <div class="demo-import-note">
                                        <p>
                                            <strong><?php esc_html_e( 'Note:', 'ecademy' ); ?></strong> 
                                            <?php esc_html_e( 'Activate the theme to unlock access to the demo import feature and seamlessly set up your website.', 'ecademy' ); ?>
                                        </p>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Import Button (if conditions met) -->
                            <?php if ( defined( 'FW' ) && get_option( 'ecademy_purchase_code_status' ) === 'valid' ) : ?>
                                <div class="w-button-link">
                                    <a href="<?php echo esc_url( self_admin_url( 'tools.php?page=fw-backups-demo-content' ) ); ?>">
                                        <i class="wp-menu-image dashicons-before dashicons-download"></i>
                                        <?php esc_html_e( 'Import Demo Data', 'ecademy' ); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Alternative Import Section -->
                <div class="w-col-sm-6">
                    <div class="w-box">
                        <div class="w-box-head">
                            <?php esc_html_e( '💡 Alternative Import', 'ecademy' ); ?>
                        </div>
                        <div class="w-box-content">
                            <div class="demo-import-alternative">
                                <p>
                                    <?php 
                                        echo esc_html__( 'With this method, your existing data will not be lost. Note: If you prefer a fresh start and do not want to keep your existing data, you can reset your site using ', 'ecademy' ) . 
                                        '<a href="https://wordpress.org/plugins/wp-reset/" target="_blank" rel="noopener noreferrer">' . esc_html__( 'WP Reset', 'ecademy' ) . '</a> ' . 
                                        esc_html__( 'before importing the demo data.', 'ecademy' ); 
                                    ?>
                                </p>

                                <!-- Step-by-Step Alternative Import Instructions -->
                                <ol>
                                    <li>
                                        <strong><?php esc_html_e( 'Install and activate the One Click Demo Import plugin.', 'ecademy' ); ?></strong><br>
                                        <a href="https://wordpress.org/plugins/one-click-demo-import/" target="_blank" rel="noopener noreferrer">
                                            <?php esc_html_e( '👉 Download Plugin', 'ecademy' ); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <strong><?php esc_html_e( 'Navigate to the demo import page:', 'ecademy' ); ?></strong><br>
                                        <?php esc_html_e( 'Go to', 'ecademy' ); ?>
                                        <strong><?php esc_html_e( 'Appearance → Import Demo Data', 'ecademy' ); ?></strong>.<br>
                                        <?php esc_html_e( 'Click the "Import" button to install your preferred demo. The process may take some time to complete.', 'ecademy' ); ?>
                                    </li>
                                    <li>
                                        <strong><?php esc_html_e( 'Update Permalink Settings (After Import is Complete):', 'ecademy' ); ?></strong><br>
                                        <?php esc_html_e( 'Go to', 'ecademy' ); ?>
                                        <strong><?php esc_html_e( 'Settings → Permalinks', 'ecademy' ); ?></strong>.<br>
                                        <?php esc_html_e( 'Click the "Save Changes" button.', 'ecademy' ); ?>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
</div> <!-- End Wrap -->