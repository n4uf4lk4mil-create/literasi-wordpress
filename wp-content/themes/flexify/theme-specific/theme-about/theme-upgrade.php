<?php
/**
 * Upgrade theme to the PRO version
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.41
 */


// Add buttons, tabs and form to the 'Theme panel' screen
//--------------------------------------------------------------------

if ( ! function_exists( 'flexify_pro_add_section_to_about' ) ) {
	add_action( 'trx_addons_action_theme_panel_section_end', 'flexify_pro_add_section_to_about', 10, 2 );
	/**
	 * Add a table 'Free vs PRO' to the section 'General' of the 'Theme panel'
	 * if a current theme is free (with limited functionality).
	 *
	 * @hooked 'trx_addons_action_theme_panel_section_end'
	 *
	 * @param string $tab_id     A current tab ID of 'Theme panel'
	 * @param array $theme_info  A current theme info.
	 */
	function flexify_pro_add_section_to_about( $tab_id, $theme_info ) {
		if ( 'general' !== $tab_id || ! FLEXIFY_THEME_FREE ) {
			return;
		}
		?>
		<div class="flexify_theme_panel_table_free_vs_pro">
			<div class="flexify_theme_panel_table_row flexify_theme_panel_table_head">
				<div class="flexify_theme_panel_table_info">
					&nbsp;
				</div>
				<div class="flexify_theme_panel_table_check">
					<?php esc_html_e( 'Free version', 'flexify' ); ?>
				</div>
				<div class="flexify_theme_panel_table_check">
					<?php esc_html_e( 'PRO version', 'flexify' ); ?>
				</div>
			</div>
			<div class="flexify_theme_panel_table_row">
				<div class="flexify_theme_panel_table_info">
					<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'Mobile friendly', 'flexify' ); ?>
					</h2>
					<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( 'Responsive layout. Looks great on any device.', 'flexify' ); ?>
					</div>
				</div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
			</div>
			<div class="flexify_theme_panel_table_row">
				<div class="flexify_theme_panel_table_info">
					<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'Built-in posts slider', 'flexify' ); ?>
					</h2>
					<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( 'Allows you to add beautiful slides using the built-in shortcode/widget "Slider" with swipe gestures support.', 'flexify' ); ?>
					</div>
				</div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
			</div>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'Headers and Footers builder', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( 'Powerful visual builder of headers and footers! No manual code editing - use all the advantages of drag-and-drop technology.', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<?php
			// Elementor
			if ( isset( $theme_info['theme_plugins']['elementor'] ) ) {
				?>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'Elementor (free PageBuilder)', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'Full integration with a powerful page builder "Elementor".', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'Elementor Templates Library', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'A unique library of 500+ templates, including both individual blocks and ready-made pages.', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<?php
			}
			// WPBakery PageBuilder
			if ( isset( $theme_info['theme_plugins']['js_composer'] ) ) {
				?>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'WPBakery PageBuilder', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'Full integration with a very popular page builder "WPBakery PageBuilder". A number of useful shortcodes and widgets to create beautiful homepages and other sections of your website.', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'Additional shortcodes pack', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'A number of useful shortcodes to create beautiful homepages and other sections of your website with WPBakery PageBuilder.', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<?php
			}
			// Many skins support
			?>
			<div class="flexify_theme_panel_table_row">
				<div class="flexify_theme_panel_table_info">
					<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'Ready-made demo websites', 'flexify' ); ?>
					</h2>
					<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( '200+ ready-made demo websites on a wide variety of topics, new demos added every week, and 1-click demo installation.', 'flexify' ); ?>
					</div>
				</div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
			</div>
			<?php
			// WooCommerce
			if ( isset( $theme_info['theme_plugins']['woocommerce'] ) ) {
				?>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'WooCommerce Compatibility', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'Ready for e-commerce. You can build an online store with this theme.', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<?php
			}
			// Easy Digital Downloads
			if ( isset( $theme_info['theme_plugins']['easy-digital-downloads'] ) ) {
				?>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'Easy Digital Downloads Compatibility', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'Ready for digital e-commerce. You can build an online digital store with this theme.', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<?php
			}
			// Revolution slider
			if ( isset( $theme_info['theme_plugins']['revslider'] ) ) {
				?>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info">
						<h2 class="flexify_theme_panel_table_info_title">
							<?php esc_html_e( 'Revolution Slider Compatibility', 'flexify' ); ?>
						</h2>
						<div class="flexify_theme_panel_table_info_description">
							<?php esc_html_e( 'Our built-in shortcode/widget "Slider" is able to work not only with posts, but also with slides created  in "Revolution Slider".', 'flexify' ); ?>
						</div>
					</div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
					<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
				</div>
				<?php
			}
			// Other plugins compatibility
			?>
			<div class="flexify_theme_panel_table_row">
				<div class="flexify_theme_panel_table_info">
					<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'Many other popular plugins compatibility', 'flexify' ); ?>
					</h2>
					<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( 'The PRO version is tested with and has built-in support for WooCommerce, The Events Calendar, Give, LearnPress, Tutor LMS, SportsPress, MetForm, WPML and other popular plugins.', 'flexify' ); ?>
					</div>
				</div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
			</div>
			<?php
			// Support
			?>
			<div class="flexify_theme_panel_table_row">
				<div class="flexify_theme_panel_table_info">
					<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'AI integration', 'flexify' ); ?>
					</h2>
					<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( 'AI-assisted text and image generation built into the theme toolkit.', 'flexify' ); ?>
					</div>
				</div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
			</div>
			<div class="flexify_theme_panel_table_row">
				<div class="flexify_theme_panel_table_info">
					<h2 class="flexify_theme_panel_table_info_title">
						<?php esc_html_e( 'Updates and support', 'flexify' ); ?>
					</h2>
					<div class="flexify_theme_panel_table_info_description">
						<?php esc_html_e( 'Free lifetime updates, and premium support that takes care of any problems - in case there are any, of course.', 'flexify' ); ?>
					</div>
				</div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-no"></i></div>
				<div class="flexify_theme_panel_table_check"><i class="dashicons dashicons-yes"></i></div>
			</div>
			<?php
			// Get PRO version button
			if ( current_user_can( 'manage_options' ) ) {
				?>
				<div class="flexify_theme_panel_table_row">
					<div class="flexify_theme_panel_table_info"></div>
					<div class="flexify_theme_panel_table_check"></div>
					<div class="flexify_theme_panel_table_check">
						<a href="<?php echo esc_url( flexify_storage_get( 'theme_download_url' ) ); ?>" role="button"<?php echo flexify_external_links_target( true ); ?> class="flexify_pro_link button button-action button-primary">
							<i class="dashicons dashicons-superhero"></i>
							<?php esc_html_e( 'Get PRO version', 'flexify' ); ?>
						</a>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'flexify_pro_add_button' ) ) {
	remove_action('trx_addons_action_theme_panel_activation_form', 'trx_addons_theme_panel_activation_form');
	add_action( 'trx_addons_action_theme_panel_activation_form', 'flexify_pro_add_button', 10, 2 );
	/**
	 * Add the button 'Get PRO Version' to the 'About theme' screen
	 * if a current theme is free (with limited functionality).
	 *
	 * @hooked 'trx_addons_action_theme_panel_activation_form'
	 *
	 * @param string $tab_id     A current tab ID of 'Theme panel'
	 * @param array $theme_info  A current theme info.
	 */
	function flexify_pro_add_button( $tab_id, $theme_info = array() ) {
		if ( 'general' !== $tab_id || ! current_user_can( 'manage_options' ) || ! FLEXIFY_THEME_FREE ) {
			return;
		}
		?>
		<a href="<?php echo esc_url( flexify_storage_get( 'theme_download_url' ) ); ?>" role="button"<?php echo flexify_external_links_target( true ); ?> class="flexify_pro_link button button-action button-primary">
			<i class="dashicons dashicons-superhero"></i>
			<?php esc_html_e( 'Get PRO version', 'flexify' ); ?>
		</a>
		<?php
	}
}

if ( ! function_exists( 'flexify_pro_add_form' ) ) {
	add_action( 'trx_addons_action_theme_panel_activation_form', 'flexify_pro_add_form', 12, 2 );
	/**
	 * Display an upgrade form on the tab 'General' of the 'Theme panel'
	 * if a current theme is free (with limited functionality).
	 *
	 * @hooked 'trx_addons_action_theme_panel_activation_form', 12
	 *
	 * @param string $tab_id     A current tab ID of 'Theme panel'
	 * @param array $theme_info  A current theme info.
	 */
	function flexify_pro_add_form( $tab_id, $theme_info ) {
		if ( 'general' !== $tab_id || ! current_user_can( 'manage_options' ) || ! FLEXIFY_THEME_FREE ) {
			return;
		}
		?>
		<div class="flexify_pro_form_wrap">
			<p>Get access to:</p>
			<ol>
				<li>Elementor 500+ Templates Library</li>
				<li>50+ ready-made websites</li>
				<li>Full WooCommerce Compatibility</li>
				<li>Many other popular plugins</li>
				<li>Premium Support from the author</li>
			</ol>
			<p><?php
				flexify_pro_add_button( 'general' );
			?></p>
		</div>
		<?php
	}
}


// Create a control for 'Theme Options'
//--------------------------------------------------------------------

if ( ! function_exists( 'flexify_pro_get_custom_field' ) ) {
	add_filter( 'flexify_filter_get_custom_field', 'flexify_pro_get_custom_field', 10, 5 );
	/**
	 * Create a control with an upgrade form for 'Theme Options'
	 * if a current theme is free (with limited functionality).
	 *
	 * @hooked 'flexify_filter_get_custom_field'
	 *
	 * @param string $output       A layout of the current field layout. Replace it with a form if a field name is 'get_pro_version'.
	 * @param string $name         A name of the current field.
	 * @param array $field         An array with a field parameters.
	 * @param bool $inherit_allow  If true - add to the layout a 'inherit' mask
	 * @param bool $inherit_state  If true - a value of the current field is 'inherit'
	 *
	 * @return string              A new layout of the field
	 */
	function flexify_pro_get_custom_field( $output, $name, $field, $inherit_allow, $inherit_state ) {
		if ( FLEXIFY_THEME_FREE && 'get_pro_version' == $field['type'] ) {
			ob_start();
			$theme_slug  = get_template();
			$theme       = wp_get_theme( $theme_slug );
			flexify_pro_add_form( 'general', array(
				'theme_name'    => $theme->get( 'Name' ),
				'theme_version' => $theme->get( 'Version' ),
				)
			);
			$output .= ob_get_contents();
			ob_end_clean();
		}
		return $output;
	}
}


// Create control for Customizer
//--------------------------------------------------------------------

if ( ! function_exists( 'flexify_pro_theme_setup3' ) ) {
	add_action( 'after_setup_theme', 'flexify_pro_theme_setup3', 3 );
	/**
	 * Add a new section to the Theme options with a control 'Get PRO version'
	 * if a current theme is free (with limited functionality).
	 *
	 * @hooked 'after_setup_theme', 3 (add/remove Theme Options elements)
	 */
	function flexify_pro_theme_setup3() {

		if ( ! FLEXIFY_THEME_FREE ) {
			return;
		}

		// Add section "Get PRO Version" if current theme is free
		// ------------------------------------------------------
		flexify_storage_set_array_before(
			'options', 'title_tagline', array(
				'pro_section' => array(
					'title'    => esc_html__( 'Get PRO Version', 'flexify' ),
					'desc'     => '',
					'priority' => 5,
					'type'     => 'section',
				),
				'pro_version' => array(
					'title'   => esc_html__( 'Upgrade to the PRO Version', 'flexify' ),
					'desc'    => '',
					'std'     => '',
					'refresh' => false,
					'type'    => 'get_pro_version',
				),
			)
		);
	}
}

if ( ! function_exists( 'flexify_pro_customizer_custom_controls' ) ) {
	add_action( 'customize_register', 'flexify_pro_customizer_custom_controls' );
	/**
	 * Define a custom control class for the Customizer
	 * if a current theme is free (with limited functionality).
	 *
	 * @hooked 'customize_register'
	 *
	 * @param object $wp_customize  An object with instance of the class WP_Customize
	 */
	function flexify_pro_customizer_custom_controls( $wp_customize ) {
		class Flexify_Customize_Get_Pro_Version_Control extends Flexify_Customize_Theme_Control {
			public $type = 'get_pro_version';

			public function render_content() {
				$this->start_render_field();
				$this->render_field_title();
				$this->render_field_description();
				?>
				<span class="customize-control-field-wrap">
					<?php
					$theme_slug  = get_template();
					$theme       = wp_get_theme( $theme_slug );
					flexify_pro_add_form( 'general', array(
						'theme_name'    => $theme->get( 'Name' ),
						'theme_version' => $theme->get( 'Version' ),
						)
					);
					?>
				</span>
				<?php
				$this->end_render_field();
			}
		}
	}
}

if ( ! function_exists( 'flexify_pro_customizer_register_controls' ) ) {
	add_filter( 'flexify_filter_register_customizer_control', 'flexify_pro_customizer_register_controls', 10, 7 );
	/**
	 * Register a custom control for the Customizer if a current theme is free (with limited functionality).
	 * 
	 * @hooked 'flexify_filter_register_customizer_control'
	 *
	 * @param bool $result          Operation success flag
	 * @param object $wp_customize  An object with instance of the class WP_Customize
	 * @param string $id            A control ID
	 * @param string $section       A slug of the current section.
	 * @param int $priority         Priority of the control.
	 * @param string $transport     A transport type.
	 * @param array $opt            An array with additional options for the control.
	 *
	 * @return bool                 true if a field created successfull.
	 */
	function flexify_pro_customizer_register_controls( $result, $wp_customize, $id, $section, $priority, $transport, $opt ) {

		if ( 'get_pro_version' == $opt['type'] ) {
			$wp_customize->add_setting(
				$id, array(
					'default'           => flexify_get_theme_option( $id ),
					'sanitize_callback' => ! empty( $opt['sanitize'] )
												? $opt['sanitize']
												: 'wp_kses_post',
					'transport'         => $transport,
				)
			);

			$args = array(
						'label'           => $opt['title'],
						'description'     => $opt['desc'],
						'section'         => esc_attr( $section ),
						'priority'        => $priority,
						'active_callback' => ! empty( $opt['active_callback'] ) ? $opt['active_callback'] : '',
					);

			$wp_customize->add_control( new Flexify_Customize_Get_Pro_Version_Control( $wp_customize, $id, $args ) );

			$result = true;
		}

		return $result;
	}
}
