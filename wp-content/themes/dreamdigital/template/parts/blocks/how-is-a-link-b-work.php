<?php
$fields    = get_fields();
$title     = get( $fields, 'title' );
$sub_title = get( $fields, 'subtitle' );
$desc_1    = get( $fields, 'block_1.description' );
$img_1     = wp_get_attachment_image_url( get( $fields, 'block_1.image' ), 'full' );
$desc_2    = get( $fields, 'block_2.description' );
$img_2     = wp_get_attachment_image_url( get( $fields, 'block_2.image' ), 'full' );
?>
<section id="how_is_a_link_b_work">
    <div class="how_is_a_link_b_work_wrap container">
        <div class="how_is_a_link_b_work_info">
            <p class="title title-30"><?php echo $title; ?></p>
            <p class="sub_title title-20"><?php echo $sub_title; ?></p>
        </div>
        <div class="how_is_a_link_b_work_content">
            <div class="how_is_a_link_b_work_item block_1">
                <div class="desc text-14"><?php echo $desc_1; ?></div>
                <img src="<?php echo $img_1; ?>" alt="image">
            </div>
            <div class="how_is_a_link_b_work_item block_2">
                <img src="<?php echo $img_2; ?>" alt="image">
                <div class="desc text-14"><?php echo $desc_2; ?></div>
            </div>
        </div>
    </div>
</section>
