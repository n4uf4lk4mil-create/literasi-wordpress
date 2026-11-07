<div class="front_page_section front_page_section_googlemap<?php
	$flexify_scheme = flexify_get_theme_option( 'front_page_googlemap_scheme' );
	if ( ! empty( $flexify_scheme ) && ! flexify_is_inherit( $flexify_scheme ) ) {
		echo ' scheme_' . esc_attr( $flexify_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( flexify_get_theme_option( 'front_page_googlemap_paddings' ) );
	if ( flexify_get_theme_option( 'front_page_googlemap_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$flexify_css      = '';
		$flexify_bg_image = flexify_get_theme_option( 'front_page_googlemap_bg_image' );
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
	$flexify_anchor_icon = flexify_get_theme_option( 'front_page_googlemap_anchor_icon' );
	$flexify_anchor_text = flexify_get_theme_option( 'front_page_googlemap_anchor_text' );
if ( ( ! empty( $flexify_anchor_icon ) || ! empty( $flexify_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_googlemap"'
									. ( ! empty( $flexify_anchor_icon ) ? ' icon="' . esc_attr( $flexify_anchor_icon ) . '"' : '' )
									. ( ! empty( $flexify_anchor_text ) ? ' title="' . esc_attr( $flexify_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_googlemap_inner
		<?php
		$flexify_layout = flexify_get_theme_option( 'front_page_googlemap_layout' );
		echo ' front_page_section_layout_' . esc_attr( $flexify_layout );
		if ( flexify_get_theme_option( 'front_page_googlemap_fullheight' ) ) {
			echo ' flexify-full-height sc_layouts_flex sc_layouts_columns_middle';
		}
		?>
		"
			<?php
			$flexify_css      = '';
			$flexify_bg_mask  = flexify_get_theme_option( 'front_page_googlemap_bg_mask' );
			$flexify_bg_color_type = flexify_get_theme_option( 'front_page_googlemap_bg_color_type' );
			if ( 'custom' == $flexify_bg_color_type ) {
				$flexify_bg_color = flexify_get_theme_option( 'front_page_googlemap_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_googlemap_content_wrap
		<?php
		if ( 'fullwidth' != $flexify_layout ) {
			echo ' flexify_content_wrap';
		}
		?>
		">
			<?php
			// Content wrap with title and description
			$flexify_caption     = flexify_get_theme_option( 'front_page_googlemap_caption' );
			$flexify_description = flexify_get_theme_option( 'front_page_googlemap_description' );
			if ( ! empty( $flexify_caption ) || ! empty( $flexify_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'fullwidth' == $flexify_layout ) {
					?>
					<div class="flexify_content_wrap">
					<?php
				}
					// Caption
				if ( ! empty( $flexify_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<h2 class="front_page_section_caption front_page_section_googlemap_caption front_page_block_<?php echo ! empty( $flexify_caption ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( $flexify_caption, 'flexify_kses_content' );
					?>
					</h2>
					<?php
				}

					// Description (text)
				if ( ! empty( $flexify_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					?>
					<div class="front_page_section_description front_page_section_googlemap_description front_page_block_<?php echo ! empty( $flexify_description ) ? 'filled' : 'empty'; ?>">
					<?php
					echo wp_kses( wpautop( $flexify_description ), 'flexify_kses_content' );
					?>
					</div>
					<?php
				}
				if ( 'fullwidth' == $flexify_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Content (text)
			$flexify_content = flexify_get_theme_option( 'front_page_googlemap_content' );
			if ( ! empty( $flexify_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				if ( 'columns' == $flexify_layout ) {
					?>
					<div class="front_page_section_columns front_page_section_googlemap_columns columns_wrap">
						<div class="column-1_3">
					<?php
				} elseif ( 'fullwidth' == $flexify_layout ) {
					?>
					<div class="flexify_content_wrap">
					<?php
				}

				?>
				<div class="front_page_section_content front_page_section_googlemap_content front_page_block_<?php echo ! empty( $flexify_content ) ? 'filled' : 'empty'; ?>">
				<?php
					echo wp_kses( $flexify_content, 'flexify_kses_content' );
				?>
				</div>
				<?php

				if ( 'columns' == $flexify_layout ) {
					?>
					</div><div class="column-2_3">
					<?php
				} elseif ( 'fullwidth' == $flexify_layout ) {
					?>
					</div>
					<?php
				}
			}

			// Widgets output
			?>
			<div class="front_page_section_output front_page_section_googlemap_output">
				<?php
				if ( is_active_sidebar( 'front_page_googlemap_widgets' ) ) {
					dynamic_sidebar( 'front_page_googlemap_widgets' );
				} elseif ( current_user_can( 'edit_theme_options' ) ) {
					if ( ! flexify_exists_trx_addons() ) {
						flexify_customizer_need_trx_addons_message();
					} else {
						flexify_customizer_need_widgets_message( 'front_page_googlemap_caption', 'ThemeREX Addons - Google map' );
					}
				}
				?>
			</div>
			<?php

			if ( 'columns' == $flexify_layout && ( ! empty( $flexify_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) ) {
				?>
				</div></div>
				<?php
			}
			?>
		</div>
	</div>
</div>
