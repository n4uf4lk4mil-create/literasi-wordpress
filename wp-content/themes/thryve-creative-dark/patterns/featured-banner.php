<?php
/**
 * Title: Banner Second
 * Slug: thryve-creative-dark/featured-banner
 * Categories: thryve-creative-dark
 * Description: A hero section with a title, a paragraph, a CTA button, and an image.
 * Block Types: core/post-content
 * Post Types: page, wp_template
 */
?>
<!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/banner.jpg","id":762,"dimRatio":90,"isUserOverlayColor":true,"minHeight":630,"customGradient":"linear-gradient(135deg,rgb(0,0,0) 0%,rgb(13,11,11) 100%)","sizeSlug":"full","metadata":{"name":"Banner Second","patternName":"thryve-creative-dark/featured-banner","description":"A hero section with a title, a paragraph, a CTA button, and an image.","categories":["thryve-creative-dark"]},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"0","right":"0"},"blockGap":"0"},"border":{"width":"0px","style":"none"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-style:none;border-width:0px;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:0;padding-bottom:var(--wp--preset--spacing--50);padding-left:0;min-height:630px"><img class="wp-block-cover__image-background wp-image-762 size-full" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-background-dim-90 has-background-dim wp-block-cover__gradient-background has-background-gradient" style="background:linear-gradient(135deg,rgb(0,0,0) 0%,rgb(13,11,11) 100%)"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained","contentSize":"920px"}} -->
<div class="wp-block-group"><!-- wp:heading {"className":"is-style-default","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"62px","fontStyle":"normal","fontWeight":"700","textAlign":"center"}},"textColor":"white"} -->
<h2 class="wp-block-heading has-text-align-center is-style-default has-white-color has-text-color has-link-color" style="font-size:62px;font-style:normal;font-weight:700"><?php echo esc_html__( 'Secure Your Financial Future', 'thryve-creative-dark' ); ?><br><?php echo esc_html__( 'with Confidence', 'thryve-creative-dark' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"textAlign":"center"}}} -->
<p class="has-text-align-center"><?php echo esc_html__( "It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.", 'thryve-creative-dark' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|10"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group" style="padding-top:var(--wp--preset--spacing--10)"><!-- wp:image {"id":867,"sizeSlug":"full","linkDestination":"none","style":{"layout":{"selfStretch":"fixed","flexSize":"150px"},"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}}} -->
<figure class="wp-block-image size-full has-custom-border"><img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/team-1-custom.png" alt="" class="wp-image-867" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"14px"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white"} -->
<p class="has-white-color has-text-color has-link-color" style="font-size:14px"><strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-white-color"><?php echo esc_html__( 'Trusted by 125K+', 'thryve-creative-dark' ); ?><br></mark></strong><mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-white-color"><?php echo esc_html__( 'Satisfied Clients', 'thryve-creative-dark' ); ?></mark></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"thryve-no-mobile","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|30"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons thryve-no-mobile" style="margin-top:var(--wp--preset--spacing--30)"><!-- wp:button {"backgroundColor":"white","textColor":"black","style":{"elements":{"link":{"color":{"text":"var:preset|color|black"}}},"border":{"width":"0px","style":"none"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-black-color has-white-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-style:none;border-width:0px"><?php echo esc_html__( 'Request Consultation', 'thryve-creative-dark' ); ?></a></div>
<!-- /wp:button -->

<!-- wp:button {"backgroundColor":"primary","textColor":"white","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"border":{"width":"0px","style":"none"}}} -->
<div class="wp-block-button"><a class="wp-block-button__link has-white-color has-primary-background-color has-text-color has-background has-link-color wp-element-button" href="#" style="border-style:none;border-width:0px"><?php echo esc_html__( 'View Portfolio', 'thryve-creative-dark' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->