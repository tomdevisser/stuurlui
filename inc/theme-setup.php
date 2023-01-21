<?php
/**
 * This file is meant to set up the theme by enqueueing styles and scripts,
 * and removing core functionality that is unwanted.
 *
 * @package strl
 */

/**
 * Unregisters all block patterns from WordPress core.
 *
 * @package strl
 */
function strl_block_course_theme_unregister_patterns() {
	remove_theme_support( 'core-block-patterns' );
}
add_action( 'after_setup_theme', 'strl_block_course_theme_unregister_patterns', 15 );
