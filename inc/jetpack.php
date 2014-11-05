<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Game Changers
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function game_changers_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'game_changers_jetpack_setup' );
