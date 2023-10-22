<?php

namespace CustomErrorPage\Classes;

/**
 * Custom 404 page main file functions
 */
class WpHooks{

    use \CustomErrorPage\Traits\HooksTrait;

    public function __construct(){}

    /**
     * Show the custom 404 page
     */
    public function custom_404_page(){
        $custom_404_template_path = __DIR__.'/../templates/custom_404_template.php';
        if(is_404() && file_exists($custom_404_template_path) && is_file($custom_404_template_path)){
            include $custom_404_template_path;
            exit();
        }
    }

}

?>
