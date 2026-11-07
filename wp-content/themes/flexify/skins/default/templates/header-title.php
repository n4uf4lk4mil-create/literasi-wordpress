<?php
/**
 * The template to display the page title and breadcrumbs
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

// Page (category, tag, archive, author) title

if ( flexify_need_page_title() ) {
	flexify_sc_layouts_showed( 'title', true );
	?>
	<div class="top_panel_title sc_layouts_row">
		<div class="flexify_content_wrap">
			<div class="sc_layouts_column sc_layouts_column_align_center">
				<div class="sc_layouts_item">
					<div class="sc_layouts_title sc_align_center">
						<?php
						// Blog/Page title
						?>
						<div class="sc_layouts_title_title">
							<?php
							$flexify_blog_title           = flexify_get_blog_title();
							$flexify_blog_title_text      = '';
							$flexify_blog_title_class     = '';
							$flexify_blog_title_link      = '';
							$flexify_blog_title_link_text = '';
							if ( is_array( $flexify_blog_title ) ) {
								$flexify_blog_title_text      = $flexify_blog_title['text'];
								$flexify_blog_title_class     = ! empty( $flexify_blog_title['class'] ) ? ' ' . $flexify_blog_title['class'] : '';
								$flexify_blog_title_link      = ! empty( $flexify_blog_title['link'] ) ? $flexify_blog_title['link'] : '';
								$flexify_blog_title_link_text = ! empty( $flexify_blog_title['link_text'] ) ? $flexify_blog_title['link_text'] : '';
							} else {
								$flexify_blog_title_text = $flexify_blog_title;
							}
							?>
							<h1 class="sc_layouts_title_caption<?php echo esc_attr( $flexify_blog_title_class ); ?>"<?php
								if ( flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) ) ) {
									?> itemprop="headline"<?php
								}
							?>>
								<?php
								$flexify_top_icon = flexify_get_term_image_small();
								if ( ! empty( $flexify_top_icon ) ) {
									$flexify_attr = flexify_getimagesize( $flexify_top_icon );
									?>
									<img src="<?php echo esc_url( $flexify_top_icon ); ?>" alt="<?php esc_attr_e( 'Site icon', 'flexify' ); ?>"
										<?php
										if ( ! empty( $flexify_attr[3] ) ) {
											flexify_show_layout( $flexify_attr[3] );
										}
										?>
									>
									<?php
								}
								echo wp_kses_data( $flexify_blog_title_text );
								?>
							</h1>
							<?php
							if ( ! empty( $flexify_blog_title_link ) && ! empty( $flexify_blog_title_link_text ) ) {
								?>
								<a href="<?php echo esc_url( $flexify_blog_title_link ); ?>" class="theme_button sc_layouts_title_link"><?php echo esc_html( $flexify_blog_title_link_text ); ?></a>
								<?php
							}

							// Category/Tag description
							if ( ! is_paged() && ( is_category() || is_tag() || is_tax() ) ) {
								the_archive_description( '<div class="sc_layouts_title_description">', '</div>' );
							}

							?>
						</div>
						<?php

						// Breadcrumbs
						ob_start();
						do_action( 'flexify_action_breadcrumbs' );
						$flexify_breadcrumbs = ob_get_contents();
						ob_end_clean();
						flexify_show_layout( $flexify_breadcrumbs, '<div class="sc_layouts_title_breadcrumbs">', '</div>' );
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
