<?php
$fields   = get_fields();
$title    = get( $fields, 'title' );
$partners = get( $fields, 'partners' );
?>
<section id="partners">
    <div class="partners_wrap container">
        <p class="title-11"><?php echo $title; ?></p>
        <div class="partners_content">
			<?php
			if ( $partners ) {
				foreach ( $partners as $item ) {
					echo '<img src="' . wp_get_attachment_image_url( $item, 'full' ) . '" class="partners_item" alt="partner">';
				}
			}
			?>
        </div>
    </div>
</section>
