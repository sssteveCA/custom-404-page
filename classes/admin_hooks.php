<?php

namespace CustomErrorPage\Classes;
use CustomErrorPage\Traits\HooksTrait;
use wpdb;
use CustomErrorPage\Interfaces\Constants as C;

/**
 * Function used in custom 404 page admin panel
 */
class AdminHooks{

    use HooksTrait;

    const TABLE_NAME = "custom_404_page_table";

    private wpdb $wpdb;

    public function __construct(wpdb $wpdb){
        $this->wpdb = $wpdb;
    }

    /**
     * Add the custom 404 page item in the admin panel
     */
    public function custom_404_page_menu(){
        add_menu_page('Pagina 404 personalizzata','Pagina 404 personalizzata','administrator','custom-404-page',function(){
            $peo = new PageErrorOptions($this->wpdb,$this->wpdb->prefix.self::TABLE_NAME);
            $enabledCustomPage = $peo->getEnableCustom404Page();
            $useImage = $peo->getUseImage();
            $imagePath = $peo->getImagePath() ? $peo->getImagePath() : "";
            $useText = $peo->getUseText();
            $custom404PageText = $peo->getCustom404PageText() ? $peo->getCustom404PageText() : "";
            $showArticles = $peo->getShowArticles();
            include __DIR__.'/../templates/custom_404_menu_page.php';
        });
    }

    /**
     * Add CSS and JS dependencies for the admin custom 404 page menu
     */
    public function enqueue_admin_files(){
        if($_REQUEST['page'] == 'custom-404-page'){
            wp_enqueue_media();
            $css_stylesheet_relative = '/custom_404_page/dist/css/admin_custom_page_menu.css';
            $css_stylesheet = WP_PLUGIN_DIR.$css_stylesheet_relative;
            if(file_exists($css_stylesheet)){
                $css_stylesheet_url = plugins_url().$css_stylesheet_relative;
                wp_enqueue_style('Custom404PageMenuCSS',$css_stylesheet_url,[],null);
            }
            $js_script_relative = '/custom_404_page/dist/js/admin_custom_page_menu.js';
            $js_script = WP_PLUGIN_DIR.$js_script_relative;
            if(file_exists($js_script)){
                $js_script_url = plugins_url().$js_script_relative;
                wp_enqueue_script('Custom404PageMenuJS',$js_script_url,[],null,true);
            }
        }
        
    }
}
?>