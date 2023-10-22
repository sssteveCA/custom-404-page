<?php

/**
 * Plugin Name: Custom 404 page
 * Description: Customize your 404 page
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: Stefano Puggioni
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: custom-404-page
 */

require_once __DIR__."/vendor/autoload.php";

use Custom404Page\Classes\ActivationDeactivation;
use Custom404Page\Classes\AdminCustomFunction;
use Custom404Page\Classes\CustomFunctions;

$ad = new ActivationDeactivation($wpdb);

register_activation_hook(__FILE__,[$ad,'activate']);
register_uninstall_hook(__FILE__,[$ad,'uninstall']);

$cf = new CustomFunctions();
$acf = new AdminCustomFunction();

add_action('template_redirect',[$cf,'custom_404_page']);
add_action('admin_menu',[$acf,'custom_404_page_menu']);
?>