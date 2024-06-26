<?php
 
	global $post, $product, $flatsome_opt;

    //dgamoni visibility login user
    $zstore_product_hide = get_field('zstore_product_hide', $post->ID);
    if ( $zstore_product_hide && !is_product_nohide()) {
            return;
    }

	// Get category permalink
	$permalinks 	= get_option( 'woocommerce_permalinks' );
	$category_slug 	= empty( $permalinks['category_base'] ) ? _x( 'product-category', 'slug', 'woocommerce' ) : $permalinks['category_base'];
 
?>

<?php
    /**
     * woocommerce_before_single_product hook
     *
     * @hooked woocommerce_show_messages - 10
     */
     do_action( 'woocommerce_before_single_product' );
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>	
    
<div class="row">

        <div id="product-sidebar" class="large-3 columns product-sidebar-left hide-for-small">     
            <div class="inner sidebar-inner">   
                 <?php dynamic_sidebar('product-sidebar'); ?>
            </div>
        </div><!-- end large-3 sidebar -->


        <div class="large-9 columns">

        <div class="row">
        <div class="large-4 columns product-gallery">        
        
            <?php
                /**
                 * woocommerce_show_product_images hook
                 *
                 * @hooked woocommerce_show_product_sale_flash - 10
                 * @hooked woocommerce_show_product_images - 20
                 */
                do_action( 'woocommerce_before_single_product_summary' );
            ?>
        
        </div><!-- end large-7 - product-gallery -->
        
        <div class="product-info large-8 small-12 columns left" style="position:relative;">
                <?php
                    /**
                     * woocommerce_single_product_summary hook
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked ProductShowReviews() (inc/template-tags.php) - 15
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     */
                    do_action( 'woocommerce_single_product_summary' );
                ?>
        
        </div><!-- end product-info large-5 -->
        </div> <!-- .row -->

    
<div class="row">
    <div class="large-12 columns">
        <div class="product-details <?php echo $flatsome_opt['product_display']; ?>-style">
               <div class="row">

                    <div class="large-12 columns ">
                    <?php woocommerce_get_template('single-product/tabs/tabs.php'); ?>
                    </div><!-- .large-9 -->
                
               </div><!-- .row -->
        </div><!-- .product-details-->

        <hr/><!-- divider -->
    </div><!-- .large-12 -->
</div><!-- .row -->


    <div class="related-product">
        <?php
            /**
             * woocommerce_after_single_product_summary hook
             *
             * @hooked woocommerce_output_related_products - 20
             */

            do_action( 'woocommerce_after_single_product_summary' );

        ?>
    </div><!-- related products -->

    </div><!-- large-9 -->
    </div><!-- row -->
 


</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

