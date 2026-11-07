<?php
$flexify_woocommerce_sc = flexify_get_theme_option( 'front_page_woocommerce_products' );
if ( ! empty( $flexify_woocommerce_sc ) ) {
	?><div class="front_page_section front_page_section_woocommerce<?php
		$flexify_scheme = flexify_get_theme_option( 'front_page_woocommerce_scheme' );
		if ( ! empty( $flexify_scheme ) && ! flexify_is_inherit( $flexify_scheme ) ) {
			echo ' scheme_' . esc_attr( $flexify_scheme );
		}
		echo ' front_page_section_paddings_' . esc_attr( flexify_get_theme_option( 'front_page_woocommerce_paddings' ) );
		if ( flexify_get_theme_option( 'front_page_woocommerce_stack' ) ) {
			echo ' sc_stack_section_on';
		}
	?>"
			<?php
			$flexify_css      = '';
			$flexify_bg_image = flexify_get_theme_option( 'front_page_woocommerce_bg_image' );
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
		$flexify_anchor_icon = flexify_get_theme_option( 'front_page_woocommerce_anchor_icon' );
		$flexify_anchor_text = flexify_get_theme_option( 'front_page_woocommerce_anchor_text' );
		if ( ( ! empty( $flexify_anchor_icon ) || ! empty( $flexify_anchor_text ) ) && shortcode_exists( 'trx_sc_anchor' ) ) {
			echo do_shortcode(
				'[trx_sc_anchor id="front_page_section_woocommerce"'
											. ( ! empty( $flexify_anchor_icon ) ? ' icon="' . esc_attr( $flexify_anchor_icon ) . '"' : '' )
											. ( ! empty( $flexify_anchor_text ) ? ' title="' . esc_attr( $flexify_anchor_text ) . '"' : '' )
											. ']'
			);
		}
	?>
		<div class="front_page_section_inner front_page_section_woocommerce_inner
			<?php
			if ( flexify_get_theme_option( 'front_page_woocommerce_fullheight' ) ) {
				echo ' flexify-full-height sc_layouts_flex sc_layouts_columns_middle';
			}
			?>
				"
				<?php
				$flexify_css      = '';
				$flexify_bg_mask  = flexify_get_theme_option( 'front_page_woocommerce_bg_mask' );
				$flexify_bg_color_type = flexify_get_theme_option( 'front_page_woocommerce_bg_color_type' );
				if ( 'custom' == $flexify_bg_color_type ) {
					$flexify_bg_color = flexify_get_theme_option( 'front_page_woocommerce_bg_color' );
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
			<div class="front_page_section_content_wrap front_page_section_woocommerce_content_wrap flexify_content_wrap woocommerce">
				<?php
				// Content wrap with title and description
				$flexify_caption     = flexify_get_theme_option( 'front_page_woocommerce_caption' );
				$flexify_description = flexify_get_theme_option( 'front_page_woocommerce_description' );
				if ( ! empty( $flexify_caption ) || ! empty( $flexify_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
					// Caption
					if ( ! empty( $flexify_caption ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<h2 class="front_page_section_caption front_page_section_woocommerce_caption front_page_block_<?php echo ! empty( $flexify_caption ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( $flexify_caption, 'flexify_kses_content' );
						?>
						</h2>
						<?php
					}

					// Description (text)
					if ( ! empty( $flexify_description ) || ( current_user_can( 'edit_theme_options' ) && is_customize_preview() ) ) {
						?>
						<div class="front_page_section_description front_page_section_woocommerce_description front_page_block_<?php echo ! empty( $flexify_description ) ? 'filled' : 'empty'; ?>">
						<?php
							echo wp_kses( wpautop( $flexify_description ), 'flexify_kses_content' );
						?>
						</div>
						<?php
					}
				}

				// Content (widgets)
				?>
				<div class="front_page_section_output front_page_section_woocommerce_output list_products shop_mode_thumbs">
					<?php
					if ( 'products' == $flexify_woocommerce_sc ) {
						$flexify_woocommerce_sc_ids      = flexify_get_theme_option( 'front_page_woocommerce_products_per_page' );
						$flexify_woocommerce_sc_per_page = count( explode( ',', $flexify_woocommerce_sc_ids ) );
					} else {
						$flexify_woocommerce_sc_per_page = max( 1, (int) flexify_get_theme_option( 'front_page_woocommerce_products_per_page' ) );
					}
					$flexify_woocommerce_sc_columns = max( 1, min( $flexify_woocommerce_sc_per_page, (int) flexify_get_theme_option( 'front_page_woocommerce_products_columns' ) ) );
					echo do_shortcode(
						"[{$flexify_woocommerce_sc}"
										. ( 'products' == $flexify_woocommerce_sc
												? ' ids="' . esc_attr( $flexify_woocommerce_sc_ids ) . '"'
												: '' )
										. ( 'product_category' == $flexify_woocommerce_sc
												? ' category="' . esc_attr( flexify_get_theme_option( 'front_page_woocommerce_products_categories' ) ) . '"'
												: '' )
										. ( 'best_selling_products' != $flexify_woocommerce_sc
												? ' orderby="' . esc_attr( flexify_get_theme_option( 'front_page_woocommerce_products_orderby' ) ) . '"'
													. ' order="' . esc_attr( flexify_get_theme_option( 'front_page_woocommerce_products_order' ) ) . '"'
												: '' )
										. ' per_page="' . esc_attr( $flexify_woocommerce_sc_per_page ) . '"'
										. ' columns="' . esc_attr( $flexify_woocommerce_sc_columns ) . '"'
						. ']'
					);
					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
