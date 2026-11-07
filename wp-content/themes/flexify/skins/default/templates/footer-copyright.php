<?php
/**
 * The template to display the copyright info in the footer
 *
 * @package FLEXIFY
 * @since FLEXIFY 1.0.10
 */

// Copyright area
?> 
<div class="footer_copyright_wrap">
	<div class="footer_copyright_inner">
		<div class="flexify_content_wrap">
			<div class="copyright_text">
				<?php
					$flexify_copyright = flexify_get_theme_option( 'copyright' );
					if ( ! empty( $flexify_copyright ) ) {
						// Replace {{Y}} or {Y} with the current year
						$flexify_copyright = str_replace( array( '{{Y}}', '{Y}' ), date( 'Y' ), $flexify_copyright );
						// Replace {{...}} and ((...)) on the <i>...</i> and <b>...</b>
						$flexify_copyright = flexify_prepare_macros( $flexify_copyright );
						// Display copyright
						echo wp_kses( nl2br( $flexify_copyright ), 'flexify_kses_content' );
					}
				?>
			</div>
		</div>
	</div>
</div>