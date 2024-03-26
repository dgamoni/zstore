<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="quantity">
	<input type="number" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
</div>

<!-- new -->
<!-- <div class="newquantity quantity">
	<input type="button" value="-" class="minus">
		<input type="number" step="<?php echo esc_attr( $step ); ?>" min="<?php echo esc_attr( $min_value ); ?>" max="<?php echo esc_attr( $max_value ); ?>" name="<?php echo esc_attr( $input_name ); ?>" value="<?php echo esc_attr( $input_value ); ?>" title="<?php echo esc_attr_x( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty text" size="4" pattern="<?php echo esc_attr( $pattern ); ?>" inputmode="<?php echo esc_attr( $inputmode ); ?>" />
	<input type="button" value="+" class="plus">
</div> -->

<script>
// (function($) {
//     // function createQTYButtons_new(target) {
//     	console.log('createQTYButtons_new');
//         // Quantity buttons
//         var $target = $('.newquantity.quantity');



//          $target.on('click', '.plus, .minus', function() {
//             // Get values
//             var $qty = $(this).closest('.quantity').find('.qty'),
//                 currentVal = parseFloat($qty.val()),
//                 max = parseFloat($qty.attr('max')),
//                 min = parseFloat($qty.attr('min')),
//                 step = $qty.attr('step');
//             // Format values
//             if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
//             if (max === '' || max === 'NaN') max = '';
//             if (min === '' || min === 'NaN') min = 0;
//             if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
//             // Change the value
//             if ($(this).is('.plus')) {
//                 if (max && (max == currentVal || currentVal > max)) {
//                     $qty.val(max);
//                 } else {
//                     $qty.val(currentVal + parseFloat(step));
//                 }
//             } else {
//                 if (min && (min == currentVal || currentVal < min)) {
//                     $qty.val(min);
//                 } else if (currentVal > 0) {
//                     $qty.val(currentVal - parseFloat(step));
//                 }
//             }
//             // Trigger change event
//             $qty.trigger('change');
//         });
//     // }
//     // jQuery plugin.
//     // $.fn.addQty = function() {
//     //     return this.each(function(i, el) {
//     //         createQTYButtons_new(el);
//     //     });
//     // }
// })(jQuery);	

</script>
