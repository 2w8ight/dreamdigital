<?php
$fields = get_fields();
$title = get($fields, 'title');
$btn_text = get($fields, 'buttons_text');
$btn_text_popup = get($fields, 'buttons_text_with_popup');
$btn = get($fields, 'button');
$products = get($fields, 'packages');
$products_popup = get($fields, 'packages_with_popup');
$section_color = get($fields, 'background_color');
?>
<section id="featured_services" class="<?php echo $section_color; ?>">
    <div class="featured_services_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="swiper_wrap">
            <div class="featured_services_content swiper featured_services_swiper">
                <div class="swiper-wrapper">
                    <?php if ($products) {
                        if (is_array($products)) {
                            foreach ($products as $item) {
                                $back_color = get_field('background_color', $item);
                                $content_color = get_field('content_color', $item);
                                $product = wc_get_product($item); ?>
                                <div class="featured_services_item <?php echo $back_color . ' ' . $content_color; ?> swiper-slide">
                                    <div class="img_wrap">
                                        <img src="<?php echo wp_get_attachment_image_url($product->image_id); ?>"
                                             alt="product-image">
                                    </div>
                                    <p class="title-22 item_title"><?php echo $product->name; ?></p>
                                    <p class="text-13 item_desc"><?php echo $product->short_description; ?></p>
                                    <p class="text-18 item_price"><?php echo $product->get_price_html(); ?></p>
                                    <a href="<?php echo home_url('/checkout/?add-to-cart=' . $item) ?>"
                                       class="item_btn"><?php echo $btn_text; ?></a>
                                </div>
                            <?php }
                        } else {
                            $back_color = get_field('background_color', $products);
                            $content_color = get_field('content_color', $products);
                            $product = wc_get_product($products); ?>
                            <div class="featured_services_item <?php echo $back_color . ' ' . $content_color; ?> swiper-slide">
                                <div class="img_wrap">
                                    <img src="<?php echo wp_get_attachment_image_url($product->image_id); ?>"
                                         alt="product-image">
                                </div>
                                <p class="title-22 item_title"><?php echo $product->name; ?></p>
                                <p class="text-13 item_desc"><?php echo $product->short_description; ?></p>
                                <p class="text-18 item_price"><?php echo $product->get_price_html(); ?></p>
                                <a href="<?php echo home_url('/checkout/?add-to-cart=' . $products) ?>"
                                   class="item_btn"><?php echo $btn_text; ?></a>
                            </div>
                        <?php }
                    } ?>
                    <?php if ($products_popup) {
                        if (is_array($products_popup)) {
                            foreach ($products_popup as $item) {
                                $back_color = get_field('background_color', $item);
                                $content_color = get_field('content_color', $item);
                                $product = wc_get_product($item); ?>
                                <div class="featured_services_item <?php echo $back_color . ' ' . $content_color; ?> swiper-slide">
                                    <div class="img_wrap">
                                        <img src="<?php echo wp_get_attachment_image_url($product->image_id); ?>"
                                             alt="product-image">
                                    </div>
                                    <p class="title-22 item_title"><?php echo $product->name; ?></p>
                                    <p class="text-13 item_desc"><?php echo $product->short_description; ?></p>
                                    <p class="text-18 item_price"><?php echo $product->get_price_html(); ?></p>
                                    <a class="title-14 item_btn prod_btn_open" data-prod-id="<?php echo $item ?>"><?php echo $btn_text_popup; ?></a>
                                </div>
                            <?php }
                        } else {
                            $back_color = get_field('background_color', $products_popup);
                            $content_color = get_field('content_color', $products_popup);
                            $product = wc_get_product($products_popup); ?>
                            <div class="featured_services_item <?php echo $back_color . ' ' . $content_color; ?> swiper-slide">
                                <div class="img_wrap">
                                    <img src="<?php echo wp_get_attachment_image_url($product->image_id); ?>"
                                         alt="product-image">
                                </div>
                                <p class="title-22 item_title"><?php echo $product->name; ?></p>
                                <p class="text-13 item_desc"><?php echo $product->short_description; ?></p>
                                <p class="text-18 item_price"><?php echo $product->get_price_html(); ?></p>
                                <a class="title-14 item_btn prod_btn_open" data-prod-id="<?php echo $products_popup ?>"><?php echo $btn_text_popup; ?></a>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="product_more_details"></div>
        <?php if ($btn) {
            echo '<a href="' . $btn['url'] . '" class="featured_services_btn title-13" target="' . $btn['target'] . '">' . $btn['title'] . '</a>';
        } ?>
    </div>
</section>