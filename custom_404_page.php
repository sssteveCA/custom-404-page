<?php
use CustomErrorPage\Classes\ActivationDeactivation;
use CustomErrorPage\Classes\AdminHooks;
/**
 * Plugin Name: Custom 404 page
 * Description: Customize your 404 page
 * Version: 1.0
 * Requires at least: 6.0
 * Requires PHP: 8.0
 * Author: Stefano Puggioni
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: custom_404_page
 */

//require_once ("interfaces/constants.php");
require_once("traits/hooks_trait.php");
require_once("classes/activation_deactivation.php");
require_once("classes/admin_hooks.php");
//require_once ("classes/wp_hooks.php");

$wpdb = $GLOBALS['wpdb'];
$ad = new ActivationDeactivation($wpdb);
$acf = new AdminHooks($wpdb);
//$cf = new \CustomErrorPage\Classes\WpHooks();

/* register_activation_hook(__FILE__,[$ad,'activate']);
register_uninstall_hook(__FILE__,[$ad,'uninstall']); */

add_action('admin_enqueue_scripts',[$acf,'enqueue_bootstrap_scripts'],11);
add_action('admin_enqueue_scripts',[$acf,'enqueue_admin_files']);
add_action('admin_menu',[$acf,'custom_404_page_menu']);
/* add_action('template_redirect',[$cf,'custom_404_page']);
add_action('wp_enqueue_scripts',[$cf,'enqueue_bootstrap_scripts'],11); */
?>