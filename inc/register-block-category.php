<?php
/**
 * Registers a 'WDS' block category with Gutenberg.
 *
 * @package abs
 */

add_filter(
	'block_categories_all',
		function( $categories ) {
			// category for easy block
			$new_category = array(
				'easy_block_category' => array(
					'slug'  => 'easy-block',
					'title' => 'Easy Block - ACF Pro Addon'
				)
			);

			// position easy blocks 
			$position = 2;
			$categories = array_slice( $categories, 0, $position, true ) + $new_category + array_slice( $categories, $position, null, true );

			// reset array indexes
			$categories = array_values( $categories );

			return $categories;
	}
);