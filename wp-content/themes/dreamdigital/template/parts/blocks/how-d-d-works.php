<?php
$fields = get_fields();
$title  = get( $fields, 'title' );
$blocks = get( $fields, 'blocks' );
?>
<section id="how_d_d_works">
    <div class="how_d_d_works_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="how_d_d_works_content">
			<?php
			if ( $blocks ) {
				foreach ( $blocks as $item ) { ?>
                    <div class="how_d_d_works_item">
                        <div class="img_wrap">
                            <img src="<?php echo wp_get_attachment_image_url( $item['image'], 'full' ); ?>" alt="image">
                        </div>
                        <p class="title-18 item_title"><?php echo $item['title']; ?></p>
                        <p class="text-13 item_desc"><?php echo $item['description']; ?></p>
                    </div>
				<?php }
			} ?>
        </div>
    </div>
</section>
<div id="section_spacer" class="container-big"></div>
