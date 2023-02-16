<?php
/**
 * This file is meant to set up the theme by enqueueing styles and scripts,
 * and removing core functionality that is unwanted.
 *
 * @package strl
 */

/**
 * Sets up everything around blocks and block patterns.
 *
 * @package strl
 */
require 'blocks.php';

/**
 * Unregisters all block patterns from WordPress core.
 *
 * @package strl
 */
function strl_block_course_theme_unregister_patterns() {
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'strl_block_course_theme_unregister_patterns', 15 );

/**
 * Allows SVG uploads.
 *
 * @param array $t Mime types keyed by the file extension regex corresponding to those types.
 * @package strl
 */
function strl_mime_types( $t ) {
	$t['svg'] = 'image/svg+xml';
	return $t;
}
add_filter( 'upload_mimes', 'strl_mime_types' );

/**
 * Require all custom post type registration files.
 *
 * @package strl
 */
if ( file_exists( get_template_directory() . '/post-types' ) ) {
	$strl_cpt_files = glob( get_template_directory() . '/post-types/*.php' );

	// Auto require all found post types.
	foreach ( $strl_cpt_files as $strl_cpt_file ) {
		require $strl_cpt_file;
	};
};

/**
 * Enqueue scripts and styles.
 *
 * @package strl
 */
function strl_scripts() {
	wp_enqueue_script( 'strl-scripts', get_template_directory_uri() . '/build/strlStyles.js', array(), '1.0.0', true );
	wp_enqueue_style( 'strl-styles', get_template_directory_uri() . '/build/strlStyles.css', array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'strl_scripts' );
