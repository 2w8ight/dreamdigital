<?php
$fields = get_fields();
$title  = get( $fields, 'title' );
$blocks = get( $fields, 'blocks' );
?>
<section id="types_o_types_o_link_building">
    <div class="types_o_t_o_l_b_wrap container">
        <p class="title title-46"><?php echo $title; ?></p>
        <div class="types_o_t_o_l_b_blocks">
			<?php if ( $blocks ) {
				foreach ( $blocks as $block ) { ?>
                    <div class="block_item">
                        <div class="block_item_info">
                            <img src="<?php echo wp_get_attachment_image_url( $block['image'], 'full' ); ?>" alt="">
                            <p class="block_title title-20"><?php echo $block['title']; ?></p>
                        </div>
                        <p class="block_desc text-14"><?php echo $block['description']; ?></p>
                    </div>
				<?php }
			} ?>
        </div>
    </div>
</section>
