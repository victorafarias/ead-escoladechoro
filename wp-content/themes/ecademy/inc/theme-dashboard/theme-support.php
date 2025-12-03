<?php
/**
 * eCademy Dashboard Support Page
 *
 * @package ecademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>

<div class="wrap about-wrap et-admin-wrap">

	<?php ecademy_admin_navigation_tabs( 'ecademy-support' ); ?>

    <div id="ecademy-dashboard" class="wrap about-wrap">
        <div class="welcome-content w-clearfix extra">
            <ul class="support-sub-menu">
                <li><a href="#support"><?php esc_html_e('Support', 'ecademy'); ?></a></li>
                <li><a href="#child-theme"><?php esc_html_e('Child Theme', 'ecademy'); ?></a></li>
                <li><a href="#theme-update"><?php esc_html_e('Theme Update', 'ecademy'); ?></a></li>
                <li><a href="#pro-plugin-update"><?php esc_html_e('Pro Plugins Update', 'ecademy'); ?></a></li>
                <li><a href="#error-404"><?php esc_html_e('404 Error', 'ecademy'); ?></a></li>
                <li><a href="#elementor-issue"><?php esc_html_e('Elementor Edit Page Not Loading', 'ecademy'); ?></a></li>
            </ul>

            <!-- Support Section -->
            <div id="support" class="et-support-section">
                <div class="et-section-title"><?php esc_html_e('👨🏻‍💻 Support', 'ecademy'); ?></div>
                <div class="et-support-content">
                    <p><?php printf(
                        esc_html__('eCademy comes with %s and %s. Once your initial support period ends, you can extend it for an additional %s.', 'ecademy'),
                        '<strong>' . esc_html__('6 months of support', 'ecademy') . '</strong>',
                        '<strong>' . esc_html__('free lifetime updates', 'ecademy') . '</strong>',
                        '<strong>' . esc_html__('6 or 12 months', 'ecademy') . '</strong>'
                    ); ?></p>
                    
                    <p><?php esc_html_e('Even if you choose not to extend support, you can still submit', 'ecademy'); ?>
                        <strong><?php esc_html_e('bug reports', 'ecademy'); ?></strong>
                        <?php 
                        printf(
                            esc_html__('via email at %s or item comments.', 'ecademy'),
                            '<a href="mailto:' . esc_attr('hello@envytheme.com') . '">hello@envytheme.com</a>'
                        ); 
                        ?>
                    </p>

                    <br>

                    <p><?php esc_html_e( 'If you encounter any issues, please submit a ticket through our support system. Our dedicated support team is highly enthusiastic and committed to resolving your concerns as quickly as possible—just give them the opportunity.', 'ecademy' ); ?> <a href="<?php echo esc_url( 'https://support.envytheme.com/' ); ?>" target="_blank" rel="noopener noreferrer"><i class="wp-menu-image dashicons-before dashicons-tag et-sat-icon"></i> <?php esc_html_e( 'Submit a ticket here', 'ecademy' ); ?></a></p>

                    <div class="w-row">
                        <div class="w-col-sm-6"><h3>
                            <?php esc_html_e("🔹 What's Included in Support?", 'ecademy'); ?></h3>
                            <ul>
                                <li><?php esc_html_e('Assistance with theme features and issues related to the theme.', 'ecademy'); ?></li>
                                <li><?php esc_html_e('Bug fixes and guidance on using the theme.', 'ecademy'); ?></li>
                            </ul>
                        </div>
                        <div class="w-col-sm-6 not-included">
                            <h3><?php esc_html_e("🚫 What's Not Included?", 'ecademy'); ?></h3>
                            <ul>
                                <li><?php esc_html_e('Custom coding or modifications.', 'ecademy'); ?></li>
                                <li><?php esc_html_e('Support for third-party plugins.', 'ecademy'); ?></li>
                            </ul>
                        </div>
                    </div>

                    <p><?php esc_html_e('➤ For more details, please check', 'ecademy'); ?>
                        <a href="<?php echo esc_url('https://themeforest.net/page/item_support_policy'); ?>" target="_blank" rel="noopener noreferrer">
                            <?php esc_html_e("Envato’s Item Support Policy", 'ecademy'); ?>
                        </a>
                    </p>

                    <p><?php esc_html_e('➤ If you need advanced customization or custom work, we recommend', 'ecademy'); ?>
                        <a href="<?php echo esc_url('https://shop.envytheme.com/submit-your-service-order/'); ?>"  target="_blank" rel="noopener noreferrer"> 
                            <?php esc_html_e('submitting your order here', 'ecademy'); ?>
                        </a>
                    </p>
                </div>
            </div>

            <!-- Child Theme Section -->
            <div id="child-theme" class="et-support-section">
            <div class="et-section-title"><?php esc_html_e('📝 Child Theme', 'ecademy'); ?></div>
                <div class="et-support-content">
                    <div class="ecademy-install-guide">
                        <ol>
                            <li>
                                <strong><?php esc_html_e('Find eCademy Child Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('You will find the eCademy Child Theme inside the theme bundle after purchasing.', 'ecademy'); ?><br>
                                <?php esc_html_e('Ensure that you have downloaded the full theme package from', 'ecademy'); ?>
                                <a href="<?php echo esc_url('https://themeforest.net/downloads'); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php esc_html_e('ThemeForest.', 'ecademy'); ?>
                                </a>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Prepare the Child Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Extract the downloaded ZIP file and locate the', 'ecademy'); ?> 
                                <strong><?php esc_html_e('ecademy-child.zip', 'ecademy'); ?></strong> 
                                <?php esc_html_e('file.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Install the Child Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Go to', 'ecademy'); ?> 
                                <strong><?php esc_html_e('Dashboard', 'ecademy'); ?> → <?php esc_html_e('Appearance', 'ecademy'); ?> → <?php esc_html_e('Themes', 'ecademy'); ?> → <?php esc_html_e('Add New', 'ecademy'); ?> → <?php esc_html_e('Upload Theme.', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Click "Choose File", select', 'ecademy'); ?> 
                                <strong><?php esc_html_e('ecademy-child.zip', 'ecademy'); ?></strong>, 
                                <?php esc_html_e('and click "Install Now".', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Activate the Child Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Once installed, click', 'ecademy'); ?> 
                                <strong><?php esc_html_e('"Activate"', 'ecademy'); ?></strong> 
                                <?php esc_html_e('to start using the eCademy Child Theme.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Verify Theme Installation', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Ensure that eCademy Parent Theme is installed and active before using the child theme.', 'ecademy'); ?><br>
                                <?php esc_html_e('You can check this in', 'ecademy'); ?> 
                                <strong><?php esc_html_e('Dashboard', 'ecademy'); ?> → <?php esc_html_e('Appearance', 'ecademy'); ?> → <?php esc_html_e('Themes.', 'ecademy'); ?></strong>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Customize eCademy Theme with Child Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Use the child theme to customize your website without affecting parent theme updates.', 'ecademy'); ?><br>
                                <?php esc_html_e('For more details on using child themes, visit the', 'ecademy'); ?> 
                                <a href="<?php echo esc_url('https://developer.wordpress.org/themes/advanced-topics/child-themes/'); ?>" target="_blank" rel="noopener">
                                    <?php esc_html_e('WordPress Child Theme Documentation.', 'ecademy'); ?>
                                </a>
                            </li>
                        </ol>

                    </div>
                </div>
            </div>

            <!-- Theme Update Section -->
            <div id="theme-update" class="et-support-section">
            <div class="et-section-title"><?php esc_html_e('🔄 Theme Update', 'ecademy'); ?></div>
                <div class="et-support-content">
                    <div class="ecademy-install-guide">
                        <ol>
                            <li>
                                <strong><?php esc_html_e('Download the eCademy Files', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Log in to your', 'ecademy'); ?> 
                                <a href="<?php echo esc_url('https://themeforest.net/downloads'); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php esc_html_e('ThemeForest account.', 'ecademy'); ?>
                                </a> 
                                <?php esc_html_e('Navigate to the Downloads tab and locate eCademy.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Choose the Correct File', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Select', 'ecademy'); ?> 
                                <em><?php esc_html_e('"All files and documentation" (full ZIP folder).', 'ecademy'); ?></em>
                                <?php esc_html_e('Extract the ZIP file and locate the', 'ecademy'); ?> 
                                <strong><?php esc_html_e('ecademy.zip', 'ecademy'); ?></strong> 
                                <?php esc_html_e('file.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Install the Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Go to', 'ecademy'); ?> 
                                <strong><?php esc_html_e('Dashboard', 'ecademy'); ?> → <?php esc_html_e('Appearance', 'ecademy'); ?> → <?php esc_html_e('Themes', 'ecademy'); ?> → <?php esc_html_e('Add New', 'ecademy'); ?> → <?php esc_html_e('Upload Theme.', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Click "Choose File", select', 'ecademy'); ?> 
                                <strong><?php esc_html_e('ecademy.zip', 'ecademy'); ?></strong>, 
                                <?php esc_html_e('and click "Install Now".', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Update the eCademy Toolkit Plugin', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Delete the old eCademy Toolkit plugin.', 'ecademy'); ?><br>
                                <?php esc_html_e('Install the updated version from:', 'ecademy'); ?>
                                <strong><?php esc_html_e('Dashboard', 'ecademy'); ?> → <?php esc_html_e('eCademy Theme', 'ecademy'); ?> → <?php esc_html_e('Plugins.', 'ecademy'); ?></strong>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Updating the Theme', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('For different update methods and detailed instructions, please check the', 'ecademy'); ?>
                                <a href="<?php echo esc_url('https://docs.envytheme.com/envydoc/ecademy-theme-documentation/'); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php esc_html_e('eCademy Theme Documentation.', 'ecademy'); ?>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Pro Plugins Update Section -->
            <div id="pro-plugin-update" class="et-support-section">
                <div class="et-section-title"><?php esc_html_e('🔄 Pro Plugins Update', 'ecademy'); ?></div>
                <div class="et-support-content">
                    <div class="ecademy-install-guide">
                        <ol>
                            <li>
                                <strong><?php esc_html_e('Note:', 'ecademy'); ?></strong><br>
                                <?php esc_html_e("We do not provide licenses for Pro plugins, so automatic updates are not available.", "ecademy"); ?>
                                <?php esc_html_e("To receive automatic updates directly from the dashboard, you will need to purchase the Pro plugin separately.", "ecademy"); ?>
                                <?php esc_html_e("However, we provide the latest plugin files. Please follow the steps below to update Pro plugins:", "ecademy"); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 1:', 'ecademy'); ?></strong>
                                <?php esc_html_e('Delete the old Pro plugin from your Dashboard.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 2:', 'ecademy'); ?></strong>
                                <?php esc_html_e('Install the updated version from:', 'ecademy'); ?>
                                <strong><?php esc_html_e('Dashboard → eCademy Theme → Plugins.', 'ecademy'); ?></strong>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- 404 Error Section -->
            <div id="error-404" class="et-support-section">
                <div class="et-section-title"><?php esc_html_e('🛠 Fix 404 Page Not Found Issue', 'ecademy'); ?></div>
                <div class="et-support-content">
                    <div class="ecademy-install-guide">
                        <ol>
                            <li>
                                <strong><?php esc_html_e('Step 1: Reset Permalinks(Most Common Fix)', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Go to', 'ecademy'); ?>
                                <strong><?php esc_html_e('Dashboard → Settings → Permalinks', 'ecademy'); ?></strong>.<br>
                                <?php esc_html_e('Select', 'ecademy'); ?>
                                <strong><?php esc_html_e('Post name', 'ecademy'); ?></strong>
                                <?php esc_html_e('(or your preferred permalink structure).', 'ecademy'); ?><br>
                                <?php esc_html_e('Click', 'ecademy'); ?>
                                <strong><?php esc_html_e('Save Changes', 'ecademy'); ?></strong>
                                <?php esc_html_e('(even if it was already selected).', 'ecademy'); ?><br>
                                <?php esc_html_e('Refresh your website and check if the issue is resolved.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 2:', 'ecademy'); ?></strong>
                                <?php esc_html_e('If the issue persists, ensure your .htaccess file is correctly configured. You may need to update or reset it.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 3:', 'ecademy'); ?></strong>
                                <?php esc_html_e('Deactivate all plugins to check for conflicts, then reactivate them one by one.', 'ecademy'); ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Elementor Page Not Loading Issue Section -->
            <div id="elementor-issue" class="et-support-section">
                <div class="et-section-title"><?php esc_html_e('⏳ Fix Elementor Page Not Loading Issue', 'ecademy'); ?></div>
                <div class="et-support-content">
                    <div class="ecademy-install-guide">
                        <ol>

                            <li>
                                <strong><?php esc_html_e('Step 1: Increase PHP Memory Limit(Most Common Fix)', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Elementor may require more memory. Increase it by adding the following line to your wp-config.php file:', 'ecademy'); ?>
                                <code>define( 'WP_MEMORY_LIMIT', '256M' );</code>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 2: Enable Switch Editor Loader(Most Common Fix)', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Go to', 'ecademy'); ?>
                                <strong><?php esc_html_e('Elementor → Settings → Advanced', 'ecademy'); ?></strong>.<br>
                                <?php esc_html_e('Enable', 'ecademy'); ?>
                                <strong><?php esc_html_e('"Switch Editor Loader Method"', 'ecademy'); ?></strong>
                                <?php esc_html_e('option and save changes.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 3: Reset Permalinks', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Go to', 'ecademy'); ?>
                                <strong><?php esc_html_e('Dashboard → Settings → Permalinks', 'ecademy'); ?></strong>.<br>
                                <?php esc_html_e('Select', 'ecademy'); ?>
                                <strong><?php esc_html_e('Post name', 'ecademy'); ?></strong>
                                <?php esc_html_e('(or your preferred permalink structure).', 'ecademy'); ?><br>
                                <?php esc_html_e('Click', 'ecademy'); ?>
                                <strong><?php esc_html_e('Save Changes', 'ecademy'); ?></strong>
                                <?php esc_html_e('(even if it was already selected).', 'ecademy'); ?><br>
                                <?php esc_html_e('Refresh your website and check if the issue is resolved.', 'ecademy'); ?>
                            </li>

                            <li>
                                <strong><?php esc_html_e('Step 4: Plugin Conflict Check', 'ecademy'); ?></strong><br>
                                <?php esc_html_e('Deactivate all plugins except Elementor to check for conflicts, then reactivate them one by one.', 'ecademy'); ?>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="more-et-theme-doc"></div>

        </div>
    </div>

</div> <!-- end wrap -->
