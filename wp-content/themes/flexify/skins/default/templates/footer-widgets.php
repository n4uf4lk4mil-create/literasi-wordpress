<?php
/**
 * The template to display the widgets area in the footer
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.10
 */

// Footer sidebar
$flexify_footer_name    = flexify_get_theme_option( 'footer_widgets' );
$flexify_footer_present = ! flexify_is_off( $flexify_footer_name ) && is_active_sidebar( $flexify_footer_name );
if ( $flexify_footer_present ) {
	flexify_storage_set( 'current_sidebar', 'footer' );
	ob_start();
	if ( is_active_sidebar( $flexify_footer_name ) ) {
		dynamic_sidebar( $flexify_footer_name );
	}
	$flexify_out = trim( ob_get_contents() );
	ob_end_clean();
	if ( ! empty( $flexify_out ) ) {
		$flexify_out          = preg_replace( "/<\\/aside>[\r\n\s]*<aside/", '</aside><aside', $flexify_out );
		$flexify_need_columns = true;   //or check: strpos($flexify_out, 'columns_wrap')===false;
		if ( $flexify_need_columns ) {
			$flexify_columns = max( 0, (int) flexify_get_theme_option( 'footer_columns' ) );			
			if ( 0 == $flexify_columns ) {
				$flexify_columns = min( 4, max( 1, flexify_tags_count( $flexify_out, 'aside' ) ) );
			}
			if ( $flexify_columns > 1 ) {
				$flexify_out = preg_replace( '/<aside([^>]*)class="widget/', '<aside$1class="column-1_' . esc_attr( $flexify_columns ) . ' widget', $flexify_out );
			} else {
				$flexify_need_columns = false;
			}
		}
		?>
		<div class="footer_widgets_wrap widget_area sc_layouts_row">
			<?php do_action( 'flexify_action_before_sidebar_wrap', 'footer' ); ?>
			<div class="footer_widgets_inner widget_area_inner">
				<div class="flexify_content_wrap">
					<?php
					if ( $flexify_need_columns ) {
						?>
						<div class="flexify_columns_wrap">
						<?php
					}
					do_action( 'flexify_action_before_sidebar', 'footer' );
					flexify_show_layout( $flexify_out );
					do_action( 'flexify_action_after_sidebar', 'footer' );
					if ( $flexify_need_columns ) {
						?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<?php do_action( 'flexify_action_after_sidebar_wrap', 'footer' ); ?>
		</div>
		<?php
	}
}
