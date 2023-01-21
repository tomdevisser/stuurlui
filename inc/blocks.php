<?php
/**
 * Sets up everything around blocks and block patterns.
 *
 * @package strl
 */

/**
 * Registers all theme blocks.
 *
 * @package strl
 */
function strl_register_theme_blocks() {
	if ( file_exists( get_template_directory() . '/blocks' ) ) {
		$block_json_files = glob( get_template_directory() . '/blocks/*/block.json' );

		// Auto register all blocks that were found.
		foreach ( $block_json_files as $filename ) {
			$block_folder  = dirname( $filename );
			$block_options = array();

			$markup_file_path = $block_folder . '/render.php';

			if ( file_exists( $markup_file_path ) ) {
				// Only add the render callback if the block has a file called render.php in it's directory.
				$block_options['render_callback'] = function( $attributes, $content, $block ) use ( $block_folder ) {
					// Get the actual markup from the render.php file.
					ob_start();
					include $block_folder . '/render.php';
					return ob_get_clean();
				};
			};

			register_block_type( $block_folder, $block_options );
		};
	};
}
add_action( 'init', 'strl_register_theme_blocks' );
