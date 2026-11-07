<?php
/**
 * The Classic template to display the content
 *
 * Used for index/archive/search.
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

$flexify_template_args = get_query_var( 'flexify_template_args' );

if ( is_array( $flexify_template_args ) ) {
	$flexify_columns       = empty( $flexify_template_args['columns'] ) ? 1 : max( 1, $flexify_template_args['columns'] );
	$flexify_blog_style    = array( $flexify_template_args['type'], $flexify_columns );
	$flexify_columns_class = flexify_get_column_class( 1, $flexify_columns, ! empty( $flexify_template_args['columns_tablet']) ? $flexify_template_args['columns_tablet'] : '', ! empty($flexify_template_args['columns_mobile']) ? $flexify_template_args['columns_mobile'] : '' );
} else {
	$flexify_template_args = array();
	$flexify_blog_style    = explode( '_', flexify_get_theme_option( 'blog_style' ) );
	$flexify_columns       = empty( $flexify_blog_style[1] ) ? 1 : max( 1, $flexify_blog_style[1] );
	$flexify_columns_class = flexify_get_column_class( 1, $flexify_columns );
}
$flexify_expanded   = ! flexify_sidebar_present() && flexify_get_theme_option( 'expand_content' ) == 'expand';

$flexify_post_format = get_post_format();
$flexify_post_format = empty( $flexify_post_format ) ? 'standard' : str_replace( 'post-format-', '', $flexify_post_format );

?><div class="<?php
	if ( ! empty( $flexify_template_args['slider'] ) ) {
		echo ' slider-slide swiper-slide';
	} else {
		echo ( flexify_is_blog_style_use_masonry( $flexify_blog_style[0] )
			? 'masonry_item masonry_item-1_' . esc_attr( $flexify_columns )
			: esc_attr( $flexify_columns_class )
			);
	}
?>"><article id="post-<?php the_ID(); ?>" data-post-id="<?php the_ID(); ?>"
	<?php
	post_class(
		'post_item post_item_container post_format_' . esc_attr( $flexify_post_format )
				. ' post_layout_classic post_layout_classic_' . esc_attr( $flexify_columns )
				. ' post_layout_' . esc_attr( $flexify_blog_style[0] )
				. ' post_layout_' . esc_attr( $flexify_blog_style[0] ) . '_' . esc_attr( $flexify_columns )
	);
	flexify_add_blog_animation( $flexify_template_args );
	?>
>
	<?php

	// Sticky label
	if ( is_sticky() && ! is_paged() ) {
		?><span class="post_label label_sticky"></span><?php
	}

	// Featured image
	$flexify_hover      = ! empty( $flexify_template_args['hover'] ) && ! flexify_is_inherit( $flexify_template_args['hover'] )
							? $flexify_template_args['hover']
							: flexify_get_theme_option( 'image_hover' );

	$flexify_components = ! empty( $flexify_template_args['meta_parts'] )
							? ( is_array( $flexify_template_args['meta_parts'] )
								? $flexify_template_args['meta_parts']
								: array_map( 'trim', explode( ',', $flexify_template_args['meta_parts'] ) )
								)
							: flexify_array_get_keys_by_value( flexify_get_theme_option( 'meta_parts' ) );

	flexify_show_post_featured( apply_filters( 'flexify_filter_args_featured',
		array(
			'thumb_size' => ! empty( $flexify_template_args['thumb_size'] )
								? $flexify_template_args['thumb_size']
								: flexify_get_thumb_size(
									strpos( flexify_get_theme_option( 'body_style' ), 'full' ) !== false
										? ( $flexify_columns > 2 ? 'big' : 'full' )
										: ( $flexify_columns > 2
											? 'med'
											: ( $flexify_expanded || $flexify_columns == 1 ? 
												( $flexify_expanded && $flexify_columns == 1 ? 'huge' : 'big' ) 
												: 'med' 
												)
											)												
								),
			'hover'      => $flexify_hover,
			'meta_parts' => $flexify_components,
			'no_links'   => ! empty( $flexify_template_args['no_links'] ),
		),
		'content-classic',
		$flexify_template_args
	) );

	// Title and post meta
	$flexify_show_title = get_the_title() != '';
	$flexify_show_meta  = count( $flexify_components ) > 0;

	if ( $flexify_show_title ) {
		?><div class="post_header entry-header"><?php
			// Categories
			if ( apply_filters( 'flexify_filter_show_blog_categories', $flexify_show_meta && in_array( 'categories', $flexify_components ), array( 'categories' ), 'classic' ) ) {
				do_action( 'flexify_action_before_post_category' );
				?><div class="post_category"><?php
					flexify_show_post_meta( apply_filters(
														'flexify_filter_post_meta_args',
														array(
															'components' => 'categories',
															'seo'        => false,
															'echo'       => true,
															),
														'hover_' . $flexify_hover, 1
														)
										);
				?></div><?php
				$flexify_components = flexify_array_delete_by_value( $flexify_components, 'categories' );
				do_action( 'flexify_action_after_post_category' );
			}
			// Post title
			if ( apply_filters( 'flexify_filter_show_blog_title', true, 'classic' ) ) {
				do_action( 'flexify_action_before_post_title' );
				if ( empty( $flexify_template_args['no_links'] ) ) {
					the_title( sprintf( '<h3 class="post_title entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' );
				} else {
					the_title( '<h3 class="post_title entry-title">', '</h3>' );
				}
				do_action( 'flexify_action_after_post_title' );
			}
		?></div><?php
	}
	
	// Post meta
	if ( apply_filters( 'flexify_filter_show_blog_meta', $flexify_show_meta, $flexify_components, 'classic' ) ) {
		if ( count( $flexify_components ) > 0 ) {
			do_action( 'flexify_action_before_post_meta' );
			flexify_show_post_meta(
				apply_filters(
					'flexify_filter_post_meta_args', array(
						'components' => join( ',', $flexify_components ),
						'seo'        => false,
						'echo'       => true,
						'author_avatar' => false,
					), $flexify_blog_style[0], $flexify_columns
				)
			);
			do_action( 'flexify_action_after_post_meta' );
		}
	}

	// Post content
	ob_start();
	if ( apply_filters( 'flexify_filter_show_blog_excerpt', ( ! isset( $flexify_template_args['hide_excerpt'] ) || (int)$flexify_template_args['hide_excerpt'] == 0 ) && (int)flexify_get_theme_option( 'excerpt_length' ) > 0, 'classic' ) ) {
		flexify_show_post_content( $flexify_template_args, '<div class="post_content_inner">', '</div>' );
	}
	$flexify_content = ob_get_contents();
	ob_end_clean();

	flexify_show_layout( $flexify_content, '<div class="post_content entry-content">', '</div>' );

		
	// More button
	if ( apply_filters( 'flexify_filter_show_blog_readmore', ! $flexify_show_title || ! empty( $flexify_template_args['more_button'] ), 'classic' ) ) {
		if ( empty( $flexify_template_args['no_links'] ) ) {
			do_action( 'flexify_action_before_post_readmore' );
			flexify_show_post_more_link( $flexify_template_args, '<p>', '</p>' );
			do_action( 'flexify_action_after_post_readmore' );
		}
	}

	?>

</article></div><?php
// Need opening PHP-tag above, because <div> is a inline-block element (used as column)!
