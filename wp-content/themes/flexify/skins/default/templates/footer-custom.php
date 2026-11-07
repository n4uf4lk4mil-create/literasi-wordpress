<?php
/**
 * The template to display default site footer
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.10
 */

$flexify_footer_id = flexify_get_custom_footer_id();
$flexify_footer_meta = flexify_get_custom_layout_meta( $flexify_footer_id );
if ( ! empty( $flexify_footer_meta['margin'] ) ) {
	flexify_add_inline_css( sprintf( '.page_content_wrap{padding-bottom:%s}', esc_attr( flexify_prepare_css_value( $flexify_footer_meta['margin'] ) ) ) );
}
?>
<footer class="footer_wrap footer_custom footer_custom_<?php echo esc_attr( $flexify_footer_id ); ?> footer_custom_<?php echo esc_attr( sanitize_title( get_the_title( $flexify_footer_id ) ) ); ?>">
	<?php
	// Custom footer's layout
	do_action( 'flexify_action_show_layout', $flexify_footer_id );
	?>
</footer>