<?php
$fields                = get_fields( 'option' );
$logo                  = wp_get_attachment_image_url( get( $fields, 'logo_footer' ), 'full' );
$addresses             = get( $fields, 'addresses_footer' );
$menu_title            = get( $fields, 'menu_title_footer' );
$info                  = get( $fields, 'info_footer' );
$socials               = get( $fields, 'socials_footer' );
$book_demo_image       = wp_get_attachment_image_url( get( $fields, 'book_demo.image' ), 'full' );
$book_demo_pre_title   = get( $fields, 'book_demo.pre_title' );
$book_demo_title       = get( $fields, 'book_demo.title' );
$book_demo_description = get( $fields, 'book_demo.description' );
$book_demo_form        = get( $fields, 'book_demo.form' );
?>
<div class="book_demo book_a_demo_form">
    <div class="b_a_d_content">
        <div class="b_a_d_wrap container">
            <div class="b_a_d_left">
                <img src="<?php echo $book_demo_image; ?>" alt="image">
            </div>
            <div class="b_a_d_right">
                <p class="pre_title title-14"><?php echo $book_demo_pre_title; ?></p>
                <p class="title title-40"><?php echo $book_demo_title; ?></p>
                <p class="desc text-15"><?php echo $book_demo_description; ?></p>
				<?php echo do_shortcode( '[wpforms id="' . $book_demo_form . '"]' ) ?>
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    <div class="footer_wrap container">
        <div class="footer_top">
            <img src="<?php echo $logo; ?>" alt="logo-footer">
            <div class="footer_addresses_menu">
				<?php if ( $addresses ) {
					foreach ( $addresses as $item ) { ?>
                        <div class="footer_address">
                            <p class="item_title title-14"><?php echo $item['title']; ?></p>
                            <p class="item_text text-14"><?php echo $item['address']; ?></p>
                        </div>
					<?php }
				} ?>
                <div class="footer_menu">
                    <p class="item_title title-14"><?php echo $menu_title; ?></p>
					<?php wp_nav_menu( [ 'theme_location' => 'footer' ] ); ?>
                </div>
            </div>
        </div>
        <div class="footer_bottom">
            <div class="footer_info"><?php echo $info; ?></div>
            <div class="footer_socials">
				<?php if ( $socials ) {
					foreach ( $socials as $item ) { ?>
                        <a href="<?php echo $item['link']; ?>">
                            <img src="<?php echo wp_get_attachment_image_url( $item['icon'], 'full' ); ?>" alt="social">
                        </a>
					<?php }
				} ?>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
