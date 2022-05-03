<?php
$fields = get_fields();
$title  = get( $fields, 'title' );
$blocks = get( $fields, 'blocks' );
?>
<section id="what_do_you_need">
    <div class="what_do_you_need_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="what_do_you_need_content">
			<?php
			if ( $blocks ) {
				foreach ( $blocks as $item ) { ?>
                    <div class="what_do_you_need_item">
                        <div class="img_wrap">
                            <img src="<?php echo wp_get_attachment_image_url( $item['image'], 'full' ); ?>" alt="image">
                        </div>
                        <p class="title-18 item_title"><?php echo $item['title']; ?></p>
                    </div>
				<?php }
			} ?>
        </div>
    </div>
</section>