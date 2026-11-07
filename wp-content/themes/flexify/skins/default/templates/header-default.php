<?php
/**
 * The template to display default site header
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

$flexify_header_css   = '';
$flexify_header_image = get_header_image();
$flexify_header_video = flexify_get_header_video();
if ( ! empty( $flexify_header_image ) && flexify_trx_addons_featured_image_override( flexify_is_singular() || flexify_storage_isset( 'blog_archive' ) || is_category() ) ) {
	$flexify_header_image = flexify_get_current_mode_image( $flexify_header_image );
}
?><header class="top_panel top_panel_default
	<?php
	echo ! empty( $flexify_header_image ) || ! empty( $flexify_header_video ) ? ' with_bg_image' : ' without_bg_image';
	if ( '' != $flexify_header_video ) {
		echo ' with_bg_video';
	}
	if ( '' != $flexify_header_image ) {
		echo ' ' . esc_attr( flexify_add_inline_css_class( 'background-image: url(' . esc_url( $flexify_header_image ) . ');' ) );
	}
	if ( flexify_is_singular() && has_post_thumbnail() ) {
		echo ' with_featured_image';
	}
	?>
">
	<?php

	// Background video
	if ( ! empty( $flexify_header_video ) ) {
		get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/header-video' ) );
	}

	// Main menu
	get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/header-navi' ) );

	// Page title and breadcrumbs area
	if ( ! flexify_is_single() ) {
		get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/header-title' ) );
	}
	?>
</header>
