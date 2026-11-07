<?php
/**
 * Skin Demo importer
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.76.0
 */


// Theme storage
//-------------------------------------------------------------------------

flexify_storage_set( 'theme_demo_url', '//flexify.themerex.net' );


//------------------------------------------------------------------------
// One-click import support
//------------------------------------------------------------------------

// Set theme specific importer options
if ( ! function_exists( 'flexify_skin_importer_set_options' ) ) {
	add_filter( 'trx_addons_filter_importer_options', 'flexify_skin_importer_set_options', 9 );
	function flexify_skin_importer_set_options( $options = array() ) {
		if ( is_array( $options ) ) {
			$demo_type = function_exists( 'flexify_skins_get_current_skin_name' ) ? flexify_skins_get_current_skin_name() : 'default';
			if ( 'default' != $demo_type ) {
				$options['demo_type'] = $demo_type;
				$options['files'][ $demo_type ] = $options['files']['default'];	// Copy all settings from 'default' to the new demo type
				unset($options['files']['default']);
			}
			// Override some settings in the new demo type
			$theme_slug = get_template();
			$theme_name = wp_get_theme( $theme_slug )->get( 'Name' );
			$options['files'][ $demo_type ]['title'] = sprintf( esc_html__( '%s Demo', 'flexify' ), $theme_name )
				. ( $demo_type != 'default'
					? '. ' . sprintf( esc_html__( 'Skin %s', 'flexify' ), ucfirst( str_replace( array( '-', '_' ), ' ', $demo_type ) ) )
					: ''
					);
			$options['files'][ $demo_type ]['domain_dev']  = ''; // Developers domain, example: flexify_add_protocol( '//flexify.dev.themerex.net' ); 
			$options['files'][ $demo_type ]['domain_demo'] = flexify_add_protocol( flexify_storage_get( 'theme_demo_url' ) ); // Demo-site domain
		}
		return $options;
	}
}