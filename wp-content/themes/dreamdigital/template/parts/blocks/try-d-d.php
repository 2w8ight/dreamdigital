<?php
$fields      = get_fields();
$title       = get( $fields, 'title' );
$description = get( $fields, 'description' );
$btn         = get( $fields, 'button' );
$image       = wp_get_attachment_image_url( get( $fields, 'image' ), 'full' );
?>
<section id="try_d_d">
    <div class="try_d_d_wrap container">
        <img src="<?php echo $image; ?>" class="try_d_d_img" alt="image">
        <h3><?php echo $title; ?></h3>
        <p class="item_desc text-14"><?php echo $description; ?></p>
        <a href="<?php echo $btn['url']; ?>"
           target="<?php echo $btn['target']; ?>" class="try_d_d_btn"><?php echo $btn['title']; ?></a>
    </div>
</section>
