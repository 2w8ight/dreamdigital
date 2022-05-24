<?php
get_header();
global $post;
$fields = get_fields();
$show_try_d_d_today = get_field('show_try_d_d_today');
$options = get_fields('option');
$banner_img = wp_get_attachment_image_url(get($options, 'image_single_blog'), 'full');
$try_dream_digital_today = get($options, 'try_dream_digital_today');
$instructor = get($fields, 'instructor');
?>
    <main class="single-blog-page">
        <div class="single_blog_wrap">
            <section class="banner">
                <div class="banner_wrap container">
                    <h2><?php echo get_the_title($post->ID); ?></h2>
                    <img src="<?php echo $banner_img; ?>" alt="image">
                </div>
            </section>
            <div class="single_blog_content">
                <p class="single_blog_excerpt title-24"><?php echo $post->post_excerpt; ?></p>
                <div class="single_blog_content_wrap">
                    <?php while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile; ?>
                </div>
                <?php if ($instructor) { ?>
                    <div class="single_blog_author">
                        <?php $instructor_img = get_the_post_thumbnail_url($instructor->ID, 'full');
                        if ($instructor_img) {
                            echo '<img src="' . $instructor_img . '" alt="author">';
                        } ?>
                        <div class="single_blog_author_info">
                            <p class="position title-10"><?php echo __('Written by', 'dreamdigital'); ?></p>
                            <p class="name title-22"><?php echo $instructor->post_title; ?></p>
                            <p class="excerpt text-11"><?php echo $instructor->post_excerpt; ?></p>
                        </div>
                    </div>
                <?php } ?>
                <div class="single_blog_share">
                    <p class="title title-14"><?php echo get($options, 'share_text'); ?></p>
                    <div class="share_links">
                        <?php if (get($options, 'facebook')) { ?>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_page_link() ?>"
                               target="_blank">
                                <img src="<?php echo wp_get_attachment_image_url(get($options, 'facebook'), 'full'); ?>"
                                     alt="facebook">
                            </a>
                        <?php } ?>
                        <?php if (get($options, 'twitter')) { ?>
                            <a href="https://twitter.com/intent/tweet?url=<?= get_page_link() ?>" target="_blank">
                                <img src="<?php echo wp_get_attachment_image_url(get($options, 'twitter'), 'full'); ?>"
                                     alt="twitter">
                            </a>
                        <?php } ?>
                        <?php if (get($options, 'email_false')) { ?>
                            <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site http://www.website.com">
                                <img src="<?php echo wp_get_attachment_image_url(get($options, 'email'), 'full'); ?>"
                                     alt="email">
                            </a>
                        <?php } ?>
                        <?php if (get($options, 'link')) { ?>
                            <div id="share_copy">
                                <img src="<?php echo wp_get_attachment_image_url(get($options, 'link'), 'full'); ?>"
                                     alt="link">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="single_blog_related">
                <div class="single_blog_related_wrap container">
                    <h2><?php echo __('Related articles', 'dreamdigital'); ?></h2>
                    <div class="swiper_wrap">
                        <div class="related_content swiper single_blog_related_swiper">
                            <div class="swiper-wrapper">
                                <?php $query_args = [
                                    'post_type'      => 'blog',
                                    'post__not_in'   => [$post->ID],
                                    'posts_per_page' => '3',
                                ];
                                $related_cats_post = new WP_Query($query_args);
                                if ($related_cats_post->have_posts()):
                                    while ($related_cats_post->have_posts()): $related_cats_post->the_post(); ?>
                                        <a href="<?php the_permalink(); ?>" class="related_item swiper-slide">
                                            <img src="<?php echo wp_get_attachment_image_url(get_post_thumbnail_id(), 'full') ?>"
                                                 alt="blog">
                                            <div class="related_info">
                                                <p class="related_title title-18"><?php the_title(); ?></p>
                                                <div class="related_excerpt text-13"><?php the_excerpt(); ?></div>
                                            </div>
                                        </a>
                                    <?php endwhile;
                                    wp_reset_postdata();
                                endif; ?>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <?php if ($show_try_d_d_today && $try_dream_digital_today) { ?>
                <section id="try_d_d">
                    <div class="try_d_d_wrap container">
                        <img src="<?php echo wp_get_attachment_image_url($try_dream_digital_today['image'], 'full'); ?>"
                             class="try_d_d_img" alt="image">
                        <h3><?php echo $try_dream_digital_today['title']; ?></h3>
                        <p class="item_desc text-14"><?php echo $try_dream_digital_today['description']; ?></p>
                        <a href="<?php echo $try_dream_digital_today['button']['url']; ?>"
                           target="<?php echo $try_dream_digital_today['button']['target']; ?>"
                           class="try_d_d_btn"><?php echo $try_dream_digital_today['button']['title']; ?></a>
                    </div>
                </section>
            <?php } ?>
        </div>
    </main>
<?php get_footer();