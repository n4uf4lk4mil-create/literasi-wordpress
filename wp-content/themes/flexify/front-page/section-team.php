<div class="front_page_section front_page_section_team<?php
	$flexify_scheme = flexify_get_theme_option( 'front_page_team_scheme' );
	if ( ! empty( $flexify_scheme ) && ! flexify_is_inherit( $flexify_scheme ) ) {
		echo ' scheme_' . esc_attr( $flexify_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( flexify_get_theme_option( 'front_page_team_paddings' ) );
	if ( flexify_get_theme_option( 'front_page_team_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$flexify_css      = '';
		$flexify_bg_image = flexify_get_theme_option( 'front_page_team_bg_image' );
		if ( ! empty( $flexify_bg_image ) ) {
			$flexify_css .= 'background-image: url(' . esc_url( flexify_get_attachment_url( $flexify_bg_image ) ) . ');';
		}
		if ( ! empty( $flexify_css ) ) {
			echo ' style="' . esc_attr( $flexify_css ) . '"';
		}
		?>
>
<?php
	// Add anchor
	$flexify_anchor_icon = flexify_get_theme_option( 'front_page_team_anchor_icon' );
	$flexify_anchor_text = flexify_get_theme_option( 'front_page_team_anchor_text' );
if ( ( ! empty( $flexify_anchor_icon ) || ! empty( $flexify_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_team"'
									. ( ! empty( $flexify_anchor_icon ) ? ' icon="' . esc_attr( $flexify_anchor_icon ) . '"' : '' )
									. ( ! empty( $flexify_anchor_text ) ? ' title="' . esc_attr( $flexify_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_team_inner
	<?php
	if ( flexify_get_theme_option( 'front_page_team_fullheight' ) ) {
		echo ' flexify-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$flexify_css      = '';
			$flexify_bg_mask  = flexify_get_theme_option( 'front_page_team_bg_mask' );
			$flexify_bg_color_type = flexify_get_theme_option( 'front_page_team_bg_color_type' );
			if ( 'custom' == $flexify_bg_color_type ) {
				$flexify_bg_color = flexify_get_theme_option( 'front_page_team_bg_color' );
			} elseif ( 'scheme_bg_color' == $flexify_bg_color_type ) {
				$flexify_bg_color = flexify_get_scheme_color( 'bg_color', $flexify_scheme );
			} else {
				$flexify_bg_color = '';
			}
			if ( ! empty( $flexify_bg_color ) && $flexify_bg_mask > 0 ) {
				$flexify_css .= 'background-color: ' . esc_attr(
					1 == $flexify_bg_mask ? $flexify_bg_color : flexify_hex2rgba( $flexify_bg_color, $flexify_bg_mask )
				) . ';';
			}
			if ( ! empty( $flexify_css ) ) {
				echo ' style="' . esc_attr( $flexify_css ) . '"';
			}
			?>
	>
		<div class="front_page_section_content_wrap front_page_section_team_content_wrap flexify_content_wrap">
			<?php
			// Caption
			$flexify_caption = flexify_get_theme_option( 'front_page_team_caption' );
			if ( ! empty( $flexify_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_team_caption front_page_block_<?php echo ! empty( $flexify_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $flexify_caption, 'flexify_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$flexify_description = flexify_get_theme_option( 'front_page_team_description' );
			if ( ! empty( $flexify_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_team_description front_page_block_<?php echo ! empty( $flexify_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $flexify_description ), 'flexify_kses_content' ); ?></div>
				<?php
			}

			// Content (widgets)
			?>
			<div class="front_page_section_output front_page_section_team_output">
				<?php
				if ( is_active_sidebar( 'front_page_team_widgets' ) ) {
					dynamic_sidebar( 'front_page_team_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! flexify_exists_trx_addons() ) {
						flexify_customizer_need_trx_addons_message();
					} else {
						flexify_customizer_need_widgets_message( 'front_page_team_caption', 'ThemeREX Addons - Team' );
					}
				}
				?>
			</div>
		</div>
	</div>
</div>
