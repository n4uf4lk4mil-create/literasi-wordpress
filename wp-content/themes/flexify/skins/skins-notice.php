<?php
/**
 * The template to display Admin notices
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.64
 */

$flexify_skins_url  = get_admin_url( null, 'admin.php?page=trx_addons_theme_panel#trx_addons_theme_panel_section_skins' );
$flexify_skins_args = get_query_var( 'flexify_skins_notice_args' );
?>
<div class="flexify_admin_notice flexify_skins_notice notice notice-info is-dismissible" data-notice="skins">
	<?php
	// Theme image
	$flexify_theme_img = flexify_get_file_url( 'screenshot.jpg' );
	if ( '' != $flexify_theme_img ) {
		?>
		<div class="flexify_notice_image"><img src="<?php echo esc_url( $flexify_theme_img ); ?>" alt="<?php esc_attr_e( 'Theme screenshot', 'flexify' ); ?>"></div>
		<?php
	}

	// Title
	?>
	<h3 class="flexify_notice_title">
		<?php esc_html_e( 'New skins are available', 'flexify' ); ?>
	</h3>
	<?php

	// Description
	$flexify_total      = $flexify_skins_args['update'];	// Store value to the separate variable to avoid warnings from ThemeCheck plugin!
	$flexify_skins_msg  = $flexify_total > 0
							// Translators: Add new skins number
							? '<strong>' . sprintf( _n( '%d new version', '%d new versions', $flexify_total, 'flexify' ), $flexify_total ) . '</strong>'
							: '';
	$flexify_total      = $flexify_skins_args['free'];
	$flexify_skins_msg .= $flexify_total > 0
							? ( ! empty( $flexify_skins_msg ) ? ' ' . esc_html__( 'and', 'flexify' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d free skin', '%d free skins', $flexify_total, 'flexify' ), $flexify_total ) . '</strong>'
							: '';
	$flexify_total      = $flexify_skins_args['pay'];
	$flexify_skins_msg .= $flexify_skins_args['pay'] > 0
							? ( ! empty( $flexify_skins_msg ) ? ' ' . esc_html__( 'and', 'flexify' ) . ' ' : '' )
								// Translators: Add new skins number
								. '<strong>' . sprintf( _n( '%d paid skin', '%d paid skins', $flexify_total, 'flexify' ), $flexify_total ) . '</strong>'
							: '';
	?>
	<div class="flexify_notice_text">
		<p>
			<?php
			// Translators: Add new skins info
			echo wp_kses_data( sprintf( __( "We are pleased to announce that %s are available for your theme", 'flexify' ), $flexify_skins_msg ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="flexify_notice_buttons">
		<?php
		// Link to the theme dashboard page
		?>
		<a href="<?php echo esc_url( $flexify_skins_url ); ?>" class="button button-primary"><i class="dashicons dashicons-update"></i> 
			<?php
			esc_html_e( 'Go to Skins manager', 'flexify' );
			?>
		</a>
		<?php
		// Dismiss notice for 7 days
		?>
		<a href="#" role="button" class="button button-secondary flexify_notice_button_dismiss" data-notice="skins"><i class="dashicons dashicons-no-alt"></i> 
			<?php
			esc_html_e( 'Dismiss', 'flexify' );
			?>
		</a>
		<?php
		// Hide notice forever
		?>
		<a href="#" role="button" class="button button-secondary flexify_notice_button_hide" data-notice="skins"><i class="dashicons dashicons-no-alt"></i> 
			<?php
			esc_html_e( 'Never show again', 'flexify' );
			?>
		</a>
	</div>
</div>
