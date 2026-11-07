<?php
/**
 * The template to display single post
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

// Full post loading
$full_post_loading          = flexify_get_value_gp( 'action' ) == 'full_post_loading';

// Prev post loading
$prev_post_loading          = flexify_get_value_gp( 'action' ) == 'prev_post_loading';
$prev_post_loading_type     = flexify_get_theme_option( 'posts_navigation_scroll_which_block', 'article' );

// Position of the related posts
$flexify_related_position   = flexify_get_theme_option( 'related_position', 'below_content' );

// Type of the prev/next post navigation
$flexify_posts_navigation   = flexify_get_theme_option( 'posts_navigation' );
$flexify_prev_post          = false;
$flexify_prev_post_same_cat = (int)flexify_get_theme_option( 'posts_navigation_scroll_same_cat', 1 );

// Rewrite style of the single post if current post loading via AJAX and featured image and title is not in the content
if ( ( $full_post_loading 
		|| 
		( $prev_post_loading && 'article' == $prev_post_loading_type )
	) 
	&& 
	! in_array( flexify_get_theme_option( 'single_style' ), array( 'style-6' ) )
) {
	flexify_storage_set_array( 'options_meta', 'single_style', 'style-6' );
}

do_action( 'flexify_action_prev_post_loading', $prev_post_loading, $prev_post_loading_type );

get_header();

while ( have_posts() ) {

	the_post();

	// Type of the prev/next post navigation
	if ( 'scroll' == $flexify_posts_navigation ) {
		$flexify_prev_post = get_previous_post( $flexify_prev_post_same_cat );  // Get post from same category
		if ( ! $flexify_prev_post && $flexify_prev_post_same_cat ) {
			$flexify_prev_post = get_previous_post( false );                    // Get post from any category
		}
		if ( ! $flexify_prev_post ) {
			$flexify_posts_navigation = 'links';
		}
	}

	// Override some theme options to display featured image, title and post meta in the dynamic loaded posts
	if ( $full_post_loading || ( $prev_post_loading && $flexify_prev_post ) ) {
		flexify_sc_layouts_showed( 'featured', false );
		flexify_sc_layouts_showed( 'title', false );
		flexify_sc_layouts_showed( 'postmeta', false );
	}

	// If related posts should be inside the content
	if ( strpos( $flexify_related_position, 'inside' ) === 0 ) {
		ob_start();
	}

	// Display post's content
	get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/content', 'single-' . flexify_get_theme_option( 'single_style' ) ), 'single-' . flexify_get_theme_option( 'single_style' ) );

	// If related posts should be inside the content
	if ( strpos( $flexify_related_position, 'inside' ) === 0 ) {
		$flexify_content = ob_get_contents();
		ob_end_clean();

		ob_start();
		do_action( 'flexify_action_related_posts' );
		$flexify_related_content = ob_get_contents();
		ob_end_clean();

		if ( ! empty( $flexify_related_content ) ) {
			$flexify_related_position_inside = max( 0, min( 9, flexify_get_theme_option( 'related_position_inside' ) ) );
			if ( 0 == $flexify_related_position_inside ) {
				$flexify_related_position_inside = mt_rand( 1, 9 );
			}

			$flexify_p_number         = 0;
			$flexify_related_inserted = false;
			$flexify_in_block         = false;
			$flexify_content_start    = strpos( $flexify_content, '<div class="post_content' );
			$flexify_content_end      = strrpos( $flexify_content, '</div>' );

			for ( $i = max( 0, $flexify_content_start ); $i < min( strlen( $flexify_content ) - 3, $flexify_content_end ); $i++ ) {
				if ( $flexify_content[ $i ] != '<' ) {
					continue;
				}
				if ( $flexify_in_block ) {
					if ( strtolower( substr( $flexify_content, $i + 1, 12 ) ) == '/blockquote>' ) {
						$flexify_in_block = false;
						$i += 12;
					}
					continue;
				} else if ( strtolower( substr( $flexify_content, $i + 1, 10 ) ) == 'blockquote' && in_array( $flexify_content[ $i + 11 ], array( '>', ' ' ) ) ) {
					$flexify_in_block = true;
					$i += 11;
					continue;
				} else if ( 'p' == $flexify_content[ $i + 1 ] && in_array( $flexify_content[ $i + 2 ], array( '>', ' ' ) ) ) {
					$flexify_p_number++;
					if ( $flexify_related_position_inside == $flexify_p_number ) {
						$flexify_related_inserted = true;
						$flexify_content = ( $i > 0 ? substr( $flexify_content, 0, $i ) : '' )
											. $flexify_related_content
											. substr( $flexify_content, $i );
					}
				}
			}
			if ( ! $flexify_related_inserted ) {
				if ( $flexify_content_end > 0 ) {
					$flexify_content = substr( $flexify_content, 0, $flexify_content_end ) . $flexify_related_content . substr( $flexify_content, $flexify_content_end );
				} else {
					$flexify_content .= $flexify_related_content;
				}
			}
		}

		flexify_show_layout( $flexify_content );
	}

	// Comments
	do_action( 'flexify_action_before_comments' );
	comments_template();
	do_action( 'flexify_action_after_comments' );

	// Related posts
	if ( 'below_content' == $flexify_related_position
		&& ( 'scroll' != $flexify_posts_navigation || (int)flexify_get_theme_option( 'posts_navigation_scroll_hide_related', 0 ) == 0 )
		&& ( ! $full_post_loading || (int)flexify_get_theme_option( 'open_full_post_hide_related', 1 ) == 0 )
	) {
		do_action( 'flexify_action_related_posts' );
	}

	// Post navigation: type 'scroll'
	if ( 'scroll' == $flexify_posts_navigation && ! $full_post_loading ) {
		?>
		<div class="nav-links-single-scroll"
			data-post-id="<?php echo esc_attr( get_the_ID( $flexify_prev_post ) ); ?>"
			data-post-link="<?php echo esc_attr( get_permalink( $flexify_prev_post ) ); ?>"
			data-post-title="<?php the_title_attribute( array( 'post' => $flexify_prev_post ) ); ?>"
			data-cur-post-link="<?php echo esc_attr( get_permalink() ); ?>"
			data-cur-post-title="<?php the_title_attribute(); ?>"
			<?php do_action( 'flexify_action_nav_links_single_scroll_data', $flexify_prev_post ); ?>
		></div>
		<?php
	}
}

get_footer();
