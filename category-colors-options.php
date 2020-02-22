<?php
/**
 * Plugin Name:       Category Colors Options
 * Plugin URI:        https://github.com/afragen/category-colors-options
 * Description:       Testing options for The Events Calendar Category Colors plugin
 * Author:            Andy Fragen
 * Version:           0.4.0
 * Author URI:        https://github.com/afragen/
 * GitHub Plugin URI: https://github.com/afragen/category-colors-options
 * Requires PHP:      5.6
 * Requires at least: 4.6
 */

class Category_Colors_Options {

	public function __construct() {
		teccc_add_text_color( 'Red', '#f00' );

		// teccc_ignore_slug( 'just-show-up', 'conference' );

		teccc_add_legend_view( 'list' );
		teccc_add_legend_view( 'day' );
		// teccc_add_legend_view( 'upcoming' );
		teccc_add_legend_view( 'photo' );
		teccc_add_legend_view( 'week' );
		teccc_add_legend_view( 'map' );

		// teccc_reposition_legend( 'tribe_events_before_footer' );

		// teccc_remove_default_legend();
	}
}

// Loads Category Colors Options.
add_action(
	'plugins_loaded',
	function() {
		if ( class_exists( '\\Fragen\\Category_Colors\\Main' ) && class_exists( 'Tribe__Events__Main' ) ) {
			new Category_Colors_Options();
		}
	},
	20
);

// Example of 'teccc_legend_html' filter.
add_filter(
	'teccc_legend_html',
	function( $html ) {
		echo '<div class="legend-explanation"> To focus on events from only one of these categories, jusclick on the relevant label. </div>' . $html;
	}
);

// Example of 'teccc_add_legend_css' filter.
add_action(
	'teccc_add_legend_css',
	function() {
		echo '#legend li { font-variant: small-caps; }';
	}
);
