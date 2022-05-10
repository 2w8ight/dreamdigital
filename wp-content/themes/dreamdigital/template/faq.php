<?php
/*
 * Template Name: FAQ
 * */
get_header();
$fields                  = get_fields();
$categories              = $fields['categories'];
$show_try_d_d_today      = get_field( 'show_try_d_d_today' );
$options                 = get_fields( 'option' );
$try_dream_digital_today = get( $options, 'try_dream_digital_today' );
?>

    <main class="faq-page faq">
        <div class="faq_page_wrap container">
            <div class="faq_page_banner">
                <h2><?php echo $fields['title']; ?></h2>
                <div class="faq_page_desc title-18"><?php echo $fields['subtitle']; ?></div>
                <div class="faq_page_categories">
					<?php if ( $categories ) {
						foreach ( $categories as $category ) {
							if ( $category->count !== 0 ) {
								echo '<a href="#' . $category->slug . '" class="title-13">' . $category->name . '</a>';
							}
						}
					} ?>
                </div>
            </div>
			<?php if ( $categories ) { ?>
                <div class="faq_page_content">
					<?php foreach ( $categories as $category ) { ?>

						<?php
						$args = [
							'post_type'      => 'faq',
							'posts_per_page' => - 1,
							'post_status'    => 'publish',
							'tax_query'      => [
								[
									'taxonomy' => 'category',
									'field'    => 'id',
									'terms'    => $category->term_id,
								],
							],
						];
						$faqs = new WP_Query( $args );
						if ( $category->count !== 0 ) { ?>
                            <div id="<?php echo $category->slug; ?>" class="faq_item_wrap">
                                <p class="faq_item_cat title-24"><?php echo $category->name; ?></p>
								<?php while ( $faqs->have_posts() ) {
									$faqs->the_post(); ?>
                                    <div class="faq_item">
                                        <p class="post_title title-16"><?php the_title(); ?><span class="mark">+</span>
                                        </p>
                                        <div class="post_content text-14"><?php the_content(); ?></div>
                                    </div>
								<?php } ?>
                            </div>
						<?php } ?>

					<?php } ?>
                </div>
			<?php } ?>
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

<?php
get_footer();
