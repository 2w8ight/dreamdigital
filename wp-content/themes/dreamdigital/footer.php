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
                <div class="hide_book_demo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                    </svg>
                </div>
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
