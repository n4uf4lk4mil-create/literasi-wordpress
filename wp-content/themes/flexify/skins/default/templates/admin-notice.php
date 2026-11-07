<?php
/**
 * The template to display Admin notices
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.1
 */

$flexify_theme_slug = get_template();
$flexify_theme_obj  = wp_get_theme( $flexify_theme_slug );
?>
<div class="flexify_admin_notice flexify_welcome_notice notice notice-info is-dismissible" data-notice="admin">
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
		<?php
		echo esc_html(
			sprintf(
				// Translators: Add theme name and version to the 'Welcome' message
				__( 'Welcome to %1$s v.%2$s', 'flexify' ),
				$flexify_theme_obj->get( 'Name' ) . ( FLEXIFY_THEME_FREE ? ' ' . __( 'Free', 'flexify' ) : '' ),
				$flexify_theme_obj->get( 'Version' )
			)
		);
		?>
	</h3>
	<?php

	// Description
	?>
	<div class="flexify_notice_text">
		<p class="flexify_notice_text_description">
			<?php
			echo str_replace( '. ', '.<br>', wp_kses_data( $flexify_theme_obj->description ) );
			?>
		</p>
		<p class="flexify_notice_text_info">
			<?php
			echo wp_kses_data( __( 'Unlock unlimited possibilities for building your website with a modern page builder, AI support and many other features - upgrade to the PRO version of the theme.', 'flexify' ) );
			?>
		</p>
	</div>
	<?php

	// Buttons
	?>
	<div class="flexify_notice_buttons">
		<?php
		// Link to the page 'About Theme'
		?>
		<a href="<?php echo esc_url( admin_url() . 'themes.php?page=flexify_about' ); ?>" class="button button-primary"><i class="dashicons dashicons-nametag"></i> 
			<?php
			echo esc_html__( 'Compare PRO vs Free', 'flexify' );
			?>
		</a>
		<?php
		flexify_pro_add_button( 'general' );
		?>
	</div>
</div>
