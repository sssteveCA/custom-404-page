<?php

namespace CustomErrorPage\Classes;

use CustomErrorPage\Traits\HooksTrait;
use wpdb;

class WpHooks{

    use HooksTrait;

    const TABLE_NAME = "custom_404_page_table";

    private wpdb $wpdb;

    public function __construct(wpdb $wpdb){
        $this->wpdb = $wpdb;
    }

    /**
     * Show the custom 404 page
     */
    public function custom_404_page(){
        $custom_404_template_path = __DIR__.'/../templates/custom_404_template.php';
        if(is_404() && file_exists($custom_404_template_path) && is_file($custom_404_template_path)){
            $peo = new PageErrorOptions($this->wpdb,$this->wpdb->prefix.self::TABLE_NAME);
            $enabledCustomPage = $peo->getEnableCustom404Page();
            if($enabledCustomPage){
                $useImage = $peo->getUseImage();
                $imagePath = $peo->getImagePath() ? $peo->getImagePath() : "";
                $useText = $peo->getUseText();
                $custom404PageText = $peo->getCustom404PageText() ? $peo->getCustom404PageText() : "";
                $showArticles = $peo->getShowArticles();
                include $custom_404_template_path;
                exit();
            }
        }
    }
}
?>