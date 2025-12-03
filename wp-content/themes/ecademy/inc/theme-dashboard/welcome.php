<?php
/**
 * eCademy Dashboard Getting Started Page
 *
 * @package ecademy
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get the theme details.
$ecademy_my_theme = wp_get_theme();
if ( $ecademy_my_theme->parent_theme ) {
	$ecademy_my_theme = wp_get_theme( basename( get_template_directory() ) );
}

// Define system parameters.
$ecademy_theme               = wp_get_theme();
$theme_version             = $ecademy_theme->get( 'Version' );
$theme_name                = $ecademy_theme->get( 'Name' );
$theme_option_address      = admin_url( 'themes.php?page=ecademy_theme_options' );

// Server settings.
$server_settings = [
	'WP Memory Limit'        => [ WP_MEMORY_LIMIT, 256, 'M' ],
	'Upload Max. Filesize'   => [ ini_get( 'upload_max_filesize' ), 64, 'M' ],
	'Max. Post Size'         => [ ini_get( 'post_max_size' ), 64, 'M' ],
	'Max. Execution Time'    => [ ini_get( 'max_execution_time' ), 300, 's' ],
	'PHP Max. Input Vars'    => [ ini_get( 'max_input_vars' ), 2000, '' ],
	'PHP Max. Input Time'    => [ ini_get( 'max_input_time' ), 1000, 's' ]
];

/**
 * Helper function to display system info with icons.
 */
function ecademy_display_system_info( $label, $current_value, $min_value, $unit ) {
	$numeric_value = (int) filter_var( $current_value, FILTER_SANITIZE_NUMBER_INT );
	$is_below_min  = ( $numeric_value < $min_value );
	$icon_class    = $is_below_min ? 'w-icon w-icon-red' : 'w-icon w-icon-green ti-check';

	echo '<div class="w-system-info">';
	echo '<span>' . esc_html( $label ) . '</span>';
	echo '<i class="' . esc_attr( $icon_class ) . '"></i> ';
	echo '<span class="w-current">' . esc_html__( 'Currently:', 'ecademy' ) . ' ' . esc_html( $current_value ) . '</span>';

	if ( $is_below_min ) {
		echo '<span class="w-min"> (' . esc_html__( 'min:', 'ecademy' ) . ' ' . esc_html( $min_value . $unit ) . ')</span>';
	}

	echo '</div>';
}

?>

<div class="wrap about-wrap et-admin-wrap">
	<?php ecademy_admin_navigation_tabs( 'dashboard' ); ?>
	<div id="ecademy-dashboard" class="wrap about-wrap">
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-4">
					<div class="w-box">
						<div class="w-box-head">
							<?php esc_html_e( '👨🏻‍💻 Theme Documentation', 'ecademy' ); ?>
						</div>
						<div class="w-box-content">
							<p><?php esc_html_e( 'If you want to explore the full potential of our theme, this is the perfect place for you. It offers a comprehensive repository of information covering various aspects of its features and functionality.', 'ecademy' ); ?></p>
							<div class="w-button-link">
								<a href="https://docs.envytheme.com/envydoc/ecademy-theme-documentation/" target="_blank" rel="noopener noreferrer">
									<i class="wp-menu-image dashicons-before dashicons-admin-links"></i>
									<?php esc_html_e( 'Documentation', 'ecademy' ); ?>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="w-col-sm-4">
					<div class="w-box">
						<div class="w-box-head">
							<?php esc_html_e( '🚀 24/7 Support', 'ecademy' ); ?>
						</div>
						<div class="w-box-content">
							<p><?php esc_html_e( 'If you encounter any issues, please submit a ticket through our support system. Our dedicated support team is highly enthusiastic and committed to resolving your concerns as quickly as possible—just give them the opportunity.', 'ecademy' ); ?></p>
							<div class="w-button-link">
								<a href="<?php echo esc_url( 'https://support.envytheme.com/' ); ?>" target="_blank" rel="noopener noreferrer">
									<i class="wp-menu-image dashicons-before dashicons-tag"></i> <?php esc_html_e( 'Submit A Ticket', 'ecademy' ); ?>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="w-col-sm-4">
					<div class="w-box">
						<div class="w-box-head">
							<?php esc_html_e( '⚙️ System Status', 'ecademy' ); ?>
						</div>
						<div class="w-box-content">
							<?php
							foreach ( $server_settings as $label => $values ) {
								ecademy_display_system_info( $label, $values[0], $values[1], $values[2] );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> <!-- end wrap -->
