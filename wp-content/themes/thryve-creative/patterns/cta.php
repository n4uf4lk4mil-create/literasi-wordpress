<?php
/**
 * Title: CTA
 * Slug: thryve-creative/cta
 * Categories: thryve-creative
 * Block Types: core/post-content
 * Post Types: page, wp_template
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":726,"dimRatio":70,"overlayColor":"primary","isUserOverlayColor":true,"minHeight":550,"sizeSlug":"full","metadata":{"name":"CTA"},"className":"thryve-responsive-spacing wow animate__animated animate__fadeInUp","style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"40px","bottom":"40px"},"margin":{"top":"0","bottom":"0"}},"border":{"radius":{"topLeft":"0px","topRight":"0px","bottomLeft":"0px","bottomRight":"0px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover thryve-responsive-spacing wow animate__animated animate__fadeInUp" style="border-top-left-radius:0px;border-top-right-radius:0px;border-bottom-left-radius:0px;border-bottom-right-radius:0px;margin-top:0;margin-bottom:0;padding-top:40px;padding-right:20px;padding-bottom:40px;padding-left:20px;min-height:550px"><img class="wp-block-cover__image-background wp-image-726 size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-primary-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:heading {"className":"is-style-default thryve-heading","style":{"typography":{"fontSize":"56px","fontStyle":"normal","fontWeight":"700","lineHeight":"1.1","textAlign":"center"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"white"} -->
<h2 class="wp-block-heading has-text-align-center is-style-default thryve-heading has-white-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;font-size:56px;font-style:normal;font-weight:700;line-height:1.1"><?php echo esc_html__( 'Boost Your Business with Expert Consulting.', 'thryve-creative' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"800px"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|40"}},"typography":{"textAlign":"center"}},"fontSize":"medium"} -->
<p class="has-text-align-center has-medium-font-size" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words.', 'thryve-creative' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"className":"thryve-no-mobile","style":{"spacing":{"blockGap":{"left":"0"},"margin":{"top":"0"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons thryve-no-mobile" style="margin-top:0"><!-- wp:button {"backgroundColor":"primary","textColor":"white","className":"thryve-btn-has-arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"border":{"width":"1px"}},"borderColor":"white"} -->
<div class="wp-block-button thryve-btn-has-arrow"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color has-border-color has-white-border-color wp-element-button" href="#" style="border-width:1px"><?php echo esc_html__( 'Contact Us Now', 'thryve-creative' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->