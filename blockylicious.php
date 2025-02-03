<?php

namespace TestBlocks;

/**
 * Plugin Name:       Blockylicious
 * Description:       A plugin with Custom Blocks Gutenberg.
 * Requires at least: 6.6
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Miguel Calderon
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blockylicious
 *
 * @package CreateBlock
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Silence is golden' );
}

/**
 * Class Blockylicious
 *
 * This class handles the creation and registration of custom Gutenberg blocks.
 */
final class Blockylicious {

	/**
	 * Create custom blocks.
	 */
	public static function init() {
		add_action(
			'init',
			function () {
				add_filter(
					'block_categories_all',
					function ( $categories ) {
						array_unshift(
							$categories,
							array(
								'slug'  => 'blockylicious',
								'title' => 'Blockylicious',
							)
						);

						return $categories;
					}
				);
				register_block_type( __DIR__ . '/build/blocks/curvy' );
				register_block_type( __DIR__ . '/build/blocks/clickyGroup' );
				register_block_type( __DIR__ . '/build/blocks/clickyButton' );
			}
		);
	}

	/**
	 * Converts custom properties to CSS variables.
	 *
	 * @param string $value The value to be converted.
	 * @return string The converted value.
	 */
	public static function convert_custom_properties( $value ) {
		$prefix     = 'var:';
		$prefix_len = strlen( $prefix );
		$token_in   = '|';
		$token_out  = '--';
		if ( str_starts_with( $value, $prefix ) ) {
			$unwrapped_name = str_replace(
				$token_in,
				$token_out,
				substr( $value, $prefix_len )
			);
			$value          = "var(--wp--$unwrapped_name)";
		}

		return $value;
	}
}

Blockylicious::init();