<?php
use CustomErrorPage\Classes\ActivationDeactivation;
use CustomErrorPage\Classes\AdminHooks;
use CustomErrorPage\Classes\WpHooks;

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

require_once __DIR__.'/vendor/autoload.php';

$wpdb = $GLOBALS['wpdb'];
$ad = new ActivationDeactivation($wpdb);
$ah = new AdminHooks($wpdb);
$wh = new WpHooks($wpdb);

register_activation_hook(__FILE__,[$ad,'activate']);
register_uninstall_hook(__FILE__,[$ad,'uninstall']);

add_action('admin_enqueue_scripts',[$ah,'enqueue_bootstrap_scripts'],11);
add_action('admin_enqueue_scripts',[$ah,'enqueue_admin_files']);
add_action('admin_menu',[$ah,'custom_404_page_menu']);
add_action('template_redirect',[$wh,'custom_404_page']);
add_action('wp_enqueue_scripts',[$wh,'enqueue_bootstrap_scripts'],11);
add_action('wp_enqueue_scripts',[$wh,'enqueue_custom_404_page_scripts']);
?>