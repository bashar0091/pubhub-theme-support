<?php
/**
 * Plugin Name: Theme support for pubhub
 * Plugin URI: 
 * Description: 
 * Version: 1.0.0
 * Author: Dev Bucks
 * Author URI: 
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: pubhub
 */


// Prevent direct access to the plugin file
defined( 'ABSPATH' ) || exit;



/**
 * 
 * Register All theme widgets
 * 
 */
function register_all_theme_widget( $widgets_manager ) {

	require_once( __DIR__ . '/elementor-widgets/theme-header-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-footer-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-cta-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-work-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-instagram-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-award-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-service-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-process-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-approach-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-brand-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-banner-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-team-widget.php' );
	require_once( __DIR__ . '/elementor-widgets/theme-contact-widget.php' );

	$widgets_manager->register( new \Theme_Header_Widget() );
	$widgets_manager->register( new \Theme_Footer_Widget() );
	$widgets_manager->register( new \Theme_Cta_Widget() );
	$widgets_manager->register( new \Theme_Work_Widget() );
	$widgets_manager->register( new \Theme_Instagram_Widget() );
	$widgets_manager->register( new \Theme_Award_Widget() );
	$widgets_manager->register( new \Theme_Service_Widget() );
	$widgets_manager->register( new \Theme_Process_Widget() );
	$widgets_manager->register( new \Theme_Approach_Widget() );
	$widgets_manager->register( new \Theme_Brand_Widget() );
	$widgets_manager->register( new \Theme_Banner_Widget() );
	$widgets_manager->register( new \Theme_Team_Widget() );
	$widgets_manager->register( new \Theme_Contact_Widget() );

}
add_action( 'elementor/widgets/register', 'register_all_theme_widget' );



/**
 * 
 * Register New Widget Category
 * 
 */
function new_elementor_widget_categories( $elements_manager ) {

	$elements_manager->add_category(
		'theme-widget-category',
		[
			'title' => esc_html__( 'Theme Widgets', 'pubhub' ),
			'icon' => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'new_elementor_widget_categories' );