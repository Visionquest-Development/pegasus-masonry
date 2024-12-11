<?php
/*
Plugin Name: Pegasus Masonry Plugin
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: This allows you to create a masonry grid of items on your website with just a shortcode.
Version:     1.0
Author:      Jim O'Brien
Author URI:  https://visionquestdevelopment.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wporg
Domain Path: /languages
*/

	/**
	 * Silence is golden; exit if accessed directly
	 */
	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}


	function masonry_check_main_theme_name() {
		$current_theme_slug = get_option('stylesheet'); // Slug of the current theme (child theme if used)
		$parent_theme_slug = get_option('template');    // Slug of the parent theme (if a child theme is used)

		//error_log( "current theme slug: " . $current_theme_slug );
		//error_log( "parent theme slug: " . $parent_theme_slug );

		if ( $current_theme_slug == 'pegasus' ) {
			return 'Pegasus';
		} elseif ( $current_theme_slug == 'pegasus-child' ) {
			return 'Pegasus Child';
		} else {
			return 'Not Pegasus';
		}
	}

	function pegasus_masonry_menu_item() {
		if ( masonry_check_main_theme_name() == 'Pegasus' || masonry_check_main_theme_name() == 'Pegasus Child' ) {
			//do nothing
		} else {
			//echo 'This is NOT the Pegasus theme';
			add_menu_page(
				"Masonry", // Page title
				"Masonry", // Menu title
				"manage_options", // Capability
				"pegasus_masonry_plugin_options", // Menu slug
				"pegasus_masonry_plugin_settings_page", // Callback function
				null, // Icon
				85 // Position in menu
			);
		}
	}
	add_action("admin_menu", "pegasus_masonry_menu_item");

	function pegasus_masonry_plugin_settings_page() { ?>
	    <div class="wrap pegasus-wrap">
			<h1>Masonry Usage</h1>

			<div>
				<h3>Masonry Usage 1:</h3>
				<style>
					pre {
						background-color: #f9f9f9;
						border: 1px solid #aaa;
						page-break-inside: avoid;
						font-family: monospace;
						font-size: 15px;
						line-height: 1.6;
						margin-bottom: 1.6em;
						max-width: 100%;
						overflow: auto;
						padding: 1em 1.5em;
						display: block;
						word-wrap: break-word;
					}

					input[type="text"].code {
						width: 100%;
					}
				</style>
				<pre >[masonry]<?php echo htmlspecialchars('
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/500/">
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/500/">
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/500/">
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/250/">
	<img src="https://via.placeholder.com/250/500/">'); ?>

[/masonry]</pre>

				<input
					type="text"
					readonly
					value="<?php echo esc_html('[masonry]<img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/500/"><img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/500/"><img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/500/"><img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/250/"><img src="https://via.placeholder.com/250/500/">[/masonry]'); ?>"
					class="regular-text code"
					id="my-shortcode"
					onClick="this.select();"
				>
			</div>

			<p style="color:red;">MAKE SURE YOU DO NOT HAVE ANY RETURNS OR <?php echo htmlspecialchars('<br>'); ?>'s IN YOUR SHORTCODES, OTHERWISE IT WILL NOT WORK CORRECTLY</p>

		</div>
	<?php
	}

	//function pegasus_masonry_menu_item() {
		//add_menu_page("Masonry", "Masonry", "manage_options", "pegasus_masonry_plugin_options", "pegasus_masonry_plugin_settings_page", null, 99);

	//}
	//add_action("admin_menu", "pegasus_masonry_menu_item");

	/*function pegasus_masonry_plugin_settings_page() { ?>
	    <div class="wrap pegasus-wrap">
	    <h1>Masonry</h1>
			<p>Section shortcode Usage: <pre>[masonry] image content goes here [/masonry]</pre></p>
			<p style="color:red;">MAKE SURE YOU DO NOT HAVE ANY RETURNS OR <?php echo htmlspecialchars('<br>'); ?>'s IN YOUR SHORTCODES, OTHERWISE IT WILL NOT WORK CORRECTLY</p>
		</div>
	<?php
	} */


	function pegasus_masonry_plugin_styles() {
		//wp_enqueue_style( 'masonry-css', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/masonry.css', array(), null, 'all' );
		//wp_enqueue_style( 'slippery-slider-css', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'css/slippery-slider.css', array(), null, 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'pegasus_masonry_plugin_styles' );

	/**
	* Proper way to enqueue JS
	*/
	function pegasus_masonry_plugin_js() {

		//wp_enqueue_script( 'one-page-scroll-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/jquery.onepage-scroll.js', array( 'jquery' ), null, true );
		//wp_enqueue_script( 'snap-scroll-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/jquery.snapscroll.js', array( 'jquery' ), null, true );
		//wp_enqueue_script( 'scrollspy-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/scrollspy.js', array( 'jquery' ), null, true );

		wp_register_script( 'images-loaded-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/imagesLoaded.js', array( 'jquery' ), null, 'all' );

		wp_register_script( 'masonry-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/masonry.js', array( 'jquery' ), null, 'all' );
		wp_register_script( 'pegasus-masonry-plugin-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/plugin.js', array( 'jquery' ), null, 'all' );

	} //end function
	add_action( 'wp_enqueue_scripts', 'pegasus_masonry_plugin_js' );

	/*~~~~~~~~~~~~~~~~~~~~
		MASONRY
	~~~~~~~~~~~~~~~~~~~~~*/
	// [masonry ] content [/masonry]
		function pegasus_mason_func( $atts, $content = null ) {
			$a = shortcode_atts( array(
				'id' => '',
				'class' => ''
			), $atts );

			$output = '';

				$output .= '<div id="masonry-grid" class="" >';
					$output .=   do_shortcode($content);
				$output .= '</div>';

			wp_enqueue_script( 'images-loaded-js' );
			wp_enqueue_script( 'masonry-js' );
			wp_enqueue_script( 'pegasus-masonry-plugin-js' );

			return $output;
		}
		add_shortcode( 'masonry', 'pegasus_mason_func' );




