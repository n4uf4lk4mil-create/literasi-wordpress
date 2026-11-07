<?php
/**
 * The template to display the user's avatar, bio and socials on the Author page
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.71.0
 */
?>

<div class="author_page author vcard"<?php
	if ( flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) ) ) {
		?> itemprop="author" itemscope="itemscope" itemtype="<?php echo esc_attr( flexify_get_protocol( true ) ); ?>//schema.org/Person"<?php
	}
?>>

	<div class="author_avatar"<?php
		if ( flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) ) ) {
			?> itemprop="image"<?php
		}
	?>>
		<?php
		$flexify_mult = flexify_get_retina_multiplier();
		echo get_avatar( get_the_author_meta( 'user_email' ), 120 * $flexify_mult );
		?>
	</div>

	<h4 class="author_title"<?php
		if ( flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) ) ) {
			?> itemprop="name"<?php
		}
	?>><span class="fn"><?php the_author(); ?></span></h4>

	<?php
	$flexify_author_description = get_the_author_meta( 'description' );
	if ( ! empty( $flexify_author_description ) ) {
		?>
		<div class="author_bio"<?php
			if ( flexify_is_on( flexify_get_theme_option( 'seo_snippets' ) ) ) {
				?> itemprop="description"<?php
			}
		?>><?php echo wp_kses( wpautop( $flexify_author_description ), 'flexify_kses_content' ); ?></div>
		<?php
	}
	?>

	<div class="author_details">
		<span class="author_posts_total">
			<?php
			$flexify_posts_total = count_user_posts( get_the_author_meta('ID'), 'post' );	// get_the_author_posts() return posts number by post_type from first post in the result
			if ( $flexify_posts_total > 0 ) {
				// Translators: Add the author's posts number to the message
				echo wp_kses( sprintf( _n( '%s article published', '%s articles published', $flexify_posts_total, 'flexify' ),
										'<span class="author_posts_total_value">' . number_format_i18n( $flexify_posts_total ) . '</span>'
								 		),
							'flexify_kses_content'
							);
			} else {
				esc_html_e( 'No posts published.', 'flexify' );
			}
			?>
		</span><?php
			ob_start();
			do_action( 'flexify_action_user_meta', 'author-page' );
			$flexify_socials = ob_get_contents();
			ob_end_clean();
			flexify_show_layout( $flexify_socials,
				'<span class="author_socials"><span class="author_socials_caption">' . esc_html__( 'Follow:', 'flexify' ) . '</span>',
				'</span>'
			);
		?>
	</div>

</div>
