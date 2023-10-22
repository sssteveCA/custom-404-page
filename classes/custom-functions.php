<?php

namespace Custom404Page\Classes;

/**
 * Custom 404 page main file functions
 */
class CustomFunctions{

    public function __construct(){}


    /**
     * Show the custom 404 page
     */
    public function custom_404_page(){
        if(is_404()){
            include __DIR__.'/../templates/custom-404-template.php';
            exit();
        }
    }


}

?>
