/* global jQuery, FLEXIFY_STORAGE */

( function() {
	"use strict";

	// Disable a "Title, Description, Link" parameters in out shortcodes
	flexify_add_filter( 'trx_addons_filter_add_title_param', function( allow, sc ) {
		return false;
	} );

} )();