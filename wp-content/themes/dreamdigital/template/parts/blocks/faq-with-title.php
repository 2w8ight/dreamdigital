<?php
$fields = get_fields();
$title  = get( $fields, 'title' );
$faq    = get( $fields, 'faq' );
$info   = get( $fields, 'info' );
?>
<section id="faq_w_title" class="faq">
    <div class="faq_w_title_wrap container">
        <h2><?php echo $title; ?></h2>
        <div class="faq_w_title_content">
			<?php if ( $faq ) {
				foreach ( $faq as $item ) { ?>
                    <div class="faq_w_title_item faq_item">
                        <p class="post_title title-16"><?php echo $item->post_title; ?><span class="mark">+</span></p>
                        <div class="post_content text-14"><?php echo $item->post_content; ?></div>
                    </div>
				<?php }
			} ?>
        </div>
        <div class="faq_w_title_info"><?php echo $info; ?></div>
    </div>
</section>
