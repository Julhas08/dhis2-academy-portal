<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tucana_register', 'jbrsoft_my_theme_register_required_plugins' );

function jbrsoft_my_theme_register_required_plugins() {

	$plugins = array(
		array(
			'name'               => 'Theme Plugin',
			'slug'               => 'Theme Plugin',
			'source'             => get_stylesheet_directory() . '/plugin/demo-data.zip', 
			'required'           => true, 
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false, 
			'external_url'       => '',
			'is_callable'        => '', 
		),
		
		array(
			'name'               => 'WooCommerce', 
			'slug'               => 'WooCommerce', 
			'source'             => get_stylesheet_directory() . '/plugin/woocommerce.zip', 
			'required'           => true,
			'version'            => '',
			'force_activation'   => false, 
			'force_deactivation' => false, 
			'external_url'       => '', 
			'is_callable'        => '', 
		),
	);
	

	$config = array(
		'id'           => 'tucana',                 
		'default_path' => '',                    
		'menu'         => 'tucana-install-plugins', 
		'parent_slug'  => 'themes.php',         
		'capability'   => 'edit_theme_options',   
		'has_notices'  => true,                 
		'dismissable'  => true,              
		'dismiss_msg'  => '', 
		'is_automatic' => false,
		'message'      => '',  
	);
	tucana( $plugins, $config );  
}