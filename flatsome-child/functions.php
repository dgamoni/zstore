<?php
/* ADD custom theme functions here  */



// list product
function woocommerce_template_loop_price() {
    if ( is_user_logged_in() )
        woocommerce_get_template( 'loop/price.php' );
}

// Remove custom add to cart button
if ( !is_user_logged_in() ) {
	add_action( 'after_setup_theme', 'wpdev_170663_remove_parent_theme_stuff', 0 );
}

function wpdev_170663_remove_parent_theme_stuff() {
    remove_action('woocommerce_after_shop_loop_item_title', 'flatsome_add_button_in_grid', 30);
}

// Remove standart add to cart button
// function woocommerce_template_loop_add_to_cart() {
//     if ( is_user_logged_in() )
//         woocommerce_get_template( 'loop/add-to-cart.php' );
// }

// single product 
function woocommerce_template_single_price() {
    if ( is_user_logged_in() )
        woocommerce_get_template( 'single-product/price.php' );
}

function woocommerce_template_single_add_to_cart() {
    global $product;
    if ( is_user_logged_in() )
        do_action( 'woocommerce_' . $product->product_type . '_add_to_cart'  );
}


