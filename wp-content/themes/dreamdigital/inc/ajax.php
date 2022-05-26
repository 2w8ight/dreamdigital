<?php

add_action("wp_ajax_get_prod_info", "get_prod_info");
add_action("wp_ajax_nopriv_get_prod_info", "get_prod_info");

function get_prod_info()
{
    $ID = $_POST['prod_id'];
    $post = get_post($ID);
    $product = wc_get_product($ID);
    $fields = get_fields($ID);
    $options = get_fields('option');
    $back_color = get($fields, 'background_color');
    $content_color = get($fields, 'content_color');
    $instructor = get($fields, 'instructor');
    foreach ($product->category_ids as $cat) {
        $prod_cat = get_term($cat);
        if ($prod_cat->term_id != '35') {
            $term_name = $prod_cat->name;
        }
    } ?>
    <div class="p_m_d_content">
        <div class="p_m_d_wrap container">
            <div class="p_m_d_left <?php echo $back_color . ' ' . $content_color; ?>">
                <img src="<?php echo wp_get_attachment_image_url(get($options, 'guarantee_img'), 'full') ?>"
                     class="p_m_d_guarantee"
                     alt="guarantee">
                <div class="p_m_d_imgs">
                    <img src="<?php echo wp_get_attachment_image_url(get($options, 'products_image'), 'full') ?>"
                         class="p_m_d_product_img"
                         alt="product-image">
                    <?php
                    if ($product->get_price()) {
                        if ($content_color == 'white') {
                            echo '<img src="' . wp_get_attachment_image_url(get($options, 'payment_white'), 'full') . '" class="p_m_d_payment" alt="payment">';
                        } else if ($content_color == 'black') {
                            echo '<img src="' . wp_get_attachment_image_url(get($options, 'payment_black'), 'full') . '" class="p_m_d_payment" alt="payment">';
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="p_m_d_right">
                <div class="hide_p_m_d">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                    </svg>
                </div>
                <div class="p_m_d_info">
                    <p class="p_m_d_term title-14 "><?php echo $term_name; ?></p>
                    <p class="p_m_d_title title-40"><?php echo $product->name; ?></p>
                    <p class="p_m_d_short text-15"><?php echo $product->short_description; ?></p>
                    <div class="p_m_d_desc text-13"><?php echo $product->description; ?></div>
                </div>
                <div class="p_m_d_price_btn">
                    <div class="p_m_d_price">
                        <p class="title-12"><?php echo __('price', 'dreamdigital'); ?></p>
                        <?php if ($product->get_price() == 0) {
                            echo '<span>' . $product->get_price_html() . '</span>';
                        } else {
                            echo $product->get_price_html();
                        } ?>
                    </div>
                    <a href="<?php echo home_url('/checkout/?add-to-cart=' . $post->ID); ?>"
                       class="title-18 p_m_d_btn"><?php echo $term_name === 'Package' ? __('Buy this package', 'dreamdigital') : __('Buy this course', 'dreamdigital'); ?></a>
                </div>
                <?php if ($instructor) { ?>
                    <div class="p_m_d_instructor">
                        <?php if (get_the_post_thumbnail_url($instructor->ID, 'full')) { ?>
                            <img src="<?php echo get_the_post_thumbnail_url($instructor->ID, 'full') ?>" alt="instructor">
                        <?php } ?>
                        <div class="p_m_d_instructor_info">
                            <p class="position title-8"><?php echo __('course instructor', 'dreamdigital'); ?></p>
                            <p class="name title-16"><?php echo $instructor->post_title; ?></p>
                            <p class="excerpt text-11"><?php echo get_field('short_excerpt', $instructor->ID); ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php wp_die();
}