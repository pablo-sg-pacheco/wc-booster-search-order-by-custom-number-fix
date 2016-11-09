<?php

/**
 * Plugin Name: Woocommerce Booster - Search order by custom number (FIX)
 * Description: Fixes the problem of searching an order by custom number on admin using the plugin <a href="http://booster.io/">"Woocommerce Booster"</a>
 * Version:     1.0.0
 * Author:      Pablo Pacheco Karzin 
 * Depends:     CMB2
 * License:     GPLv2
 * Text Domain: wc-booster-search-order-by-custom-number
 */

namespace WCSON;

//SETUP AUTOLOAD ======================================================================
spl_autoload_register(function($class) {
	if ( false !== strpos($class, __NAMESPACE__) ) {
		if ( !class_exists($class) ) {
			$dir = plugin_dir_path(__FILE__);
			$classes_dir = $dir;
			$class_file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
			$class_file = str_replace(__NAMESPACE__.DIRECTORY_SEPARATOR, '',$class_file);
			$file = $classes_dir . $class_file;
			if ( file_exists($file) ) {
				require_once $file;
			}else{
				error_log( 'ERROR LOADING FILE: '.  print_r($file , true ) );
			}
		}
	}
});

$order = \WCSON\Order::get_instance();
add_action('pre_get_posts',array($order,'search_by_custom_number'));
