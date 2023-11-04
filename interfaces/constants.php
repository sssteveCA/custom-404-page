<?php 

namespace CustomErrorPage\Interfaces;

/**
 * Constants used by this plugin
 */
interface Constants{

    /**
     * Relative path to bootstrap main CSS file
     */
    const BOOSTRAP_CSS_RELATIVE = '/custom-404-page/node_modules/boostrap/dist/css/bootstrap.min.css';

    /**
     * Relative path to bootstrap main JS file
     */
    const BOOSTRAP_JS_RELATIVE = '/custom-404-page/node_modules/boostrap/dist/js/bootstrap.min.js';

    /**
     * Relative path to admin page 404 menu CSS stylesheet
     */
    const ADMIN_PAGE_404_MENU_CSS = '/custom_404_page/dist/css/admin_custom_page_menu.css';

    /**
     * Relative path to admin page 404 menu JS script
     */
    const ADMIN_PAGE_404_MENU_JS = '/custom_404_page/dist/js/admin_custom_page_menu.js';

    /**
     * Relative path to the custom 404 frontend page
     */
    const CUSTOM_404_PAGE_CSS_REL = '/custom_404_page/dist/css/wp_custom_404_template.css';

    /**
     * Name of the SQL table created on plugin activation
     */
    const TABLE_NAME = "custom_404_page_table";
}

?>