<?php
$fields  = get_fields();
$title   = get( $fields, 'title' );
$reviews = get( $fields, 'reviews_block' );
?>
<section id="user_reviews_block">
    <div class="user_reviews_block_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="user_reviews_block_content">
			<?php
			if ( $reviews ) {
				foreach ( $reviews as $item ) { ?>
                    <div class="user_reviews_block_item">
                        <div class="stars">
							<?php
							$star = get_field( 'stars', $item->ID );
							if ( $star ) {
								for ( $i = 1; $i <= $star; $i ++ ) {
									echo '<img src="' . get_template_directory_uri() . '/dest/img/star.svg" alt="">';
								}
							}
							?>
                        </div>
                        <div><?php echo $item->post_content; ?></div>
                        <div>
                            <img src="<?php echo get_the_post_thumbnail_url( $item->ID, 'full' ) ?>" alt="avatar">
                            <div>
                                <p><?php echo $item->post_title; ?></p>
                                <p><?php echo get_field( 'position', $item->ID ); ?></p>
                            </div>
                        </div>
                    </div>
				<?php }
			} ?>
        </div>
    </div>
</section>