<?php
$fields    = get_fields();
$pre_title = get( $fields, 'pre_title' );
$title     = get( $fields, 'title' );
$image     = wp_get_attachment_image_url( get( $fields, 'image' ), 'full' );
?>
<section id="link_building">
    <div class="link_building_wrap container">
        <div class="link_building_info">
            <p class="pre_title title-18"><?php echo $pre_title; ?></p>
            <p class="title title-32"><?php echo $title; ?></p>
        </div>
        <img src="<?php echo $image; ?>" class="link_building_img" alt="image">
    </div>
</section>
