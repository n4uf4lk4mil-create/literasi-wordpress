<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Reset notice on parent/child theme activation
 */
function thryve_creative_reset_pro_notice_on_theme_activation() {
	delete_user_meta( get_current_user_id(), 'thryve_creative_pro_notice_dismissed' );
}
add_action( 'after_switch_theme', 'thryve_creative_reset_pro_notice_on_theme_activation' );


/**
 * Show Admin Notice
 */
function thryve_creative_pro_admin_notice() {

	// Only admins
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	// Prevent notice from breaking Theme Info page UI
	if ( function_exists( 'get_current_screen' ) ) {
		$screen = get_current_screen();
		if ( isset( $screen->id ) && 'appearance_page_enterprise-one-info' === $screen->id ) {
			return;
		}
	}

	// Show only for Thryve Biz parent theme or any child theme
	$theme = wp_get_theme();

	if ( 'thryve-creative' !== $theme->get_template() ) {
		return;
	}

	// Don't show if dismissed
	$dismissed = get_user_meta(
		get_current_user_id(),
		'thryve_creative_pro_notice_dismissed',
		true
	);

	if ( $dismissed ) {
		return;
	}

	$pro_url = 'https://thryvewp.com/thryve-creative-pro';
	$doc_url = 'https://thryvewp.com/documentation/';
	?>

	<div class="notice notice-info is-dismissible thryve-creative-pro-notice">
		<h1>
			<strong><?php esc_html_e( 'Upgrade to Thryve Creative Pro!', 'thryve-creative' ); ?></strong>
		</h1>

		<p>
			<?php
			esc_html_e(
				'🚀 Unlock advanced features, premium blocks, enhanced customization options, priority support, and performance optimizations designed for professional business websites. Thryve Creative Pro helps you build faster, more flexible, and scalable websites with a premium design experience.',
				'thryve-creative'
			);
			?>
		</p>

		<p>
			<a href="<?php echo esc_url( $pro_url ); ?>" target="_blank" class="button button-primary">
				<?php esc_html_e( 'Upgrade to Pro', 'thryve-creative' ); ?>
			</a>

			<a href="<?php echo esc_url( $doc_url ); ?>" target="_blank" class="button button-secondary">
				<?php esc_html_e( 'Documentation', 'thryve-creative' ); ?>
			</a>
		</p>
	</div>

	<script>
	jQuery(function($){
		$(document).on('click', '.thryve-creative-pro-notice .notice-dismiss', function () {
			$.post(ajaxurl, {
				action: 'thryve_creative_dismiss_pro_notice'
			});
		});
	});
	</script>

	<?php
}
add_action( 'admin_notices', 'thryve_creative_pro_admin_notice' );


/**
 * Handle notice dismissal
 */
function thryve_creative_dismiss_pro_notice() {
	update_user_meta(
		get_current_user_id(),
		'thryve_creative_pro_notice_dismissed',
		1
	);

	wp_die();
}
add_action( 'wp_ajax_thryve_creative_dismiss_pro_notice', 'thryve_creative_dismiss_pro_notice' );