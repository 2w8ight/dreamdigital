<?php
/*
 * Template Name: SEO Guides & Templates
 * */
get_header();
global $post;
$fields                  = get_fields();
$show_try_d_d_today      = get_field( 'show_try_d_d_today' );
$options                 = get_fields( 'option' );
$try_dream_digital_today = get( $options, 'try_dream_digital_today' ); ?>
    <main class="seo-g-t-page">
        <section class="banner">
            <div class="banner_wrap container">
                <h2><?php echo get_the_title( $post->ID ); ?></h2>
                <img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'full' ); ?>" alt="image">
            </div>
        </section>
        <div class="seo_g_t_page_wrap">
            <div class="seo_g_t_content">
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
            </div>
            <div class="seo_g_t_wrap container">
                <div class="seo_g_t_filter">
                    <p class="product_filter_title title-12"><?php echo __( 'filter services:', 'dreamdigital' ); ?></p>
					<?php
					$parent = get_term( 18 );
					$args   = array(
						'parent' => $parent->term_id
					);
					$terms  = get_terms( 'product_cat', $args );
					if ( $terms ) { ?>
                        <button id="<?php echo $parent->slug; ?>" class="product_filter_cat title-13 view_all active"
                                data-term-slug="all"><?php echo __( 'View all', 'dreamdigital' ); ?></button>
						<?php foreach ( $terms as $term ) { ?>
                            <button id="<?php echo $term->slug; ?>" class="product_filter_cat title-13"
                                    data-term-slug="<?php echo $term->slug; ?>"><?php echo $term->name; ?></button>
						<?php }
					} ?>
                </div>
                <div class="seo_g_t_products">
					<?php
					if ( $terms ) {
						foreach ( $terms as $term ) {
							$posts = get_posts( array(
								'post_type'   => 'product',
								'numberposts' => - 1,
								'post_status' => 'publish',
								'orderby'     => 'date',
								'order'       => 'ASC',
								'tax_query'   => array(
									array(
										'taxonomy' => 'product_cat',
										'field'    => 'id',
										'terms'    => $term->term_id,
										'operator' => 'IN',
									)
								),
							) );
							foreach ( $posts as $key => $post ) {
								$back_color    = get_field( 'background_color', $post->ID );
								$content_color = get_field( 'content_color', $post->ID );
								$product       = wc_get_product( $post->ID );
								$coming_soon   = '';
								if ( in_array( '35', $product->category_ids ) ) {
									$coming_soon = 'coming_soon';
								}
								foreach ( $product->category_ids as $cat ) {
									$prod_cat = get_term( $cat );
									if ( $prod_cat->term_id != '35' ) {
										$term_name = $prod_cat->name;
									}
								} ?>
                                <div class="seo_g_t_products_item <?php echo $back_color . ' ' . $content_color . ' ' . $coming_soon; ?><?php echo ( $key > 2 ) ? ' hide_prod' : ''; ?>"
                                     data-term-slug="<?php echo $term->slug; ?>"
                                     data-prod-id="<?php echo $post->ID; ?>">
                                    <div class="item_info">
                                        <img src="<?php echo wp_get_attachment_image_url( $product->image_id ); ?>"
                                             class="img_wrap"
                                             alt="product-image">
                                        <p class="item_term title-12"><?php echo $term_name; ?></p>
                                        <p class="title-22 item_title"><?php echo $product->name; ?></p>
										<?php if ( $product->short_description ) { ?>
                                            <p class="text-13 item_desc"><?php echo $product->short_description; ?></p>
										<?php } ?>
                                    </div>
                                    <div class="item_price_btn">
                                        <p class="text-18 item_price">
                                            <small class="title-12"><?php echo __( 'price', 'dreamdigital' ); ?></small><br>
											<?php if ( $product->get_price() != '' ) {
												echo $product->get_price_html();
											} else {
												echo __( 'TBC', 'dreamdigital' );
											} ?>
                                        </p>
                                        <button class="title-14 item_btn prod_btn_open"
                                                data-prod-id="<?php echo $post->ID; ?>"><?php echo __( 'More details', 'dreamdigital' ); ?></button>
                                    </div>
                                </div>
							<?php }
						}
					} ?>
                </div>
            </div>
            <div class="product_more_details"></div>
        </div>
    </main>
<?php get_footer();