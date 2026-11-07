<?php
/**
 * The template to show mobile menu (used only header_style == 'default')
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */
?>
<div class="menu_mobile_overlay"></div>
<div class="menu_mobile menu_mobile_fullscreen">
	<div class="menu_mobile_inner">
		<span class="menu_mobile_close theme_button_close" tabindex="0"><span class="theme_button_close_icon"></span></span>
		<?php
		// Mobile menu
		$flexify_menu_mobile = flexify_get_nav_menu( 'menu_mobile' );
		if ( empty( $flexify_menu_mobile ) ) {
			$flexify_menu_mobile = apply_filters( 'flexify_filter_get_mobile_menu', '' );
			if ( empty( $flexify_menu_mobile ) ) {
				$flexify_menu_mobile = flexify_get_nav_menu( 'menu_main' );
				if ( empty( $flexify_menu_mobile ) ) {
					$flexify_menu_mobile = flexify_get_nav_menu();
				}
			}
		}
		if ( ! empty( $flexify_menu_mobile ) ) {
			// Change attribute 'id' - add prefix 'mobile-' to prevent duplicate id on the page
			$flexify_menu_mobile = preg_replace( '/([\s]*id=")/', '${1}mobile-', $flexify_menu_mobile );
			// Change main menu classes
			$flexify_menu_mobile = str_replace(
				array( 'menu_main',   'sc_layouts_menu_nav', 'sc_layouts_menu ' ),	// , 'sc_layouts_hide_on_mobile', 'hide_on_mobile'
				array( 'menu_mobile', '',                    ' ' ),					// , '',                          ''
				$flexify_menu_mobile
			);
			// Wrap menu to the <nav> if not present
			if ( strpos( $flexify_menu_mobile, '<nav ' ) !== 0 ) {	// condition !== false is not allowed, because menu can contain inner <nav> elements (in the submenu layouts)
				$flexify_menu_mobile = flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) )
					? sprintf( '<nav class="menu_mobile_nav_area" itemscope="itemscope" itemtype="%1$s//schema.org/SiteNavigationElement">%2$s</nav>', esc_attr( flexify_get_protocol( true ) ), $flexify_menu_mobile )
					: sprintf( '<nav class="menu_mobile_nav_area">%s</nav>', $flexify_menu_mobile );
			}
			// Show menu
			flexify_show_layout( apply_filters( 'flexify_filter_menu_mobile_layout', $flexify_menu_mobile ) );
		}
		?>
	</div>
</div>