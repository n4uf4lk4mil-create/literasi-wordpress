<?php
/**
 * The template to display the main menu
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */
?>
<div class="top_panel_navi sc_layouts_row sc_layouts_row_type_compact sc_layouts_row_delimiter">
	<div class="flexify_content_wrap">
		<div class="flexify_columns_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_left sc_layouts_column_icons_position_left column-1_4">
				<div class="sc_layouts_item">
					<?php
					// Logo
					get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/header-logo' ) );
					?>
				</div>
			</div><div class="sc_layouts_column sc_layouts_column_align_right sc_layouts_column_icons_position_left column-3_4">
				<div class="sc_layouts_item">
					<?php
					// Main menu
					$flexify_menu_main = flexify_get_nav_menu( 'menu_main' );
					// Show any menu if no menu selected in the location 'menu_main'
					if ( flexify_get_theme_setting( 'autoselect_menu' ) && empty( $flexify_menu_main ) ) {
						$flexify_menu_main = flexify_get_nav_menu();
					}
					flexify_show_layout(
						$flexify_menu_main,
						'<nav class="menu_main_nav_area sc_layouts_menu sc_layouts_menu_default sc_layouts_hide_on_mobile"'
							. ( flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) ) ? ' itemscope="itemscope" itemtype="' . esc_attr( flexify_get_protocol( true ) ) . '//schema.org/SiteNavigationElement"' : '' )
							. '>',
						'</nav>'
					);
					// Mobile menu button
					?>
					<div class="sc_layouts_iconed_text sc_layouts_menu_mobile_button">
						<a class="sc_layouts_item_link sc_layouts_iconed_text_link" href="#" role="button">
							<span class="sc_layouts_item_icon sc_layouts_iconed_text_icon trx_addons_icon-menu"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
