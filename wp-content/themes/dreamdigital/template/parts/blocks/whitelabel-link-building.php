<?php
$fields                   = get_fields();
$whitelabel_link_building = get( $fields, 'whitelabel_link_building' );
$title_1                  = get( $whitelabel_link_building, 'title' );
$desc_1                   = get( $whitelabel_link_building, 'description' );
$short_desc_1             = get( $whitelabel_link_building, 'short_description' );
$blocks_1                 = get( $whitelabel_link_building, 'blocks' );
$our_process              = get( $fields, 'our_process' );
$title_2                  = get( $our_process, 'title' );
$blocks_2                 = get( $our_process, 'blocks' );
?>
<section id="whitelabel_link_building">
    <div class="whitelabel_link_building_wrap container">
        <div class="whitelabel_link_building_content">
            <p class="w_l_b_title title-36"><?php echo $title_1; ?></p>
            <p class="w_l_b_desc title-20"><?php echo $desc_1; ?></p>
            <p class="w_l_b_short_desc text-14"><?php echo $short_desc_1 ?></p>
            <div class="w_l_b_blocks">
				<?php if ( $blocks_1 ) {
					foreach ( $blocks_1 as $block ) { ?>
                        <div class="w_l_b_blocks_item">
                            <div class="w_l_b_blocks_item_info">
                                <img src="<?php echo wp_get_attachment_image_url( $block['image'], 'full' ) ?>"
                                     alt="image">
                                <p class="item_title title-20"><?php echo $block['title']; ?></p>
                            </div>
                            <p class="w_l_b_blocks_item_desc text-14"><?php echo $block['description']; ?></p>
                        </div>
					<?php }
				} ?>
            </div>
        </div>
        <div class="our_process_content">
            <p class="o_p_title title-30"><?php echo $title_2; ?></p>
            <div class="o_p_blocks">
				<?php if ( $blocks_2 ) {
					foreach ( $blocks_2 as $block ) { ?>
                        <div class="o_p_blocks_item">
                            <img src="<?php echo wp_get_attachment_image_url( $block['image'], 'full' ) ?>"
                                 alt="image">
                            <p class="item_title text-16"><?php echo $block['title']; ?></p>
                        </div>
					<?php }
				} ?>
            </div>
        </div>
    </div>
</section>