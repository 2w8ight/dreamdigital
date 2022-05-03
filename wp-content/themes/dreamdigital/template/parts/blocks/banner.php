<?php
$fields      = get_fields();
$title       = get( $fields, 'title' );
$description = get( $fields, 'description' );
$btn_light   = get( $fields, 'button_light' );
$btn_dark    = get( $fields, 'button_dark' );
$image       = wp_get_attachment_image_url( get( $fields, 'image' ), 'full' );
?>
<section id="banner">
    <div class="banner_wrap container">
        <div class="banner_info">
            <h2><?php echo $title; ?></h2>
            <p class="text-14"><?php echo $description; ?></p>
            <div class="banner_buttons">
                <a href="<?php echo $btn_light['url']; ?>"
                   target="<?php echo $btn_light['target']; ?>" class="banner_btn_light"><?php echo $btn_light['title']; ?></a>
                <a href="<?php echo $btn_dark['url']; ?>"
                   target="<?php echo $btn_dark['target']; ?>" class="banner_btn_dark"><?php echo $btn_dark['title']; ?></a>
            </div>
        </div>
        <img src="<?php echo $image; ?>" class="banner_img" alt="image">
    </div>
</section>
