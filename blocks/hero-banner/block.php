<?php
//acf block define
register_block_type( EG_PLUGIN_PATH . "blocks/hero-banner/block.json" );

//assets loading
function hero_banner_enqueue_block_assets() {
	wp_register_style( 'eg-hero-banner-style', EG_PLUGIN_URL . "/blocks/hero-banner/eg-hero-banner-style.css", "", time() );
}

function eg_hero_banner_assets( $block_content, $block ) {
	// Check if the specific block is being rendered
    if ( 'acf/eg-hero-banner' === $block['blockName']) {
		hero_banner_enqueue_block_assets();
	}
	return $block_content;
}
add_filter( 'render_block', 'eg_hero_banner_assets', 10, 2 );

//loading assets for admin
if (is_admin()) {
	hero_banner_enqueue_block_assets();
}


//acf backend field adding
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}

acf_add_local_field_group( array(
	'key' => 'group_62a80de3d7763',
	'title' => 'Easy Gutenberg – Hero Banner',
	'fields' => array(
		array(
			'key' => 'field_62a95aed44619',
			'label' => 'Block Settings',
			'name' => '',
			'aria-label' => '',
			'type' => 'tab',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'placement' => 'top',
			'endpoint' => 0,
			'selected' => 0,
		),
		array(
			'key' => 'field_62a80df843130',
			'label' => 'Banner Image',
			'name' => 'banner_image',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '45',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'allow_in_bindings' => 1,
			'preview_size' => 'thumbnail',
		),
		array(
			'key' => 'field_630317dcf6b41',
			'label' => 'Banner Image for Mobile View',
			'name' => 'banner_image_mobile',
			'aria-label' => '',
			'type' => 'image',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '45',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
			'allow_in_bindings' => 1,
			'preview_size' => 'thumbnail',
		),
		array(
			'key' => 'field_62a8105fd9937',
			'label' => 'Video MP4',
			'name' => 'banner_video_mp4',
			'aria-label' => '',
			'type' => 'file',
			'instructions' => 'Leave this Blank if you don\'t want Video',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_62a80df843130',
						'operator' => '!=empty',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'library' => 'all',
			'min_size' => '',
			'max_size' => '',
			'mime_types' => '.mp4',
			'allow_in_bindings' => 1,
		),
		array(
			'key' => 'field_62a810bad9938',
			'label' => 'Title',
			'name' => 'banner_title',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 1,
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6583e016346d9',
			'label' => 'Banner Content',
			'name' => 'banner_content',
			'aria-label' => '',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 1,
			'rows' => 4,
			'placeholder' => '',
			'new_lines' => '',
		),
		array(
			'key' => 'field_6728d17f3bace',
			'label' => 'Banner Text Color',
			'name' => 'banner_text_color',
			'aria-label' => '',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '30',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#000000',
			'enable_opacity' => 0,
			'return_format' => 'string',
			'allow_in_bindings' => 0,
		),
		array(
			'key' => 'field_6728d1a53bacf',
			'label' => 'Banner Height',
			'name' => 'banner_height_in_pixels',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '30',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '600px',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_6728d2f492fe4',
			'label' => 'Banner Height for Mobile',
			'name' => 'banner_height_for_mobile',
			'aria-label' => '',
			'type' => 'text',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '30',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'maxlength' => '',
			'allow_in_bindings' => 0,
			'placeholder' => '300px',
			'prepend' => '',
			'append' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/eg-hero-banner',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
	'show_in_rest' => 0,
) );
