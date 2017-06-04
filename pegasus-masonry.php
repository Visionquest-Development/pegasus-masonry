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

	function pegasus_masonry_menu_item() {
		add_menu_page("Masonry", "Masonry", "manage_options", "pegasus_masonry_plugin_options", "pegasus_masonry_plugin_settings_page", null, 99);
		
	}
	add_action("admin_menu", "pegasus_masonry_menu_item");

	function pegasus_masonry_plugin_settings_page() { ?>
	    <div class="wrap pegasus-wrap">
	    <h1>Masonry</h1>			
			<p>Section shortcode Usage: <pre>[masonry] image content goes here [/masonry]</pre></p>	
			<p style="color:red;">MAKE SURE YOU DO NOT HAVE ANY RETURNS OR <?php echo htmlspecialchars('<br>'); ?>'s IN YOUR SHORTCODES, OTHERWISE IT WILL NOT WORK CORRECTLY</p>
		</div>
	<?php
	}

	
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
		
		wp_enqueue_script( 'images-loaded-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/imagesLoaded.js', array( 'jquery' ), null, true );
		
		wp_enqueue_script( 'masonry-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/masonry.js', array( 'jquery' ), null, true );
		wp_enqueue_script( 'pegasus-masonry-plugin-js', trailingslashit( plugin_dir_url( __FILE__ ) ) . 'js/plugin.js', array( 'jquery' ), null, true );
		
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
				$output .= '</div><br clear="all">';
			
			return $output; 
		}
		add_shortcode( 'masonry', 'pegasus_mason_func' );
	
		
		
		
		