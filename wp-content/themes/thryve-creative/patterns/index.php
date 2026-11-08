<?php
/**
 * Title: Index
 * Slug: thryve-creative/index
 * Categories: thryve-creative
 * Insert: no
 */
?>
<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<main class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:group {"metadata":{"patternName":"thryve-creative/index","name":"Index","categories":["thryve-creative"]},"style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"default"}} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0"><!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg","id":51,"dimRatio":70,"overlayColor":"black","isUserOverlayColor":true,"minHeight":350,"contentPosition":"center center","sizeSlug":"full","className":"responsive-image","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"right":"20px","left":"20px","top":"40px","bottom":"40px"}}},"layout":{"type":"default"}} -->
<div class="wp-block-cover responsive-image" style="margin-top:0;margin-bottom:0;padding-top:40px;padding-right:20px;padding-bottom:40px;padding-left:20px;min-height:350px"><img class="wp-block-cover__image-background wp-image-51 size-full" alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/banner.jpg" data-object-fit="cover"/><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim-70 has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"spacing":{"padding":{"right":"0px","left":"0px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-right:0px;padding-left:0px"><!-- wp:heading {"level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textAlign":"center"}},"fontSize":"xx-large"} -->
<h1 class="wp-block-heading has-text-align-center has-xx-large-font-size" style="font-style:normal;font-weight:600">Our Blog</h1>
<!-- /wp:heading --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"className":"thryve-responsive-spacing","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"80px","bottom":"80px","left":"20px","right":"20px"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group thryve-responsive-spacing" style="margin-top:0;margin-bottom:0;padding-top:80px;padding-right:20px;padding-bottom:80px;padding-left:20px"><!-- wp:query {"queryId":7,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"taxQuery":null,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"className":"thryve-has-effect","style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"},"blockGap":"var:preset|spacing|10"},"border":{"radius":{"topLeft":"6px","topRight":"6px","bottomLeft":"6px","bottomRight":"6px"}}},"backgroundColor":"accent","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-group thryve-has-effect has-accent-background-color has-background" style="border-top-left-radius:6px;border-top-right-radius:6px;border-bottom-left-radius:6px;border-bottom-right-radius:6px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"black","isUserOverlayColor":true,"minHeight":250,"style":{"border":{"radius":{"topLeft":"8px","topRight":"8px","bottomLeft":"8px","bottomRight":"8px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-cover" style="border-top-left-radius:8px;border-top-right-radius:8px;border-bottom-left-radius:8px;border-bottom-right-radius:8px;min-height:250px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"placeholder":"Write title…","style":{"typography":{"textAlign":"center"}},"fontSize":"large"} -->
<p class="has-text-align-center has-large-font-size"></p>
<!-- /wp:paragraph --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-author-name /-->

<!-- wp:post-date {"metadata":{"bindings":{"datetime":{"source":"core/post-data","args":{"field":"date"}}}}} /--></div>
<!-- /wp:group -->

<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontSize":"21px"}}} /-->

<!-- wp:post-excerpt {"excerptLength":12} /-->

<!-- wp:read-more {"content":"Read More","style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"var:preset|spacing|10","right":"var:preset|spacing|10"}},"border":{"width":"0px","style":"none","radius":{"topLeft":"6px","topRight":"6px","bottomLeft":"6px","bottomRight":"6px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"primary","textColor":"white"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"60px","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
<div style="margin-top:0;margin-bottom:0;height:60px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"paginationArrow":"arrow","layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p><?php echo esc_html__( 'No results', 'thryve-creative' ); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->