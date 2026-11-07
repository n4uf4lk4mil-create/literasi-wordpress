/* global jQuery, FLEXIFY_STORAGE */

jQuery( document ).ready( function() {

	"use strict";

	var busy = false;

	// Switch an active skin
	jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_choose_skin' ).on(
		'click', function(e) {
			if ( ! busy ) {
				var link = jQuery( this );
				trx_addons_msgbox_confirm(
					FLEXIFY_STORAGE['msg_switch_skin'],
					FLEXIFY_STORAGE['msg_switch_skin_caption'],
					function(btn) {
						if ( btn != 1 ) return;
						flexify_skins_action( 'switch', link.data( 'skin' ) );
					}
				);
			}
			e.preventDefault();
			return false;
		}
	);

	// Delete a skin
	jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_delete_skin' ).on(
		'click', function(e) {
			if ( ! busy ) {
				var link = jQuery( this );
				var msgbox = typeof window.trx_addons_msgbox_agree != 'undefined' ? trx_addons_msgbox_agree : trx_addons_msgbox_confirm;
				msgbox(
					FLEXIFY_STORAGE['msg_delete_skin'],
					FLEXIFY_STORAGE['msg_delete_skin_caption'],
					function(btn) {
						if ( btn != 1 ) return;
						flexify_skins_action( 'delete', link.data( 'skin' ), '', link );
					}
				);
			}
			e.preventDefault();
			return false;
		}
	);

	// Download a free skin
	jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_download_skin' ).on(
		'click', function(e) {
			if ( ! busy ) {
				var link = jQuery( this );
				trx_addons_msgbox_confirm(
					FLEXIFY_STORAGE['msg_download_skin'],
					FLEXIFY_STORAGE['msg_download_skin_caption'],
					function(btn) {
						if ( btn != 1 ) return;
						flexify_skins_action( 'download', link.data( 'skin' ), '', link );
					}
				);
			}
			e.preventDefault();
			return false;
		}
	);

	// Download a prepaid skin
	jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_buy_skin' ).on(
		'click', function(e) {
			if ( ! busy ) {
				var link = jQuery( this );
				trx_addons_msgbox_dialog(
					'<p>' + FLEXIFY_STORAGE['msg_buy_skin'].replace('#', link.data('buy')) + '</p>'
					+ '<p><label><input class="flexify_skin_code" type="text" placeholder="' + FLEXIFY_STORAGE['msg_buy_skin_placeholder'] + '"></label></p>',
					FLEXIFY_STORAGE['msg_buy_skin_caption'],
					null,
					function(btn, dialog) {
						if ( btn != 1 ) return;
						flexify_skins_action( 'buy', link.data( 'skin' ), dialog.find('.flexify_skin_code').val(), link );
					}
				);
			}
			e.preventDefault();
			return false;
		}
	);

	// Update skin
	jQuery( '#trx_addons_theme_panel_section_skins a.trx_addons_image_block_link_update_skin' ).on(
		'click', function(e) {
			if ( ! busy ) {
				var link = jQuery( this );
				trx_addons_msgbox_confirm(
					FLEXIFY_STORAGE['msg_update_skin'],
					FLEXIFY_STORAGE['msg_update_skin_caption'],
					function(btn) {
						if ( btn != 1 ) return;
						flexify_skins_action( 'update', link.data( 'skin' ), '', link );
					}
				);
			}
			e.preventDefault();
			return false;
		}
	);

	// Update skins from 'update-core' screen
	var need_update = false,
		errors = 0;
	jQuery( '.flexify_upgrade_skins_button:not([disabled])' ).on(
		'click', function(e) {
			var button = jQuery(this),
				checked = button.parents( '.flexify_upgrade_skins' ).find( 'input[name="checked[]"]:checked' );
			if ( checked.length > 0 ) {
				if ( need_update === false ) {
					need_update = checked.length;
				}
				jQuery( '.flexify_upgrade_skins_button' ).attr( 'disabled', 'disabled' );
				var chk = checked.eq(0);
				if ( ! chk.next().hasClass( 'flexify_upgrade_skins_status_wrap' ) ) {
					chk.hide();
					chk.after( '<div class="flexify_upgrade_skins_status_wrap"><span class="flexify_upgrade_skins_status flexify_upgrade_skins_status_progress"></span></div>' );
				}
				var status = chk.next().find('.flexify_upgrade_skins_status');
				flexify_skins_action( 'update', chk.val(), '', '', function(skin, action, rez) {
					need_update--;
					chk.get(0).checked = false;
					chk.eq(0).removeAttr('checked');
					status
						.removeClass( 'flexify_upgrade_skins_status_progress' )
						.addClass( 'flexify_upgrade_skins_status_' + ( rez.error ? 'error' : 'success' ) );
					if ( rez.error ) {
						errors++;
					}
					jQuery( '.flexify_upgrade_skins_button' ).removeAttr( 'disabled' );
					button.trigger( 'click' );
				} );
			} else {
				if ( need_update === 0 ) {
					jQuery( '.flexify_upgrade_skins' ).after(
						'<div class="trx_addons_info_box trx_addons_info_box">'
							+ ( errors > 0 ? FLEXIFY_STORAGE['msg_update_skins_error'] : FLEXIFY_STORAGE['msg_update_skins_result'] )
						+ '</div>'
					);
					jQuery( '.flexify_upgrade_skins_button' ).removeAttr( 'disabled' );
				}
			}
			e.preventDefault();
			return false;
		}
	);


	// Callback when skin is loaded successful
	function flexify_skins_action( action, skin, code, button, callback ){
		busy = true;
		if ( button ) {
			button.addClass( 'trx_addons_loading' );
		}
		jQuery.post(
			FLEXIFY_STORAGE['ajax_url'], {
				'action': 'flexify_'+action+'_skin',
				'skin': skin,
				'code': code === undefined ? '' : code,
				'nonce': FLEXIFY_STORAGE['ajax_nonce'],
				is_admin_request: 1
			},
			function( response ) {
				if ( button ) {
					button.removeClass( 'trx_addons_loading' );
				}
				var rez = flexify_parse_ajax_response( response );
				if ( callback !== undefined ) {
					callback( skin, action, rez );
				}
				// Show result
				if ( jQuery('.trx_addons_theme_panel').length > 0 ) {
					if ( rez.error ) {
						trx_addons_msgbox_attention( rez.error, FLEXIFY_STORAGE['msg_'+action+'_skin_error_caption'] );
					} else {
						trx_addons_msgbox_success( typeof rez.success != 'undefined' && rez.success ? rez.success : FLEXIFY_STORAGE['msg_'+action+'_skin_success'], FLEXIFY_STORAGE['msg_'+action+'_skin_success_caption'] );
					}
					// Reload current page after the skin is switched (if success)
					if ( rez.error === '' ) {
						if ( ! jQuery('.trx_addons_theme_panel .trx_addons_tabs').hasClass('trx_addons_panel_wizard') ) {
							if ( location.hash != 'trx_addons_theme_panel_section_skins' ) {
								flexify_document_set_location( location.href.split('#')[0] + '#' + 'trx_addons_theme_panel_section_skins' );
							}
						}
						location.reload( true );
					}
				}
				busy = false;
			}
		);
	}

} );
