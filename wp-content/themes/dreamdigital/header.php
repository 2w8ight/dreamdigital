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
		<?php if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		} ?>
        <nav class="header_menu">
			<?php wp_nav_menu( [ 'theme_location' => 'header' ] ); ?>
        </nav>
        <button id="book_demo">Book a demo</button>
    </div>
</header>
