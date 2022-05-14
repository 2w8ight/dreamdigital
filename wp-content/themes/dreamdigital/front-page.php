<?php get_header();
$show_try_d_d_today      = get_field( 'show_try_d_d_today' );
$options                 = get_fields( 'option' );
$try_dream_digital_today = get( $options, 'try_dream_digital_today' );
?>
    <main class="front-page">
		<?php while ( have_posts() ) :
			the_post();
			the_content();
		endwhile; ?>
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