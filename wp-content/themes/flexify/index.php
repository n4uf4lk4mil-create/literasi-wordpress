<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: //codex.wordpress.org/Template_Hierarchy
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0
 */

$flexify_template = apply_filters( 'flexify_filter_get_template_part', flexify_blog_archive_get_template() );

if ( ! empty( $flexify_template ) && 'index' != $flexify_template ) {

	get_template_part( $flexify_template );

} else {

	flexify_storage_set( 'blog_archive', true );

	get_header();

	if ( have_posts() ) {

		// Query params
		$flexify_stickies   = is_home()
								|| ( in_array( flexify_get_theme_option( 'post_type' ), array( '', 'post' ) )
									&& (int) flexify_get_theme_option( 'parent_cat' ) == 0
									)
										? get_option( 'sticky_posts' )
										: false;
		$flexify_post_type  = flexify_get_theme_option( 'post_type' );
		$flexify_args       = array(
								'blog_style'     => flexify_get_theme_option( 'blog_style' ),
								'post_type'      => $flexify_post_type,
								'taxonomy'       => flexify_get_post_type_taxonomy( $flexify_post_type ),
								'parent_cat'     => flexify_get_theme_option( 'parent_cat' ),
								'posts_per_page' => flexify_get_theme_option( 'posts_per_page' ),
								'sticky'         => flexify_get_theme_option( 'sticky_style', 'inherit' ) == 'columns'
															&& is_array( $flexify_stickies )
															&& count( $flexify_stickies ) > 0
															&& get_query_var( 'paged' ) < 1
								);

		flexify_blog_archive_start();

		do_action( 'flexify_action_blog_archive_start' );

		if ( is_author() ) {
			do_action( 'flexify_action_before_page_author' );
			get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/author-page' ) );
			do_action( 'flexify_action_after_page_author' );
		}

		if ( flexify_get_theme_option( 'show_filters', 0 ) ) {
			do_action( 'flexify_action_before_page_filters' );
			flexify_show_filters( $flexify_args );
			do_action( 'flexify_action_after_page_filters' );
		} else {
			do_action( 'flexify_action_before_page_posts' );
			flexify_show_posts( array_merge( $flexify_args, array( 'cat' => $flexify_args['parent_cat'] ) ) );
			do_action( 'flexify_action_after_page_posts' );
		}

		do_action( 'flexify_action_blog_archive_end' );

		flexify_blog_archive_end();

	} else {

		if ( is_search() ) {
			get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/content', 'none-search' ), 'none-search' );
		} else {
			get_template_part( apply_filters( 'flexify_filter_get_template_part', 'templates/content', 'none-archive' ), 'none-archive' );
		}
	}

	get_footer();
}
