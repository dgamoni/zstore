<?php
/**
 * Show a grid of thumbnails
 */
?>
<ul class="brand-thumbnails">
	
	<?php foreach ( $brands as $index => $brand ) : 


		// get product_hide = 0 in current cat $cat->term_id
			$brand_hide = true;
		 	$args_ = array(
		 		'post_type' => 'product',
		 		// 'meta_key'       => 'zstore_product_hide',
		 		// 'meta_value'     => '0',
		 		'meta_query'     => array(
		 			array(
		 				'key' => 'zstore_product_hide',
		 				'value' => '0',
		 			),
		 		),
		 		'tax_query' => array(
		 			array(
		 				'taxonomy'         => 'product_brand',
		 				'field'            => 'id',
		 				'terms'            =>  array($brand->term_id),
		 			)
		 		),
		 	);
		 
	 		$query = new WP_Query( $args_ );
	        if ( $query->have_posts() ) :
	        	setup_postdata( $post );
                while ( $query->have_posts() ) : $query->the_post();
						// var_dump($query->post->post_title);
						// var_dump(get_field('zstore_product_hide', $query->post->ID));
                endwhile;
            else :
            	if (!is_product_nohide()) {
            		$brand_hide = false;
            	}
            	//var_dump($brand->name);
            endif;
            wp_reset_postdata();
            wp_reset_query();
        // end product_hide
		
		$thumbnail = get_brand_thumbnail_url( $brand->term_id, apply_filters( 'woocommerce_brand_thumbnail_size', 'brand-thumb' ) );
		
		if ( ! $thumbnail )
			$thumbnail = woocommerce_placeholder_img_src();
		
		$class = '';
		
		if ( $index == 0 || $index % $columns == 0 )
			$class = 'first';
		elseif ( ( $index + 1 ) % $columns == 0 )
			$class = 'last';
			
		$width = floor( ( ( 100 - ( ( $columns - 1 ) * 2 ) ) / $columns ) * 100 ) / 100;
		?>
		<?php if ($brand_hide) : ?>
			<li class="<?php echo $class; ?>" style="width: <?php echo $width; ?>%;">
				<a href="<?php echo get_term_link( $brand->slug, 'product_brand' ); ?>" title="<?php echo $brand->name; ?>">
					<img src="<?php echo $thumbnail; ?>" alt="<?php echo $brand->name; ?>" />
				</a>
			</li>
		<?php endif; ?>

	<?php endforeach; ?>
	
</ul>