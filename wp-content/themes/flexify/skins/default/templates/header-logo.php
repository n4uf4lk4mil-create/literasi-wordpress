<?php
/**
 * The template to display the logo or the site name and the slogan in the Header
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

$flexify_args = get_query_var( 'flexify_logo_args' );

// Site logo
$flexify_logo_type   = isset( $flexify_args['type'] ) ? $flexify_args['type'] : '';
$flexify_logo_image  = flexify_get_logo_image( $flexify_logo_type );
$flexify_logo_text   = flexify_is_on( flexify_get_theme_option( 'logo_text' ) ) ? get_bloginfo( 'name' ) : '';
$flexify_logo_slogan = get_bloginfo( 'description', 'display' );
if ( ! empty( $flexify_logo_image['logo'] ) || ! empty( $flexify_logo_text ) ) {
	?><a class="sc_layouts_logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
		<?php
		if ( ! empty( $flexify_logo_image['logo'] ) ) {
			if ( empty( $flexify_logo_type ) && function_exists( 'the_custom_logo' ) && is_numeric( $flexify_logo_image['logo'] ) && (int) $flexify_logo_image['logo'] > 0 ) {
				the_custom_logo();
			} else {
				$flexify_attr = flexify_getimagesize( $flexify_logo_image['logo'] );
				echo '<img src="' . esc_url( $flexify_logo_image['logo'] ) . '"'
						. ( ! empty( $flexify_logo_image['logo_retina'] ) ? ' srcset="' . esc_url( $flexify_logo_image['logo_retina'] ) . ' 2x"' : '' )
						. ' alt="' . esc_attr( $flexify_logo_text ) . '"'
						. ( ! empty( $flexify_attr[3] ) ? ' ' . wp_kses_data( $flexify_attr[3] ) : '' )
						. '>';
			}
		} else {
			flexify_show_layout( flexify_prepare_macros( $flexify_logo_text ), '<span class="logo_text">', '</span>' );
			flexify_show_layout( flexify_prepare_macros( $flexify_logo_slogan ), '<span class="logo_slogan">', '</span>' );
		}
		?>
	</a>
	<?php
}
