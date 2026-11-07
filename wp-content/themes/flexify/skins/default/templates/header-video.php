<?php
/**
 * The template to display the background video in the header
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.14
 */
$flexify_header_video = flexify_get_header_video();
$flexify_embed_video  = '';
if ( ! empty( $flexify_header_video ) && ! flexify_is_from_uploads( $flexify_header_video ) ) {
	if ( flexify_is_youtube_url( $flexify_header_video ) && preg_match( '/[=\/]([^=\/]*)$/', $flexify_header_video, $matches ) && ! empty( $matches[1] ) ) {
		?><div id="background_video" data-youtube-code="<?php echo esc_attr( $matches[1] ); ?>"></div>
		<?php
	} else {
		?>
		<div id="background_video"><?php flexify_show_layout( flexify_get_embed_video( $flexify_header_video ) ); ?></div>
		<?php
	}
}