<?php
/**
 * Title: Gallery
 * Slug: thryve-creative/gallery
 * Categories: thryve-creative
 * Block Types: core/post-content
 * Post Types: page, wp_template
 */
?>
<!-- wp:group {"metadata":{"name":"Gallery"},"className":"thryve-responsive-spacing wow animate__animated animate__fadeInUp","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"backgroundColor":"accent","layout":{"type":"constrained"}} -->
<div class="wp-block-group thryve-responsive-spacing wow animate__animated animate__fadeInUp has-accent-background-color has-background" style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)"><!-- wp:group {"className":"thryve-section-title-wrapper","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|30"}}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center","justifyContent":"center"}} -->
<div class="wp-block-group thryve-section-title-wrapper" style="padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:heading {"className":"is-style-default thryve-heading","style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.2","fontSize":"48px","textAlign":"center"},"spacing":{"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|black"}}}},"textColor":"black"} -->
<h2 class="wp-block-heading has-text-align-center is-style-default thryve-heading has-black-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;font-size:48px;font-style:normal;font-weight:700;line-height:1.2"><?php echo esc_html__( 'Our Latest Work', 'thryve-creative' ); ?></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:gallery {"columns":3,"linkTo":"none","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
<figure class="wp-block-gallery has-nested-images columns-3 is-cropped"><!-- wp:image {"id":846,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"77px","topRight":"77px","bottomLeft":"77px","bottomRight":"77px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/contact.jpg" alt="" class="wp-image-846" style="border-top-left-radius:77px;border-top-right-radius:77px;border-bottom-left-radius:77px;border-bottom-right-radius:77px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":41,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" alt="" class="wp-image-41" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":46,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"77px","topRight":"77px","bottomLeft":"77px","bottomRight":"77px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/about.jpg" alt="" class="wp-image-46" style="border-top-left-radius:77px;border-top-right-radius:77px;border-bottom-left-radius:77px;border-bottom-right-radius:77px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":51,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" alt="" class="wp-image-51" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":330,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"77px","topRight":"77px","bottomLeft":"77px","bottomRight":"77px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/contact.jpg" alt="" class="wp-image-330" style="border-top-left-radius:77px;border-top-right-radius:77px;border-bottom-left-radius:77px;border-bottom-right-radius:77px"/></figure>
<!-- /wp:image -->

<!-- wp:image {"id":199,"sizeSlug":"large","linkDestination":"none","style":{"border":{"radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}}}} -->
<figure class="wp-block-image size-large has-custom-border"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/about.jpg" alt="" class="wp-image-199" style="border-top-left-radius:20px;border-top-right-radius:20px;border-bottom-left-radius:20px;border-bottom-right-radius:20px"/></figure>
<!-- /wp:image --></figure>
<!-- /wp:gallery --></div>
<!-- /wp:group -->