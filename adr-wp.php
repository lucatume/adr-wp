<?php
/**
 * Plugin Name: ADR
 * Description: Plugin based implementation of the ADR pattern in WordPress.
 * Plugin URI: https://github.com/lucatume/adr-wp
 * Author: Luca Tumedei
 * Author URI: http://theaveragedev.com
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: adr
 * Domain Path: /languages
 * Network: true
 */

if (version_compare(PHP_VERSION, '5.3.0', '>=')) {
	include_once __DIR__ . '/vendor/autoload.php';
} else {
	include_once dirname(__FILE__) . '/vendor/autoload_52.php';
}
