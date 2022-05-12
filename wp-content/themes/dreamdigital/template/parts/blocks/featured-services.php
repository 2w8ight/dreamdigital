<?php
$fields        = get_fields();
$title         = get( $fields, 'title' );
$btn_text      = get( $fields, 'buttons_text' );
$btn           = get( $fields, 'button' );
$products      = get( $fields, 'packages' );
$section_color = get( $fields, 'background_color' );
?>
<section id="featured_services" class="<?php echo $section_color; ?>">
    <div class="featured_services_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="featured_services_content">
			<?php
			if ( $products ) {
				foreach ( $products as $item ) {
					$back_color    = get_field( 'background_color', $item );
					$content_color = get_field( 'content_color', $item );
					$product       = wc_get_product( $item ); ?>
                    <div class="featured_services_item <?php echo $back_color . ' ' . $content_color; ?>">
                        <div class="img_wrap">
                            <img src="<?php echo wp_get_attachment_image_url( $product->image_id ); ?>"
                                 alt="product-image">
                        </div>
                        <p class="title-22 item_title"><?php echo $product->name; ?></p>
                        <p class="text-13 item_desc"><?php echo $product->description; ?></p>
                        <p class="text-18 item_price"><?php echo $product->get_price_html(); ?></p>
                        <a href="<?php echo home_url( '/checkout/?add-to-cart=' . $item ) ?>"
                           class="item_btn"><?php echo $btn_text; ?></a>
                    </div>
				<?php }
			} ?>
        </div>
		<?php if ( $btn ) {
			echo '<a href="' . $btn['url'] . '" class="featured_services_btn title-13" target="' . $btn['target'] . '">' . $btn['title'] . '</a>';
		} ?>
    </div>
</section>
