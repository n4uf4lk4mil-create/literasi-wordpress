<?php
/**
 * Title: Footer
 * Slug: thryve-creative/footer
 * Categories: footer, thryve-creative
 * Block Types: core/template-part/footer
 * Description: A footer section with a colophon and 4 columns.
 */
?>
<!-- wp:group {"metadata":{"patternName":"thryve-creative/footer","name":"Footer","description":"A footer section with a colophon and 4 columns.","categories":["footer","thryve-creative"]},"align":"wide","style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"var:preset|spacing|40","bottom":"var:preset|spacing|40"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"accent","textColor":"white","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide has-white-color has-accent-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--40);padding-right:20px;padding-bottom:var(--wp--preset--spacing--40);padding-left:20px"><!-- wp:group {"style":{"border":{"bottom":{"color":"var:preset|color|contrast","width":"1px"}},"spacing":{"padding":{"right":"0","bottom":"var:preset|spacing|20"}}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group" style="border-bottom-color:var(--wp--preset--color--contrast);border-bottom-width:1px;padding-right:0;padding-bottom:var(--wp--preset--spacing--20)"><!-- wp:social-links {"iconColor":"btn-hover-bg","iconColorValue":"#0f032f","iconBackgroundColor":"white","iconBackgroundColorValue":"#ffffff","size":"has-normal-icon-size","className":"is-style-default"} -->
<ul class="wp-block-social-links has-normal-icon-size has-icon-color has-icon-background-color is-style-default"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Find More","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true,"style":{"border":{"width":"0px","style":"none","radius":{"topLeft":"20px","topRight":"20px","bottomLeft":"20px","bottomRight":"20px"}},"spacing":{"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fixed","flexSize":"280px"},"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"typography":{"fontSize":"14px"}},"backgroundColor":"primary","textColor":"white"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"className":"footer-wrapper wow animate__animated animate__fadeInUp","style":{"spacing":{"padding":{"top":"80px","bottom":"80px"},"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group footer-wrapper wow animate__animated animate__fadeInUp" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);padding-top:80px;padding-bottom:80px"><!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"style":{"dimensions":{"minHeight":""},"layout":{"selfStretch":"fit","flexSize":null},"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:site-title {"style":{"typography":{"fontSize":"28px","fontStyle":"normal","fontWeight":"700","letterSpacing":"-1px"},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base","fontFamily":"inter-tight"} /-->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"margin":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|20"},"padding":{"bottom":"var:preset|spacing|20","top":"0"}},"border":{"bottom":{"width":"0px","style":"none"},"top":[],"right":[],"left":[]}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="border-bottom-style:none;border-bottom-width:0px;margin-top:var(--wp--preset--spacing--10);margin-bottom:var(--wp--preset--spacing--20);padding-top:0;padding-bottom:var(--wp--preset--spacing--20)"><?php echo esc_html__( 'Semper tincidunt in dui nec cursus feugiat si venenatis auctor conubia dolor dictumst non pellentesque libero sem senectus', 'thryve-creative' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"margin":{"bottom":"0"}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="margin-bottom:0"><?php echo esc_html__( 'Email: Example@example.com', 'thryve-creative' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"base","fontSize":"small"} -->
<p class="has-base-color has-text-color has-link-color has-small-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'Phone: +01-123-4567-123', 'thryve-creative' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"60%"} -->
<div class="wp-block-column" style="flex-basis:60%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"top"}} -->
<div class="wp-block-group"><!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"16px","textTransform":"uppercase"},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-link-color" style="font-size:16px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( 'About', 'thryve-creative' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:navigation {"textColor":"base","overlayMenu":"never","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","layout":{"type":"flex","orientation":"vertical"},"ariaLabel":"About"} -->
<!-- wp:navigation-link {"label":"Team","url":"#"} /-->

<!-- wp:navigation-link {"label":"History","url":"#"} /-->

<!-- wp:navigation-link {"label":"Careers","url":"#"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"16px","textTransform":"uppercase"},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-link-color" style="font-size:16px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( 'Quick Links', 'thryve-creative' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"},"elements":{"link":{"color":{"text":"var:preset|color|base-2"}}}},"textColor":"base-2","layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group has-base-2-color has-text-color has-link-color"><!-- wp:navigation {"textColor":"base","overlayMenu":"never","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","layout":{"type":"flex","orientation":"vertical"},"ariaLabel":"Social Media"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch"}} -->
<div class="wp-block-group"><!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","fontSize":"16px","textTransform":"uppercase"},"layout":{"selfStretch":"fit","flexSize":null},"elements":{"link":{"color":{"text":"var:preset|color|base"}}}},"textColor":"base"} -->
<h2 class="wp-block-heading has-base-color has-text-color has-link-color" style="font-size:16px;font-style:normal;font-weight:600;text-transform:uppercase"><?php echo esc_html__( 'Privacy', 'thryve-creative' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex","orientation":"vertical"}} -->
<div class="wp-block-group"><!-- wp:navigation {"textColor":"base","overlayMenu":"never","style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"blockGap":"var:preset|spacing|10"}},"fontSize":"small","layout":{"type":"flex","orientation":"vertical"},"ariaLabel":"Privacy"} -->
<!-- wp:navigation-link {"label":"Privacy Policy","url":"#"} /-->

<!-- wp:navigation-link {"label":"Terms and Conditions","url":"#"} /-->

<!-- wp:navigation-link {"label":"Contact Us","url":"#"} /-->
<!-- /wp:navigation --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"wide","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide" style="margin-top:0;margin-bottom:0"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|10","bottom":"var:preset|spacing|10"}},"border":{"top":{"color":"#303030","width":"1px"},"right":[],"bottom":[],"left":[]}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"center"}} -->
<div class="wp-block-group alignwide" style="border-top-color:#303030;border-top-width:1px;padding-top:var(--wp--preset--spacing--10);padding-bottom:var(--wp--preset--spacing--10)"><!-- wp:paragraph {"className":"has-base-2-color has-text-color has-link-color","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textAlign":"center"}},"textColor":"primary","fontSize":"small"} -->
<p class="has-text-align-center has-base-2-color has-text-color has-link-color has-primary-color has-small-font-size">
		<?php echo esc_html__( 'Designed with ', 'thryve-creative' ); ?> <a href="<?php echo esc_url('https://wordpress.org'); ?>" rel="nofollow"> <?php echo esc_html__( 'WordPress', 'thryve-creative' ); ?></a>		</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"thryvewp-go-to-top"} -->
<p class="thryvewp-go-to-top"></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->