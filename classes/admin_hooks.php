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
            $peo = new PageErrorOptions($this->wpdb,$this->wpdb->prefix.C::TABLE_NAME);
            $enabledCustomPage = $peo->getEnableCustom404Page();
            $useTitle = $peo->getUseTitle();
            $title = $peo->getTitle();
            $useImage = $peo->getUseImage();
            $imagePath = $peo->getImagePath() ? $peo->getImagePath() : "";
            $useText = $peo->getUseText();
            $text = $peo->getText() ? $peo->getText() : "";
            $showArticles = $peo->getShowArticles();
            $postImagePath = $peo->getPostImagePath();
            include __DIR__.'/../templates/custom_404_menu_page.php';
        });
    }

    /**
     * Add CSS and JS dependencies for the admin custom 404 page menu
     */
    public function enqueue_admin_files(){
        if($_REQUEST['page'] == 'custom-404-page'){
            wp_enqueue_media();
            $css_stylesheet = WP_PLUGIN_DIR.C::ADMIN_PAGE_404_MENU_CSS;
            if(file_exists($css_stylesheet)){
                $css_stylesheet_url = plugins_url().C::ADMIN_PAGE_404_MENU_CSS;
                wp_enqueue_style('Custom404PageMenuCSS',$css_stylesheet_url,[],null);
            }
            $js_script = WP_PLUGIN_DIR.C::ADMIN_PAGE_404_MENU_JS;
            if(file_exists($js_script)){
                $js_script_url = plugins_url().C::ADMIN_PAGE_404_MENU_JS;
                wp_enqueue_script('Custom404PageMenuJS',$js_script_url,[],null,true);
            }
        }
        
    }
}
?>