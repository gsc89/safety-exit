<?php
/**
 * Safety Exit
 *
 * @package   SafetyExit
 * @author    Tomas Cordero
 * @copyright Copyright (c) 2018 Tomas Cordero
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Safety Exit
 * Plugin URI:
 * Description: A safety exit plugin
 * Version:     1.4.2
 * Author:      Tomas Cordero
 * Author URI:  https://tomascordero.com
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: safety-exit
 */


// If this file is called directly, abort.
require_once(realpath(dirname(__FILE__) . '/../../../')."/wp-includes/pluggable.php");
if ( ! defined( 'WPINC' ) ) {
	die;
}
foreach ( glob( plugin_dir_path( __FILE__ ) . 'lib/*.php' ) as $file ) {
    include_once $file;
}
if ( is_admin() ){
	if(current_user_can('administrator')){
		$admin = new Safety_Exit_Admin(__FILE__);
		$admin->init();
	}
} else {
	$frontend = new Safety_Exit_Frontend(__FILE__);
	$frontend->init();
}