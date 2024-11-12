<?php
//acf block define
register_block_type( EG_PLUGIN_PATH . "blocks/accordion/block.json" );

//assets loading
function accordion_enqueue_block_assets() {
	wp_register_style( 'eg-accordion-style', EG_PLUGIN_URL . "/blocks/accordion/eg-accordion-style.css", "", time() );
	wp_register_script( 'eg-accordion-script', EG_PLUGIN_URL . "/blocks/accordion/eg-accordion-script.js", [ 'jquery', 'acf' ],time(),true );

}

function eg_accordion_assets( $block_content, $block ) {
	// Check if the specific block is being rendered
    if ( 'acf/eg-accordion' === $block['blockName']) {
		accordion_enqueue_block_assets();
	}
	return $block_content;
}
add_filter( 'render_block', 'eg_accordion_assets', 10, 2 );

//loading assets for admin
if (is_admin()) {
	accordion_enqueue_block_assets();
}

//acf backend field adding
if ( ! function_exists( 'acf_add_local_field_group' ) ) {
    return;
}
acf_add_local_field_group( array(
	'key' => 'group_64a7fc5a14204',
	'title' => 'Easy Gutenberg - Accordion',
	'fields' => array(
		array(
			'key' => 'field_64a7fc5a157f1',
			'label' => 'Accordion',
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
			'key' => 'field_64a7fc5a157f9',
			'label' => 'Title',
			'name' => 'accordion_title',
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
			'placeholder' => '',
			'prepend' => '',
			'append' => '',
		),
		array(
			'key' => 'field_64a7fc5a15800',
			'label' => 'Accordion',
			'name' => 'locations',
			'aria-label' => '',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'layout' => 'block',
			'pagination' => 0,
			'min' => 0,
			'max' => 0,
			'collapsed' => '',
			'button_label' => 'Add Row',
			'rows_per_page' => 20,
			'sub_fields' => array(
				array(
					'key' => 'field_64a7fc5a1797c',
					'label' => 'Title',
					'name' => 'accordion_title',
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
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'parent_repeater' => 'field_64a7fc5a15800',
				),
				array(
					'key' => 'field_64a7fc5a17988',
					'label' => 'Content',
					'name' => 'accordion_content',
					'aria-label' => '',
					'type' => 'textarea',
					'instructions' => 'Use strong tag for title',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'maxlength' => '',
					'rows' => '',
					'placeholder' => '',
					'new_lines' => '',
					'parent_repeater' => 'field_64a7fc5a15800',
				),
			),
		),
		array(
			'key' => 'field_672cadd2ee37d',
			'label' => 'Remove Top Padding',
			'name' => 'remove_top_padding',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'allow_in_bindings' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_672cade3ee37e',
			'label' => 'Remove Bottom Padding',
			'name' => 'remove_bottom_padding',
			'aria-label' => '',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
			'allow_in_bindings' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'block',
				'operator' => '==',
				'value' => 'acf/eg-accordion',
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