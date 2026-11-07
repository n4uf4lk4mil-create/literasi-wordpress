<?php
/**
 * The default template to displaying related posts
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.54
 */

$flexify_link        = get_permalink();
$flexify_post_format = get_post_format();
$flexify_post_format = empty( $flexify_post_format ) ? 'standard' : str_replace( 'post-format-', '', $flexify_post_format );
?><div id="post-<?php the_ID(); ?>" <?php post_class( 'related_item post_format_' . esc_attr( $flexify_post_format ) ); ?> data-post-id="<?php the_ID(); ?>">
	<?php
	flexify_show_post_featured(
		array(
			'thumb_size' => apply_filters( 'flexify_filter_related_thumb_size', flexify_get_thumb_size(
				(int) flexify_get_theme_option( 'related_posts' ) == 1 || (int) flexify_get_theme_option( 'related_columns' ) == 1 ? 'full' : 'big' )
			),
		)
	);
	?>
	<div class="post_header entry-header">
		<h6 class="post_title entry-title"><a href="<?php echo esc_url( $flexify_link ); ?>"><?php
			if ( '' == get_the_title() ) {
				esc_html_e( 'No title', 'flexify' );
			} else {
				the_title();
			}
		?></a></h6>
		<?php
		if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
			?>
			<span class="post_date"><a href="<?php echo esc_url( $flexify_link ); ?>"><?php echo wp_kses_data( flexify_get_date() ); ?></a></span>
			<?php
		}
		?>
	</div>
</div>
