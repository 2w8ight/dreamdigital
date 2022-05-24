<?php
$fields = get_fields();
$title = get($fields, 'title');
$reviews = get($fields, 'reviews_block');
?>
<section id="user_reviews_slider">
    <div class="user_reviews_slider_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="swiper_wrap">
            <div class="user_reviews_slider_content swiper user_reviews_swiper">
                <div class="swiper-wrapper">
                    <?php
                    if ($reviews) {
                        foreach ($reviews as $item) { ?>
                            <div class="user_reviews_slider_item swiper-slide">
                                <div class="stars">
                                    <?php
                                    $star = get_field('stars', $item->ID);
                                    if ($star) {
                                        for ($i = 1; $i <= $star; $i++) {
                                            echo '<img src="' . get_template_directory_uri() . '/dest/img/star.svg" alt="">';
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="item_desc text-13"><?php echo $item->post_content; ?></div>
                                <div class="item_info">
                                    <img src="<?php echo get_the_post_thumbnail_url($item->ID, 'full') ?>" alt="avatar">
                                    <div class="item_texts">
                                        <p class="item_name text-12"><?php echo $item->post_title; ?></p>
                                        <p class="item_position text-10"><?php echo get_field('position', $item->ID); ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</section>