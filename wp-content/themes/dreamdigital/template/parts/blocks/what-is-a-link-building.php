<?php
$fields      = get_fields();
$pre_title   = get( $fields, 'pre_title' );
$title       = get( $fields, 'title' );
$description = get( $fields, 'description' );
$image       = wp_get_attachment_image_url( get( $fields, 'image' ), 'full' );
?>
<section id="what_is_a_link_building">
    <div class="what_i_a_l_b_wrap container">
        <img src="<?php echo $image; ?>" class="what_i_a_l_b_img" alt="image">
        <div class="what_i_a_l_b_info">
            <p class="pre_title title-18"><?php echo $pre_title; ?></p>
            <p class="title title-20"><?php echo $title; ?></p>
            <div class="desc text-14"><?php echo $description; ?></div>
        </div>
    </div>
</section>
