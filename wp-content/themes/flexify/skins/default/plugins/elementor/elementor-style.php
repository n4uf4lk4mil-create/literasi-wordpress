<?php
// Add theme-specific CSS-animations
if ( ! function_exists( 'flexify_elm_add_theme_animations' ) ) {
	add_filter( 'elementor/controls/animations/additional_animations', 'flexify_elm_add_theme_animations' );
	function flexify_elm_add_theme_animations( $animations ) {
		/* To add a theme-specific animations to the list:
			1) Merge to the array 'animations': array(
													esc_html__( 'Theme Specific', 'flexify' ) => array(
														'ta_custom_1' => esc_html__( 'Custom 1', 'flexify' )
													)
												)
			2) Add a CSS rules for the class '.ta_custom_1' to create a custom entrance animation
		*/
		$animations = array_merge(
						$animations,
						array(
							esc_html__( 'Theme Specific', 'flexify' ) => array(
																			'ta_fadeinup' 		=> esc_html__( 'Fade In Up (Short)', 'flexify' ),
																			'ta_fadeinright'	=> esc_html__( 'Fade In Right (Short)', 'flexify' ),
																			'ta_fadeinleft'		=> esc_html__( 'Fade In Left (Short)', 'flexify' ),
																			'ta_fadeindown'		=> esc_html__( 'Fade In Down (Short)', 'flexify' ),
																			'ta_fadein' 		=> esc_html__( 'Fade In (Short)', 'flexify' ),
																			'ta_popup' 			=> esc_html__( 'Pop Up', 'flexify' ),
																			'ta_infiniterotate' => esc_html__( 'Infinite Rotate', 'flexify' ),
																			)
							)
						);
		return $animations;
	}
}
