<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title(); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="header">
    <div class="header_wrap container-big">
        <div class="header_logo">
			<?php if ( function_exists( 'the_custom_logo' ) ) {
				the_custom_logo();
			} ?>
        </div>
        <nav class="header_menu">
            <div class="header_menu_btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
			<?php wp_nav_menu( [ 'theme_location' => 'header' ] ); ?>
        </nav>
        <button class="book_demo_btn">Book a demo</button>
    </div>
    <div class="header_menu_mob">
		<?php wp_nav_menu( [ 'theme_location' => 'header' ] ); ?>
    </div>
</header>
