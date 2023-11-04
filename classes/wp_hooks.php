<?php

namespace CustomErrorPage\Classes;

use CustomErrorPage\Traits\HooksTrait;
use CustomErrorPage\Interfaces\Constants as C;
use wpdb;

class WpHooks{

    use HooksTrait;

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
            $peo = new PageErrorOptions($this->wpdb,$this->wpdb->prefix.C::TABLE_NAME);
            $enabledCustomPage = $peo->getEnableCustom404Page();
            if($enabledCustomPage){
                $useTitle = $peo->getUseTitle();
                $title = $peo->getTitle();
                $useImage = $peo->getUseImage();
                $imagePath = $peo->getImagePath() ? $peo->getImagePath() : "";
                $useText = $peo->getUseText();
                $text = $peo->getText() ? $peo->getText() : "";
                $showArticles = $peo->getShowArticles();
                $postImagePath = $peo->getPostImagePath();
                include $custom_404_template_path;
                exit();
            }
        }
    }

    /**
     * Enqueue the necessary scripts for the custom 404 page
     */
    public function enqueue_custom_404_page_scripts(){
        $custom404PageCssAbs = WP_PLUGIN_DIR.C::CUSTOM_404_PAGE_CSS_REL;
        if(file_exists($custom404PageCssAbs)){
            $custom404PageCssUrl = plugins_url().C::CUSTOM_404_PAGE_CSS_REL;
            wp_enqueue_style('custom404PageCss',$custom404PageCssUrl,[],null);
        }
    }

}
?>