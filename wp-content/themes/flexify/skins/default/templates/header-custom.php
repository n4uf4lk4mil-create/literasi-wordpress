<?php
/**
 * The template to display custom header from the ThemeREX Addons Layouts
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.06
 */

$flexify_header_css   = '';
$flexify_header_image = get_header_image();
if ( ! empty( $flexify_header_image ) && flexify_trx_addons_featured_image_override( flexify_is_singular() || flexify_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$flexify_header_image = flexify_get_current_mode_image( $flexify_header_image );
}

$flexify_header_id = flexify_get_custom_header_id();
$flexify_header_meta = flexify_get_custom_layout_meta( $flexify_header_id );
if ( ! empty( $flexify_header_meta['margin'] ) ) {
	flexify_add_inline_css( sprintf( '.page_content_wrap{padding-top:%s}', esc_attr( flexify_prepare_css_value( $flexify_header_meta['margin'] ) ) ) );
	flexify_storage_set( 'custom_header_margin', flexify_prepare_css_value( $flexify_header_meta['margin'] ) );
}

?><header class="top_panel top_panel_custom top_panel_custom_<?php echo esc_attr( $flexify_header_id ); ?> top_panel_custom_<?php echo esc_attr( sanitize_title( get_the_title( $flexify_header_id ) ) ); ?>
				<?php
				echo ! empty( $flexify_header_image )
					? ' with_bg_image'
					: ' without_bg_image';
				if ( '' != $flexify_header_image ) {
					echo ' ' . esc_attr( flexify_add_inline_css_class( 'background-image: url(' . esc_url( $flexify_header_image ) . ');' ) );
				}
				if ( flexify_is_single() && has_post_thumbnail() ) {
					echo ' with_featured_image';
				}
				?>
">
	<?php

	// Custom header's layout
	do_action( 'flexify_action_show_layout', $flexify_header_id );

	?>
</header>
