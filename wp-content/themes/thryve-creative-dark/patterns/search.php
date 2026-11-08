<?php
 /**
  * Title: Search
  * Slug: thryve-creative-dark/search
  * Inserter: no
  *  Description: Search result page.
  */
?>
<!-- wp:group {"className":"thryve-responsive-spacing","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group thryve-responsive-spacing" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/banner.jpg","id":352,"dimRatio":70,"overlayColor":"black","isUserOverlayColor":true,"minHeight":350,"contentPosition":"center center","sizeSlug":"full","className":"responsive-image","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"20px","left":"20px","top":"40px","bottom":"40px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover responsive-image" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:20px;padding-bottom:40px;padding-left:20px;min-height:350px"><img class="wp-block-cover__image-background wp-image-352 size-full" alt="" src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:0px;padding-left:0px"><!-- wp:query-title {"type":"search","textAlign":"center"} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"className":"responsive-spacing","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"80px","bottom":"80px","left":"20px","right":"20px"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group responsive-spacing" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:20px;padding-bottom:80px;padding-left:20px"><!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"40px","left":"60px"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"width":"66.66%"} -->
<div class="wp-block-column" style="flex-basis:66.66%"><!-- wp:query {"queryId":0,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"textColor":"white","layout":{"type":"grid","columnCount":null,"minimumColumnWidth":"18rem"}} -->
<!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"black","isUserOverlayColor":true,"contentPosition":"bottom center","style":{"border":{"radius":{"topLeft":"10px","topRight":"10px","bottomLeft":"10px","bottomRight":"10px"},"color":"#666666","width":"1px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover has-custom-content-position is-position-bottom-center has-border-color" style="border-color:#666666;border-width:1px;border-top-left-radius:10px;border-top-right-radius:10px;border-bottom-left-radius:10px;border-bottom-right-radius:10px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:post-title {"level":3,"isLink":true,"textColor":"white"} /-->

<!-- wp:post-excerpt {"excerptLength":18,"style":{"spacing":{"margin":{"top":"12px","bottom":"0"}}},"fontSize":"small"} /--></div></div>
<!-- /wp:cover -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"60px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"paginationArrow":"arrow"} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results.","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<p class="has-text-align-center" style="margin-top:0;margin-bottom:0"><?php echo esc_html__( 'No Results Found', 'thryve-creative-dark' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"33.33%"} -->
<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:template-part {"slug":"sidebar","area":"uncategorized"} /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->