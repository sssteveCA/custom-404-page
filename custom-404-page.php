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

require_once __DIR__."/classes/custom-functions.php";
use Custom404Page\Classes\CustomFunctions;

$cf = new CustomFunctions();

add_action('template_redirect',[$cf,'custom_404_page']);
?>