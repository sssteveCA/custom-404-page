<?php

namespace Custom404Page\Interfaces;

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
     * Name of the SQL table created on plugin activation
     */
    const TABLE_NAME = "custom_404_page_table";
}

?>