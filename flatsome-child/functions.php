<?php
/* ADD custom theme functions here  */

// include wholesale-pricing
require_once 'woo-wholesale-pricing/index.php';

// Set a minimum dollar amount per order
add_action( 'woocommerce_check_cart_items', 'spyr_set_min_total' );
function spyr_set_min_total() {
	// Only run in the Cart or Checkout pages
	if( is_cart() || is_checkout() ) {
		global $woocommerce;

		// Set minimum cart total
		$minimum_cart_total = 70;

		// Total we are going to be using for the Math
		// This is before taxes and shipping charges
		$total = WC()->cart->subtotal;
		
		// Compare values and add an error is Cart's total
	    // happens to be less than the minimum required before checking out.
		// Will display a message along the lines of
		// A Minimum of 10 USD is required before checking out. (Cont. below)
		// Current cart total: 6 USD 
		if( $total <= $minimum_cart_total  ) {
			// Display our error message
			wc_add_notice( sprintf( '<strong>A Minimum of %s %s is required before checking out.</strong>'
				.'<br />Current cart\'s total: %s %s',
				$minimum_cart_total,
				get_option( 'woocommerce_currency'),
				$total,
				get_option( 'woocommerce_currency') ),
			'error' );
		}
	}
}

function is_product_nohide() {
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
            return true;
        } else {
            return false;
        }

}

// list product
// function woocommerce_template_loop_price() {
//     if ( is_user_logged_in() && is_product_nohide() )
//         woocommerce_get_template( 'loop/price.php' );
// }

// Remove custom add to cart button
//if ( !is_user_logged_in() ) {
	add_action( 'after_setup_theme', 'wpdev_170663_remove_parent_theme_stuff', 0 );
//}

function wpdev_170663_remove_parent_theme_stuff() {
    remove_action('woocommerce_after_shop_loop_item_title', 'flatsome_add_button_in_grid', 30);
}

// Remove standart add to cart button
// function woocommerce_template_loop_add_to_cart() {
//     if ( is_user_logged_in() )
//         woocommerce_get_template( 'loop/add-to-cart.php' );
// }

// single product 
// function woocommerce_template_single_price() {
//     if ( is_user_logged_in() )
//         woocommerce_get_template( 'single-product/price.php' );
// }

function woocommerce_template_single_add_to_cart() {
    global $product;
     if ( is_user_logged_in() )
        do_action( 'woocommerce_' . $product->product_type . '_add_to_cart'  );
}


// Show Add To Cart Button in Grid
function flatsome_add_button_in_grid_custom(){
global $flatsome_opt;
    if($flatsome_opt['add_to_cart_icon'] == "button") {
        global $product;
        echo woocommerce_quantity_input( array(), $product, false );
        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
            sprintf( '<div class="add-to-cart-button"><a href="%s" rel="nofollow" data-quantity="1" data-product_id="%s" class="%s %s product_type_%s button alt-button small clearfix">%s</a></div>',
                esc_url( $product->add_to_cart_url() ),
                esc_attr( $product->id ),
                esc_attr( $product->is_type( 'variable' ) ? '' : 'ajax_add_to_cart'),
                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                esc_attr( $product->product_type ),
                esc_html( $product->add_to_cart_text() )
            ),
        $product );
     }
}
if ( is_user_logged_in() ) {
	add_action('woocommerce_after_shop_loop_item_title', 'flatsome_add_button_in_grid_custom', 31);
}


function custom_js_child () { 
	?>
	<script type="text/javascript">

	jQuery(document).ready(function($){

		$('.custom_info .quantity').addClass('buttons_added').append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />');

	    $('.custom_info .quantity').on('click', '.plus', function(e) {
	        $input = $(this).prev('input.qty');
	        var val = parseInt($input.val());
	        $input.val( val+1 ).change();
	        $input.parent().next('div.add-to-cart-button').find('.ajax_add_to_cart').data('quantity',  $input.val());
	    });

	    $('.custom_info .quantity').on('click', '.minus', 
	        function(e) {
	        $input = $(this).next('input.qty');
	        var val = parseInt($input.val());
	        if (val > 0) {
	            $input.val( val-1 ).change();
	        }
	        $input.parent().next('div.add-to-cart-button').find('.ajax_add_to_cart').data('quantity',  $input.val()); 
	    });

	});
	</script>
<?php
} 
add_action( 'wp_footer', 'custom_js_child', 50 );





// ! fix bug get price decimal
 function site_woocommerce_get_price($price, $product) {
	$decimal_sep = wp_specialchars_decode(stripslashes(get_option('woocommerce_price_decimal_sep')), ENT_QUOTES);
	if ($decimal_sep != '.')
	$price = str_replace($decimal_sep, '.', $price);
return $price;
}
add_filter('woocommerce_get_price', 'site_woocommerce_get_price', 10, 2);

function site_woocommerce_get_price2($price, $product) {
    $decimal_sep = wp_specialchars_decode(stripslashes(get_option('woocommerce_price_decimal_sep')), ENT_QUOTES);

    if ($decimal_sep != '.') {
        $thousands_sep = wp_specialchars_decode(stripslashes(get_option( 'woocommerce_price_thousand_sep')), ENT_QUOTES);

        $price = str_replace($thousands_sep, '', $price);
        $price = str_replace($decimal_sep, '.', $price);
    }

    return $price;
}
//add_filter('woocommerce_get_price', 'site_woocommerce_get_price2', 10, 2);