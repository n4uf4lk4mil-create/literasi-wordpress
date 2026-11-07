<div class="front_page_section front_page_section_about<?php
	$flexify_scheme = flexify_get_theme_option( 'front_page_about_scheme' );
	if ( ! empty( $flexify_scheme ) && ! flexify_is_inherit( $flexify_scheme ) ) {
		echo ' scheme_' . esc_attr( $flexify_scheme );
	}
	echo ' front_page_section_paddings_' . esc_attr( flexify_get_theme_option( 'front_page_about_paddings' ) );
	if ( flexify_get_theme_option( 'front_page_about_stack' ) ) {
		echo ' sc_stack_section_on';
	}
?>"
		<?php
		$flexify_css      = '';
		$flexify_bg_image = flexify_get_theme_option( 'front_page_about_bg_image' );
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
	$flexify_anchor_icon = flexify_get_theme_option( 'front_page_about_anchor_icon' );
	$flexify_anchor_text = flexify_get_theme_option( 'front_page_about_anchor_text' );
if ( ( ! empty( $flexify_anchor_icon ) || ! empty( $flexify_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
	echo do_shortcode(
		'[trx_sc_anchor id="front_page_section_about"'
									. ( ! empty( $flexify_anchor_icon ) ? ' icon="' . esc_attr( $flexify_anchor_icon ) . '"' : '' )
									. ( ! empty( $flexify_anchor_text ) ? ' title="' . esc_attr( $flexify_anchor_text ) . '"' : '' )
									. ']'
	);
}
?>
	<div class="front_page_section_inner front_page_section_about_inner
	<?php
	if ( flexify_get_theme_option( 'front_page_about_fullheight' ) ) {
		echo ' flexify-full-height sc_layouts_flex sc_layouts_columns_middle';
	}
	?>
			"
			<?php
			$flexify_css           = '';
			$flexify_bg_mask       = flexify_get_theme_option( 'front_page_about_bg_mask' );
			$flexify_bg_color_type = flexify_get_theme_option( 'front_page_about_bg_color_type' );
			if ( 'custom' == $flexify_bg_color_type ) {
				$flexify_bg_color = flexify_get_theme_option( 'front_page_about_bg_color' );
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
		<div class="front_page_section_content_wrap front_page_section_about_content_wrap flexify_content_wrap">
			<?php
			// Caption
			$flexify_caption = flexify_get_theme_option( 'front_page_about_caption' );
			if ( ! empty( $flexify_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<h2 class="front_page_section_caption front_page_section_about_caption front_page_block_<?php echo ! empty( $flexify_caption ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( $flexify_caption, 'flexify_kses_content' ); ?></h2>
				<?php
			}

			// Description (text)
			$flexify_description = flexify_get_theme_option( 'front_page_about_description' );
			if ( ! empty( $flexify_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_description front_page_section_about_description front_page_block_<?php echo ! empty( $flexify_description ) ? 'filled' : 'empty'; ?>"><?php echo wp_kses( wpautop( $flexify_description ), 'flexify_kses_content' ); ?></div>
				<?php
			}

			// Content
			$flexify_content = flexify_get_theme_option( 'front_page_about_content' );
			if ( ! empty( $flexify_content ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
				?>
				<div class="front_page_section_content front_page_section_about_content front_page_block_<?php echo ! empty( $flexify_content ) ? 'filled' : 'empty'; ?>">
					<?php
					$flexify_page_content_mask = '%%CONTENT%%';
					if ( strpos( $flexify_content, $flexify_page_content_mask ) !== false ) {
						$flexify_content = preg_replace(
							'/(\<p\>\s*)?' . $flexify_page_content_mask . '(\s*\<\/p\>)/i',
							sprintf(
								'<div class="front_page_section_about_source">%s</div>',
								apply_filters( 'the_content', get_the_content() )
							),
							$flexify_content
						);
					}
					flexify_show_layout( $flexify_content );
					?>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
