<?php
/**
 * Information about this theme
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.30
 */

if ( ! function_exists( 'flexify_about_add_menu_items' ) ) {
	add_action( 'admin_menu', 'flexify_about_add_menu_items' );
	/**
	 * Add the item 'About Theme' to the admin menu 'Appearance'.
	 *
	 * @hooked 'admin_menu'
	 */
	function flexify_about_add_menu_items() {
		if ( ! flexify_exists_trx_addons() ) {
			$theme_slug  = get_template();
			$theme_name  = wp_get_theme( $theme_slug )->get( 'Name' ) . ( FLEXIFY_THEME_FREE ? ' ' . esc_html__( 'Free', 'flexify' ) : '' );
			add_theme_page(
				// Translators: Add theme name to the page title
				sprintf( esc_html__( 'About %s', 'flexify' ), $theme_name ),    //page_title
				// Translators: Add theme name to the menu title
				sprintf( esc_html__( 'About %s', 'flexify' ), $theme_name ),    //menu_title
				'manage_options',                                               //capability
				'flexify_about',                                                //menu_slug
				'flexify_about_page_builder'                                    //callback
			);
		}
	}
}

if ( ! function_exists( 'flexify_about_enqueue_scripts' ) ) {
	add_action( 'admin_enqueue_scripts', 'flexify_about_enqueue_scripts' );
	/**
	 * Load a page-specific scripts and styles for the page 'About'
	 *
	 * @hooked 'admin_enqueue_scripts'
	 */
	function flexify_about_enqueue_scripts() {
		$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : false;
		if ( ! empty( $screen->id ) && false !== strpos( $screen->id, '_page_flexify_about' ) ) {
			// Scripts
			if ( ! flexify_exists_trx_addons() && function_exists( 'flexify_plugins_installer_enqueue_scripts' ) ) {
				flexify_plugins_installer_enqueue_scripts();
			}
			// Styles
			$fdir = flexify_get_file_url( 'theme-specific/theme-about/theme-about.css' );
			if ( '' != $fdir ) {
				wp_enqueue_style( 'flexify-about', $fdir, array(), null );
			}
		}
	}
}

if ( ! function_exists( 'flexify_about_page_builder' ) ) {
	/**
	 * Build the page 'About Theme'
	 */
	function flexify_about_page_builder() {
		$theme_slug = get_template();
		$theme      = wp_get_theme( $theme_slug );
		?>
		<div class="flexify_about">
			<?php do_action( 'flexify_action_theme_about_start', $theme ); ?>

			<?php do_action( 'flexify_action_theme_about_before_logo', $theme ); ?>

			<div class="flexify_about_logo">
				<?php
				$logo = flexify_get_file_url( 'theme-specific/theme-about/icon.jpg' );
				if ( empty( $logo ) ) {
					$logo = flexify_get_file_url( 'screenshot.jpg' );
				}
				if ( ! empty( $logo ) ) {
					?>
					<img src="<?php echo esc_url( $logo ); ?>">
					<?php
				}
				?>
			</div>

			<?php do_action( 'flexify_action_theme_about_before_title', $theme ); ?>

			<h1 class="flexify_about_title">
			<?php
				echo esc_html(
					sprintf(
						// Translators: Add theme name and version to the 'Welcome' message
						__( 'Welcome to %1$s %2$s v.%3$s', 'flexify' ),
						$theme->get( 'Name' ),
						FLEXIFY_THEME_FREE ? __( 'Free', 'flexify' ) : '',
						$theme->get( 'Version' )
					)
				);
			?>
			</h1>

			<?php do_action( 'flexify_action_theme_about_before_description', $theme ); ?>

			<div class="flexify_about_description">
			<?php
			do_action( 'trx_addons_action_theme_panel_section_end', 'general', array(
				'theme_plugins' => array(
									'elementor' => 1,
									'woocommerce' => 1,
									'revslider' => 1
									)
			) );
			?>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'flexify_about_page_disable_tgmpa_notice' ) ) {
	add_filter( 'tgmpa_show_admin_notice_capability', 'flexify_about_page_disable_tgmpa_notice' );
	/**
	 * Hide a TGMPA notice on the page 'About Theme'
	 * 
	 * @hooked 'tgmpa_show_admin_notice_capability'
	 *
	 * @param $cap  Capability of the current page.
	 *
	 * @return string  A filtered capability.
	 */
	function flexify_about_page_disable_tgmpa_notice($cap) {
		if ( flexify_get_value_gp( 'page' ) == 'flexify_about' ) {
			$cap = 'unfiltered_upload';
		}
		return $cap;
	}
}
