<?php get_header();
$options                 = get_fields( 'option' );
$title                   = get( $options, 'title_blog' );
$image                   = wp_get_attachment_image_url( get( $options, 'image_blog' ), 'full' );
$show_try_d_d_today      = get( $options, 'show_try_d_d_today_blog' );
$try_dream_digital_today = get( $options, 'try_dream_digital_today' );
?>
    <main class="archive-blog">
        <div class="archive_blog_wrap">
            <section class="banner">
                <div class="banner_wrap container">
                    <h2><?php echo $title; ?></h2>
                    <img src="<?php echo $image; ?>" alt="image">
                </div>
            </section>
            <section class="blogs container">
				<?php while ( have_posts() ) : the_post(); ?>
                    <div class="blogs_item">
                        <img src="<?php echo wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' ) ?>"
                             alt="blog">
                        <div class="blog_info">
                            <p class="blog_title title-18"><?php the_title(); ?></p>
                            <div class="blog_excerpt text-13"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
				<?php endwhile; ?>
            </section>
        </div>
		<?php if ( $show_try_d_d_today && $try_dream_digital_today ) { ?>
            <section id="try_d_d">
                <div class="try_d_d_wrap container">
                    <img src="<?php echo wp_get_attachment_image_url( $try_dream_digital_today['image'], 'full' ); ?>"
                         class="try_d_d_img" alt="image">
                    <h3><?php echo $try_dream_digital_today['title']; ?></h3>
                    <p class="item_desc text-14"><?php echo $try_dream_digital_today['description']; ?></p>
                    <a href="<?php echo $try_dream_digital_today['button']['url']; ?>"
                       target="<?php echo $try_dream_digital_today['button']['target']; ?>"
                       class="try_d_d_btn"><?php echo $try_dream_digital_today['button']['title']; ?></a>
                </div>
            </section>
		<?php } ?>
    </main>
<?php get_footer();