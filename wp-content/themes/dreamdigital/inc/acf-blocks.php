<?php
add_action( 'acf/init', 'acf_init_block_types' );
function acf_init_block_types() {

	if ( function_exists( 'acf_register_block' ) ) {

		$blocks = [
			'banner'                         => 'Banner',
			'partners'                       => 'Partners',
			'how-d-d-works'                  => 'How Dream Digital works',
			'featured-services'              => 'Featured services',
			'what-do-you-need'               => 'What do you need',
			'user-reviews-block'             => 'User reviews block',
			'faq-with-title'                 => 'FAQ with Title',
			'try-d-d'                        => 'Try Dream Digital',
			'link-building'                  => 'Link Building',
			'what-is-a-link-building'        => 'What Is a Link Building',
			'how-is-a-link-b-work'           => 'How Does our Link Building Work',
			'types-o-link-building-we-offer' => 'Types of Link Building we offer',
			'whitelabel-link-building'       => 'Whitelabel Link Building',
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