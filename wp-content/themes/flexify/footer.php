<?php
/**
 * The Footer: widgets area, logo, footer menu and socials
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

							do_action( 'flexify_action_page_content_end_text' );
							
							// Widgets area below the content
							flexify_create_widgets_area( 'widgets_below_content' );
						
							do_action( 'flexify_action_page_content_end' );
							?>
						</div>
						<?php
						
						do_action( 'flexify_action_after_page_content' );

						// Show main sidebar
						get_sidebar();

						do_action( 'flexify_action_content_wrap_end' );
						?>
					</div>
					<?php

					do_action( 'flexify_action_after_content_wrap' );

					// Widgets area below the page and related posts below the page
					$flexify_body_style = flexify_get_theme_option( 'body_style' );
					$flexify_widgets_name = flexify_get_theme_option( 'widgets_below_page', 'hide' );
					$flexify_show_widgets = ! flexify_is_off( $flexify_widgets_name ) && is_active_sidebar( $flexify_widgets_name );
					$flexify_show_related = flexify_is_single() && flexify_get_theme_option( 'related_position', 'below_content' ) == 'below_page';
					if ( $flexify_show_widgets || $flexify_show_related ) {
						if ( 'fullscreen' != $flexify_body_style ) {
							?>
							<div class="flexify_content_wrap">
							<?php
						}
						// Show related posts before footer
						if ( $flexify_show_related ) {
							do_action( 'flexify_action_related_posts' );
						}

						// Widgets area below page content
						if ( $flexify_show_widgets ) {
							flexify_create_widgets_area( 'widgets_below_page' );
						}
						if ( 'fullscreen' != $flexify_body_style ) {
							?>
							</div>
							<?php
						}
					}
					do_action( 'flexify_action_page_content_wrap_end' );
					?>
			</div>
			<?php
			do_action( 'flexify_action_after_page_content_wrap' );

			// Don't display the footer elements while actions 'full_post_loading' and 'prev_post_loading'
			if ( ( ! flexify_is_singular( 'post' ) && ! flexify_is_singular( 'attachment' ) ) || ! in_array ( flexify_get_value_gp( 'action' ), array( 'full_post_loading', 'prev_post_loading' ) ) ) {
				
				// Skip link anchor to fast access to the footer from keyboard
				?>
				<span id="footer_skip_link_anchor" class="flexify_skip_link_anchor"></span>
				<?php

				do_action( 'flexify_action_before_footer' );

				// Footer
				$flexify_footer_type = flexify_get_theme_option( 'footer_type' );
				if ( 'custom' == $flexify_footer_type && ! flexify_is_layouts_available() ) {
					$flexify_footer_type = 'default';
				}
				get_template_part( apply_filters( 'flexify_filter_get_template_part', "templates/footer-" . sanitize_file_name( $flexify_footer_type ) ) );

				do_action( 'flexify_action_after_footer' );

			}
			?>

			<?php do_action( 'flexify_action_page_wrap_end' ); ?>

		</div>

		<?php do_action( 'flexify_action_after_page_wrap' ); ?>

	</div>

	<?php do_action( 'flexify_action_after_body' ); ?>

	<?php wp_footer(); ?>

</body>
</html>