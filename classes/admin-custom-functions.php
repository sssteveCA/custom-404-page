<?php

namespace Custom404Page\Classes;

/**
 * Function used in custom 404 page admin panel
 */
class AdminCustomFunction{

    public function __construct(){}

    /**
     * Add the custom 404 page item in the admin panel
     */
    public function custom_404_page_menu(){
        add_menu_page('Pagina 404 personalizzata','Pagina 404 personalizzata','administrator','custom-404-page',function(){
            echo <<<HTML
HTML;
        });
    }
}
?>