<?php
/**
 * Plugin Name: Easy Block - ACF Pro Addon
 * Text Domain: easy-block-acf-pro-addon
 * Description: Plugin that integrates predefined Gutenberg blocks, work with ACF Pro plugin.
 * Version: 1.0.3
 * Requires at least: 6.4
 * Requires PHP: 7.2
 * Author: Abdul Manaf M
 * Author URI: https://manaf.in/
 * Tested up to: 6.6.2
 * License: GPL3
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 *
 * @package egacf
 **/


if(!defined('ABSPATH')) {
	exit;
}

DEFINE('EG_PLUGIN_PATH', plugin_dir_path( __FILE__ ));
DEFINE('EG_PLUGIN_URL', plugin_dir_url( __FILE__ ));

 
//Check to see if ACF Pro is active.
function eg_acf_blocks_has_parent_plugin() {
	if ( is_admin() && current_user_can( 'activate_plugins' ) && ( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) ) {

		if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php') ){
			add_action( 'admin_notices', 'eg_acf_blocks_parent_plugin_notice' );
		}

		deactivate_plugins( plugin_basename( __FILE__ ) );

	}
}
add_action( 'admin_init', __NAMESPACE__ . 'eg_acf_blocks_has_parent_plugin' );


//Provide a notice message if the parent plugin has been deactivated.
function eg_acf_blocks_parent_plugin_notice() { ?>
	<div class="error">
		<p>Easy Block - ACF Pro Addon has been deactivated because Advanced Custom Fields Pro 6.0+ has been deactivated. Advanced Custom Fields Pro 6.0+ must be active in order for you to use Easy Block - ACF Pro Addon.'</p>
	</div>
	<?php
}


 //register block
 function eg_register_block(){
	//auto popup block
	include_once(EG_PLUGIN_PATH . "blocks/hero-banner/block.php");

	//auto popup block
    include_once(EG_PLUGIN_PATH . "blocks/auto-popup/block.php");

	//carousal block
    include_once(EG_PLUGIN_PATH . "blocks/carousel/block.php");

	//accordion block
    include_once(EG_PLUGIN_PATH . "blocks/accordion/block.php");
 }
 add_action( 'init', 'eg_register_block' );

 include_once(EG_PLUGIN_PATH . "inc/register-block-category.php");