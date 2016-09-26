<?php

/**
 * Plugin Name:       Category Colors Options
 * Plugin URI:        https://github.com/afragen/category-colors-options
 * Description:       Testing options for The Events Calendar Category Colors plugin
 * Author:            Andy Fragen
 * Version:           0.3.2
 * Author URI:        https://github.com/afragen/
 * GitHub Plugin URI: https://github.com/afragen/category-colors-options
 * GitHub Branch:     master
 */

add_action( 'plugins_loaded', 'teccc_load_options_class', 20 );
function teccc_load_options_class() {
	if ( class_exists( '\\Fragen\\Category_Colors\\Main' ) ) {
		new Category_Colors_Options();
	}
}

class Category_Colors_Options {

	public function __construct() {
		teccc_add_text_color( 'Red', '#f00' );

		//teccc_ignore_slug( 'just-show-up', 'conference' );

		teccc_add_legend_view( 'list' );
		//teccc_add_legend_view( 'upcoming' );
		teccc_add_legend_view( 'photo' );
		teccc_add_legend_view( 'week' );

		//teccc_reposition_legend( 'tribe_events_before_footer' );

		//teccc_remove_default_legend();

		add_filter( 'teccc_legend_html', array( $this, 'add_legend_explanation' ) );
		add_action( 'teccc_add_legend_css', array( $this, 'my_legend_css' ) );

	}

	public function add_legend_explanation( $html ) {
		echo '<div class="legend-explanation"> To focus on events from only one of these categories, just click on the relevant label. </div>' . $html;
	}

	public function my_legend_css() {
		echo '#legend li { font-variant: small-caps; }';
	}
}
