<?php
 
	global $post, $product, $flatsome_opt;

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

 <?php //debug
         global $product;
         //var_dump($product->get_price_html());
         // $variations = $product->get_available_variations();
         // var_dump( $variations );

// $available_variations = $product->get_available_variations();
 
// #Step 2: Get product variation id
// $variation_id=$available_variations[1]['variation_id']; // Getting the variable id of just the 1st product. You can loop $available_variations to get info about each variation.
 
// #Step 3: Create the variable product object
// $variable_product1= new WC_Product_Variation( $variation_id );
 
// #Step 4: You have the data. Have fun :)
// $regular_price = $variable_product1 ->regular_price;

 
// echo $regular_price;


    //         $lowestvar = array();
    //         foreach ($variations as $variation){
    //             $lowestvar[] = get_post_meta($variation['variation_id'],'_wholesale_price', true);
    //             $lowestnor[] = get_post_meta($variation['variation_id'],'_price', true);
    //             array_multisort($lowestvar, SORT_ASC);
    //             array_multisort($lowestnor, SORT_ASC);
    //         }
    // // _wholesale_price
    //         $lrrp = min($lowestnor);
    //         $hrrp = max($lowestnor);
    //         $lwrrp = min($lowestvar);
    //         $hwrrp = max($lowestvar);
    //         //var_dump($lowestnor);
    //         //var_dump($lowestvar);



    // global $wpdb;
    // $table_name = $wpdb->prefix . "options";    
    // $results = $wpdb->get_results( 'SELECT * FROM '.$table_name.' WHERE option_value = "enable_role"' );
    // foreach ($results as $result){
    //     //$ifwholesale = str_replace("wholesale_customer","wholesale",$result->option_name);
    //     //$finaldata = str_replace("wwo_enable_","_",$ifwholesale).'_price';
    //     //$finalno = str_replace("wwo_enable_","",$ifwholesale).'_price';

    //     var_dump($result->option_name);
    //     var_dump(woo_get_enabled_user_role());

    //     if($result->option_name == woo_get_enabled_user_role()){
    //         echo 'yes';
    //         // var_dump($result->option_name);
    //         // var_dump(woo_get_enabled_user_role());
    //     } else {
    //         echo 'no';
    //                     // var_dump($result->option_name);
    //         //var_dump(woo_get_enabled_user_role());
    //     }
    // }
         // global $post;
         // var_dump( get_post_meta($post->ID)) ;

    //         global $wpdb;
    // $table_name = $wpdb->prefix . "options";    
    // $results = $wpdb->get_results( 'SELECT * FROM '.$table_name.' WHERE option_value = "enable_role"' );
    // foreach ($results as $result){
    //     $ifwholesale = str_replace("wholesale_customer","wholesale",$result->option_name);
    //     var_dump($result->option_name);
    //     $ifwholesale = str_replace("wholesale_customer","wholesale",$result->option_name);
    //     //var_dump($ifwholesale );
    //             $finaldata = str_replace("wwo_enable_","_",$ifwholesale).'_price'; // _wholesale_price
    //     // var_dump($finaldata);     
    //     $finalno = str_replace("wwo_enable_","",$ifwholesale).'_price'; //wholesale_price
    //     //var_dump($finalno);
    // }


    $user = wp_get_current_user();
    //var_dump($user->roles);
    $role =  implode($user->roles);
    //var_dump($role);
    global $wpdb;
    $table_name = $wpdb->prefix . "options";    
    $results = $wpdb->get_results( 'SELECT * FROM '.$table_name.' WHERE option_value = "enable_role"' );
    $ifwholesale = array();
        foreach ($results as $result){
                $ifwholesale[] = str_replace("wwo_enable_","",$result->option_name);
        }
        //var_dump($ifwholesale);

        if ( in_array( $role, (array) $ifwholesale ) ) {
            echo ' yes';
        } else {
            echo 'no';
        }
 ?>

