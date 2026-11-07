<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

if ( flexify_sidebar_present() ) {
	
	$flexify_sidebar_type = flexify_get_theme_option( 'sidebar_type' );
	if ( 'custom' == $flexify_sidebar_type && ! flexify_is_layouts_available() ) {
		$flexify_sidebar_type = 'default';
	}
	
	// Catch output to the buffer
	ob_start();
	if ( 'default' == $flexify_sidebar_type ) {
		// Default sidebar with widgets
		$flexify_sidebar_name = flexify_get_theme_option( 'sidebar_widgets' );
		flexify_storage_set( 'current_sidebar', 'sidebar' );
		if ( is_active_sidebar( $flexify_sidebar_name ) ) {
			dynamic_sidebar( $flexify_sidebar_name );
		}
	} else {
		// Custom sidebar from Layouts Builder
		$flexify_sidebar_id = flexify_get_custom_sidebar_id();
		do_action( 'flexify_action_show_layout', $flexify_sidebar_id );
	}
	$flexify_out = trim( ob_get_contents() );
	ob_end_clean();
	
	// If any html is present - display it
	if ( ! empty( $flexify_out ) ) {
		$flexify_sidebar_position    = flexify_get_theme_option( 'sidebar_position' );
		$flexify_sidebar_position_ss = flexify_get_theme_option( 'sidebar_position_ss', 'below' );
		?>
		<div class="flexify_sidebar widget_area
			<?php
			echo ' ' . esc_attr( $flexify_sidebar_position );
			echo ' sidebar_' . esc_attr( $flexify_sidebar_position_ss );
			echo ' sidebar_' . esc_attr( $flexify_sidebar_type );

			$flexify_sidebar_scheme = apply_filters( 'flexify_filter_sidebar_scheme', flexify_get_theme_option( 'sidebar_scheme', 'inherit' ) );
			if ( ! empty( $flexify_sidebar_scheme ) && ! flexify_is_inherit( $flexify_sidebar_scheme ) && 'custom' != $flexify_sidebar_type ) {
				echo ' scheme_' . esc_attr( $flexify_sidebar_scheme );
			}
			?>
		" role="complementary">
			<?php

			// Skip link anchor to fast access to the sidebar from keyboard
			?>
			<span id="sidebar_skip_link_anchor" class="flexify_skip_link_anchor"></span>
			<?php

			do_action( 'flexify_action_before_sidebar_wrap', 'sidebar' );

			// Button to show/hide sidebar on mobile
			if ( in_array( $flexify_sidebar_position_ss, array( 'above', 'float' ) ) ) {
				$flexify_title = apply_filters( 'flexify_filter_sidebar_control_title', 'float' == $flexify_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'flexify' ) : '' );
				$flexify_text  = apply_filters( 'flexify_filter_sidebar_control_text', 'above' == $flexify_sidebar_position_ss ? esc_html__( 'Show Sidebar', 'flexify' ) : '' );
				?>
				<a href="#" role="button" class="sidebar_control" title="<?php echo esc_attr( $flexify_title ); ?>"><?php echo esc_html( $flexify_text ); ?></a>
				<?php
			}
			?>
			<div class="sidebar_inner">
				<?php
				do_action( 'flexify_action_before_sidebar', 'sidebar' );
				flexify_show_layout( preg_replace( "/<\/aside>[\r\n\s]*<aside/", '</aside><aside', $flexify_out ) );
				do_action( 'flexify_action_after_sidebar', 'sidebar' );
				?>
			</div>
			<?php

			do_action( 'flexify_action_after_sidebar_wrap', 'sidebar' );

			?>
		</div>
		<div class="clearfix"></div>
		<?php
	}
}
