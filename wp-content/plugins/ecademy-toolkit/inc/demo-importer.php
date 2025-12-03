<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function ecademy_data_loss_warning($links) {
    $html  = '<div style="margin-top:20px;color:#856404;font-size:18px;line-height:1.3;font-weight:600;margin-bottom:40px;background-color: #ffeeba;padding:10px 10px;border-radius: 10px;">';
    $html .= __('All of your existing data will be erased if you install/import One Click demo data from here, so we recommend importing demo data only for a new website.', 'ecademy-toolkit');
    $html .= '</div>';
    return $html;
}        
add_filter('rt_demo_installer_warning', 'ecademy_data_loss_warning');

// Initializing online demo contents
function _filter_ecademy_fw_ext_backups_demos( $demos ) {
	$demos_array			 = array(
		'learnpress-demo'	=> array(
			'title'			 => esc_html__( 'LearnPress Demo', 'ecademy' ),
			'screenshot'	 => esc_url( get_template_directory_uri() ) . '/assets/img/demos/lp.png',
			'preview_link'	 => esc_url( 'https://themes.envytheme.com/ecademy/' ),
		),
		'tutor-demo'		=> array(
			'title'			 => esc_html__( 'Tutor LMS Demo', 'ecademy' ),
			'screenshot'	 => esc_url( get_template_directory_uri() ) . '/assets/img/demos/tutor.png',
			'preview_link'	 => esc_url( 'https://themes.envytheme.com/ecademy-tutor/' ),
		),
		'learndash-demo'		=> array(
			'title'			 => esc_html__( 'LearnDash Demo', 'ecademy' ),
			'screenshot'	 => esc_url( get_template_directory_uri() ) . '/assets/img/demos/ld.png',
			'preview_link'	 => esc_url( 'https://themes.envytheme.com/ecademy/' ),
		),
	);

	$download_url	 = 'https://themes.envytheme.com/tools/ecademy/';

	foreach ( $demos_array as $id => $data ) {
		$demo			 = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'		 => $download_url,
			'file_id'	 => $id,
		) );
		$demo->set_title( $data[ 'title' ] );
		$demo->set_screenshot( $data[ 'screenshot' ] );
		$demo->set_preview_link( $data[ 'preview_link' ] );
		$demos[ $demo->get_id() ]	 = $demo;
		unset( $demo );
	}
	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', '_filter_ecademy_fw_ext_backups_demos' );