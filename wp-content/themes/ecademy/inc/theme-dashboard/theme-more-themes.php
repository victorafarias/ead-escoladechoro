<?php
/**
 * eCademy Dashboard - More Themes Page
 *
 * @package eCademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>

<div class="wrap about-wrap et-admin-wrap">

    <!-- Navigation Tabs -->
    <?php ecademy_admin_navigation_tabs( 'ecademy-more-themes' ); ?>

    <div id="ecademy-dashboard" class="wrap about-wrap">
        <div class="welcome-content w-clearfix extra">

            <!-- EnvyTheme.com Items -->
            <div class="etd-more-themes">
                <div class="w-row middle">
                    <div class="w-col-sm-6">
                        <div class="et-profile">
                            <h3><?php esc_html_e( 'EnvyTheme Popular Items', 'ecademy' ); ?></h3>
                            <span><?php esc_html_e( 'Buy Premium Quality Themes, Templates for Your Website!', 'ecademy' ); ?></span>
                        </div>
                    </div>

                    <div class="w-col-sm-6 text-right">
                        <a target="_blank" class="more-btn" href="https://shop.envytheme.com/" rel="noopener noreferrer">
                            <?php esc_html_e( 'Browse All', 'ecademy' ); ?>
                        </a>
                    </div>
                </div>
                <div class="et-com-themes w-row"></div>
            </div>

            <!-- EnvyTheme ThemeForest Items -->
            <div class="etd-more-themes etd-more-themes-2">
                <div class="w-row middle">
                    <div class="w-col-sm-6">
                        <div class="et-profile">
                            <h3><?php esc_html_e( "EnvyTheme's Popular Items on ThemeForest", 'ecademy' ); ?></h3>
                            <span><?php esc_html_e( 'Premium Quality Design & Development Services', 'ecademy' ); ?></span>
                        </div>
                    </div>

                    <div class="w-col-sm-6 text-right">
                        <a target="_blank" class="more-btn" href="https://1.envato.market/O2y7r">
                            <?php esc_html_e( 'Browse All', 'ecademy' ); ?>
                        </a>
                    </div>
                </div>
                <div class="et-tf-themes w-row"></div>
            </div>

            <!-- Hire Us Section -->
            <div class="etd-more-themes etd-more-themes-2 et-hire-us">
                <div class="et-profile">
                    <h3><?php esc_html_e( 'Need Custom Project Work?', 'ecademy' ); ?></h3>
                    <p>
                        <?php esc_html_e( 'We provide full-depth web, mobile, and eCommerce project work, including UX/UI design, development, customization, maintenance, and management.', 'ecademy' ); ?>
                        <?php esc_html_e( 'If you have a project and need our services, feel free to send an email for a quote with your project details:', 'ecademy' ); ?>
                        <strong>
                            <a href="mailto:hello@envytheme.com"><u><?php esc_html_e( 'Click to Email', 'ecademy' ); ?></u></a>
                        </strong>
                    </p>
                    <a target="_blank" class="more-btn" href="mailto:hello@envytheme.com">
                        <?php esc_html_e( 'Hire Us', 'ecademy' ); ?>
                    </a>
                </div>
            </div>

            <!-- Social Media Links -->
            <div class="ecademy-social-section">
                <div class="ecademy-social-box">
                    <h3 class="ecademy-section-title"><?php esc_html_e( 'Follow Us On:', 'ecademy' ); ?></h3>
                    <div class="ecademy-social-networks">
                        <a href="https://twitter.com/EnvyTheme" rel="noopener noreferrer" title="Twitter" target="_blank" class="twitter">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/theme-dashboard/images/social/twitter-x.svg' ); ?>" alt="Twitter">
                        </a>
                        <a href="https://www.linkedin.com/company/envytheme/" rel="noopener noreferrer" title="LinkedIn" target="_blank" class="linkedin">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/theme-dashboard/images/social/linkedin.svg' ); ?>" alt="LinkedIn">
                        </a>
                        <a href="https://www.facebook.com/EnvyTheme" rel="noopener noreferrer" title="Facebook" target="_blank" class="facebook">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/theme-dashboard/images/social/facebook.svg' ); ?>" alt="Facebook">
                        </a>
                        <a href="https://behance.net/EnvyTheme" rel="noopener noreferrer" title="Behance" target="_blank" class="behance">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/theme-dashboard/images/social/behance.svg' ); ?>" alt="Behance">
                        </a>
                        <a href="https://dribbble.com/EnvyTheme" rel="noopener noreferrer" title="Dribbble" target="_blank" class="dribbble">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/theme-dashboard/images/social/dribbble.svg' ); ?>" alt="Dribbble">
                        </a>
                        <a href="https://www.youtube.com/@EnvyTheme" rel="noopener noreferrer" title="YouTube" target="_blank" class="youtube">
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/inc/theme-dashboard/images/social/youtube.svg' ); ?>" alt="YouTube">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- end wrap -->
