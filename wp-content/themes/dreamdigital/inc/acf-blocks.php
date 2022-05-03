<?php
add_action( 'acf/init', 'acf_init_block_types' );
function acf_init_block_types() {

	if ( function_exists( 'acf_register_block' ) ) {

		$blocks = [
			'banner'             => 'Banner',
			'partners'           => 'Partners',
			'how-d-d-works'      => 'How Dream Digital works',
			'featured-services'  => 'Featured services',
			'what-do-you-need'   => 'What do you need',
			'user-reviews-block' => 'User reviews block',
		];

		foreach ( $blocks as $slug => $title ) {
			acf_register_block( array(
				'name'            => $slug,
				'title'           => __( $title ),
				'description'     => __( 'A custom block.' ),
				'render_template' => 'template/parts/blocks/' . $slug . '.php',
				'category'        => 'formatting',
				'mode'            => 'edit',
				'icon'            => 'admin-comments',
				'keywords'        => array( $slug ),
			) );
		}

	}
}