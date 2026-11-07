<?php
/**
 * Required plugins
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.76.0
 */

// THEME-SUPPORTED PLUGINS
// If plugin not need - remove its settings from next array
//----------------------------------------------------------
if ( ! function_exists( 'flexify_skin_required_plugins' ) ) {
	add_action( 'after_setup_theme', 'flexify_skin_required_plugins', -1 );
	function flexify_skin_required_plugins() {
		$flexify_theme_required_plugins_groups = array(
			'core'          => esc_html__( 'Core', 'flexify' ),
			'page_builders' => esc_html__( 'Page Builders', 'flexify' ),
			'ecommerce'     => esc_html__( 'E-Commerce & Donations', 'flexify' ),
			'socials'       => esc_html__( 'Socials and Communities', 'flexify' ),
			'events'        => esc_html__( 'Events and Appointments', 'flexify' ),
			'content'       => esc_html__( 'Content', 'flexify' ),
			'other'         => esc_html__( 'Other', 'flexify' ),
		);
		$flexify_theme_required_plugins        = array(
			// Core
			'trx_addons'                 => array(
				'title'       => esc_html__( 'ThemeREX Addons', 'flexify' ),
				'description' => esc_html__( "Will allow you to install recommended plugins, demo content, and improve the theme's functionality overall with multiple theme options", 'flexify' ),
				'required'    => true, // Check this plugin in the list on load Theme Dashboard
				'logo'        => 'trx_addons.png',
				'group'       => $flexify_theme_required_plugins_groups['core'],
			),
			// Page Builders
			'elementor'                  => array(
				'title'       => esc_html__( 'Elementor', 'flexify' ),
				'description' => esc_html__( "Is a beautiful PageBuilder, even the free version of which allows you to create great pages using a variety of modules.", 'flexify' ),
				'required'    => false, // Leave this plugin unchecked on load Theme Dashboard
				'logo'        => 'elementor.png',
				'group'       => $flexify_theme_required_plugins_groups['page_builders'],
			),
			'gutenberg'                  => array(
				'title'       => esc_html__( 'Gutenberg', 'flexify' ),
				'description' => esc_html__( "It's a posts editor coming in place of the classic TinyMCE. Can be installed and used in parallel with Elementor", 'flexify' ),
				'required'    => false,
				'install'     => false, // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
				'logo'        => 'gutenberg.png',
				'group'       => $flexify_theme_required_plugins_groups['page_builders'],
			),
			// Content
			'sitepress-multilingual-cms' => array(
				'title'       => esc_html__( 'WPML - Sitepress Multilingual CMS', 'flexify' ),
				'description' => esc_html__( "Allows you to make your website multilingual", 'flexify' ),
				'required'    => false,
				'install'     => false, // Do not offer installation of the plugin in the Theme Dashboard and TGMPA
				'logo'        => 'sitepress-multilingual-cms.png',
				'group'       => $flexify_theme_required_plugins_groups['content'],
			),
			'metform'                    => array(
				'title'       => esc_html__( 'MetForm', 'flexify' ),
				'description' => esc_html__( "Contact Form, Survey, Quiz, & Custom Form Builder for Elementor", 'flexify' ),
				'required'    => false,
				'logo'        => 'metform.png',
				'group'       => $flexify_theme_required_plugins_groups['content'],
			),
			// Other
			'trx_updater'                => array(
				'title'       => esc_html__( 'ThemeREX Updater', 'flexify' ),
				'description' => esc_html__( "Update theme and theme-specific plugins from developer's upgrade server.", 'flexify' ),
				'required'    => false,
				'logo'        => 'trx_updater.png',
				'group'       => $flexify_theme_required_plugins_groups['other'],
			)
		);

		if ( FLEXIFY_THEME_FREE ) {
			unset( $flexify_theme_required_plugins['sitepress-multilingual-cms'] );
			unset( $flexify_theme_required_plugins['trx_updater'] );
		}

		// Add plugins list to the global storage
		flexify_storage_set( 'required_plugins', $flexify_theme_required_plugins );
	}
}
