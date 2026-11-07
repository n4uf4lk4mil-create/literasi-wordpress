<?php
/**
 * The Header: Logo and main menu
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js<?php
	// Class scheme_xxx need in the <html> as context for the <body>!
	echo ' scheme_' . esc_attr( flexify_get_theme_option( 'color_scheme' ) );
?>">

<head>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php
	if ( function_exists( 'wp_body_open' ) ) {
		wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}

	$flexify_full_post_loading = ( flexify_is_singular( 'post' ) || flexify_is_singular( 'attachment' ) ) && flexify_get_value_gp( 'action' ) == 'full_post_loading';
	$flexify_prev_post_loading = ( flexify_is_singular( 'post' ) || flexify_is_singular( 'attachment' ) ) && flexify_get_value_gp( 'action' ) == 'prev_post_loading';

	// Don't display the short links while actions 'full_post_loading' and 'prev_post_loading'
	if ( ! $flexify_full_post_loading && ! $flexify_prev_post_loading ) {
		// Short links to fast access to the content, sidebar and footer from the keyboard
		?><a class="skip-link flexify_skip_link skip_to_content_link" href="#content_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'flexify_filter_skip_links_tabindex', 0 ) ); ?>"><?php esc_html_e( "Skip to content", 'flexify' ); ?></a><?php
		if ( flexify_sidebar_present() ) {
			?><a class="skip-link flexify_skip_link skip_to_sidebar_link" href="#sidebar_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'flexify_filter_skip_links_tabindex', 0 ) ); ?>"><?php esc_html_e( "Skip to sidebar", 'flexify' ); ?></a><?php
		}
		?><a class="skip-link flexify_skip_link skip_to_footer_link" href="#footer_skip_link_anchor" tabindex="<?php echo esc_attr( apply_filters( 'flexify_filter_skip_links_tabindex', 0 ) ); ?>"><?php esc_html_e( "Skip to footer", 'flexify' ); ?></a><?php
	}

	do_action( 'flexify_action_before_body' );
	?>

	<div class="<?php echo esc_attr( apply_filters( 'flexify_filter_body_wrap_class', 'flexify_body_wrap' ) ); ?>" <?php do_action('flexify_action_body_wrap_attributes'); ?>>

		<?php do_action( 'flexify_action_before_page_wrap' ); ?>

		<div class="<?php echo esc_attr( apply_filters( 'flexify_filter_page_wrap_class', 'flexify_page_wrap' ) ); ?>" <?php do_action('flexify_action_page_wrap_attributes'); ?>>

			<?php do_action( 'flexify_action_page_wrap_start' ); ?>

			<?php

			// Don't display the header elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ! $flexify_full_post_loading && ! $flexify_prev_post_loading ) {

				do_action( 'flexify_action_before_header' );

				// Header
				$flexify_header_type = flexify_get_theme_option( 'header_type' );
				if ( 'custom' == $flexify_header_type && ! flexify_is_layouts_available() ) {
					$flexify_header_type = 'default';
				}
				get_template_part( apply_filters( 'flexify_filter_get_template_part', "templates/header-" . sanitize_file_name( $flexify_header_type ) ) );

				// Side menu
				if ( in_array( flexify_get_theme_option( 'menu_side', 'none' ), array( 'left', 'right' ) ) ) {
					get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/header-navi-side' ) );
				}

				// Mobile menu
				if ( apply_filters( 'flexify_filter_use_navi_mobile', flexify_sc_layouts_showed( 'menu_button' ) || $flexify_header_type == 'default' ) ) {
					get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/header-navi-mobile' ) );
				}

				do_action( 'flexify_action_after_header' );

			}
			?>

			<?php do_action( 'flexify_action_before_page_content_wrap' ); ?>

			<div class="page_content_wrap<?php
				if ( flexify_is_off( flexify_get_theme_option( 'remove_margins' ) ) ) {
					if ( empty( $flexify_header_type ) ) {
						$flexify_header_type = flexify_get_theme_option( 'header_type' );
					}
					if ( 'custom' == $flexify_header_type && flexify_is_layouts_available() ) {
						$flexify_header_id = flexify_get_custom_header_id();
						if ( $flexify_header_id > 0 ) {
							$flexify_header_meta = flexify_get_custom_layout_meta( $flexify_header_id );
							if ( ! empty( $flexify_header_meta['margin'] ) ) {
								?> page_content_wrap_custom_header_margin<?php
							}
						}
					}
					$flexify_footer_type = flexify_get_theme_option( 'footer_type' );
					if ( 'custom' == $flexify_footer_type && flexify_is_layouts_available() ) {
						$flexify_footer_id = flexify_get_custom_footer_id();
						if ( $flexify_footer_id ) {
							$flexify_footer_meta = flexify_get_custom_layout_meta( $flexify_footer_id );
							if ( ! empty( $flexify_footer_meta['margin'] ) ) {
								?> page_content_wrap_custom_footer_margin<?php
							}
						}
					}
				}
				do_action( 'flexify_action_page_content_wrap_class', $flexify_prev_post_loading );
				?>"<?php
				if ( apply_filters( 'flexify_filter_is_prev_post_loading', $flexify_prev_post_loading ) ) {
					?> data-single-style="<?php echo esc_attr( flexify_get_theme_option( 'single_style' ) ); ?>"<?php
				}
				do_action( 'flexify_action_page_content_wrap_data', $flexify_prev_post_loading );
			?>>
				<?php
				do_action( 'flexify_action_page_content_wrap', $flexify_full_post_loading || $flexify_prev_post_loading );

				// Single posts banner
				if ( apply_filters( 'flexify_filter_single_post_header', flexify_is_singular( 'post' ) || flexify_is_singular( 'attachment' ) ) ) {
					if ( $flexify_prev_post_loading ) {
						if ( flexify_get_theme_option( 'posts_navigation_scroll_which_block', 'article' ) != 'article' ) {
							do_action( 'flexify_action_between_posts' );
						}
					}
					// Single post thumbnail and title
					$flexify_path = apply_filters( 'flexify_filter_get_template_part', 'templates/single-styles/' . flexify_get_theme_option( 'single_style' ) );
					if ( flexify_get_file_dir( $flexify_path . '.php' ) != '' ) {
						get_template_part( $flexify_path );
					}
				}

				// Widgets area above page
				$flexify_body_style   = flexify_get_theme_option( 'body_style' );
				$flexify_widgets_name = flexify_get_theme_option( 'widgets_above_page', 'hide' );
				$flexify_show_widgets = ! flexify_is_off( $flexify_widgets_name ) && is_active_sidebar( $flexify_widgets_name );
				if ( $flexify_show_widgets ) {
					if ( 'fullscreen' != $flexify_body_style ) {
						?>
						<div class="flexify_content_wrap">
							<?php
					}
					flexify_create_widgets_area( 'widgets_above_page' );
					if ( 'fullscreen' != $flexify_body_style ) {
						?>
						</div>
						<?php
					}
				}

				// Content area
				do_action( 'flexify_action_before_content_wrap' );
				?>
				<div class="flexify_content_wrap<?php echo 'fullscreen' == $flexify_body_style ? '_fullscreen' : ''; ?>">

					<?php do_action( 'flexify_action_content_wrap_start' ); ?>

					<div class="flexify_content">
						<?php
						do_action( 'flexify_action_page_content_start' );

						// Skip link anchor to fast access to the content from keyboard
						?>
						<span id="content_skip_link_anchor" class="flexify_skip_link_anchor"></span>
						<?php
						// Single posts banner between prev/next posts
						if ( ( flexify_is_singular( 'post' ) || flexify_is_singular( 'attachment' ) )
							&& $flexify_prev_post_loading 
							&& flexify_get_theme_option( 'posts_navigation_scroll_which_block', 'article' ) == 'article'
						) {
							do_action( 'flexify_action_between_posts' );
						}

						// Widgets area above content
						flexify_create_widgets_area( 'widgets_above_content' );

						do_action( 'flexify_action_page_content_start_text' );
