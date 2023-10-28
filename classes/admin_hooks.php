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
            $text = $peo->getCustom404PageText() ? $peo->getCustom404PageText() : "";
            $showArticles = $peo->getShowArticles();
            $html = <<<HTML
<div id="custom-404-item-container">
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col h2 text-center">
                Impostazioni pagina 404 personalizzata
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
HTML;
            if($enabledCustomPage)
                $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404" class="form-check-input" name="enable-custom-404" value="true" checked>
HTML;
            else
            $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404" class="form-check-input" name="enable-custom-404" value="true">
HTML;
            $html .= <<<HTML
                <label for="enable-custom-404" class="form-label ms-2">Utilizza la pagina 404</label>
            </div>
        <div>
        <div class="row bordered mt-3">
            <div class="col-12">
HTML;
            if($enabledCustomPage){
                if($useImage)
                $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image" value="true" checked>
HTML;
                else
                    $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image" value="true">
HTML;
            }
            else
                $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image" value="true" disabled>
HTML;
                $html .= <<<HTML
                <label for="enable-custom-404-image" class="form-label ms-2">Utilizza un'immagine per la pagina 404</label>
            </div>
        <div>
HTML;
            if($enabledCustomPage && $useImage)
                    $html .= <<<HTML
        <div id="page-404-image-section" class="row mt-1">
HTML;
            else
                $html .= <<<HTML
        <div id="page-404-image-section" class="row mt-1 d-none">
HTML;
            $html .= <<<HTML
            <div class="col-12 col-lg-6">
                <label for="custom-404-image" class="form-label">Aggiungi o modifica l'immagine per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <input type="file" id="custom-404-image" class="form-control" name="custom-404-image" accept="image/*">
            </div>
            <div id="page-404-image-path" class="col-12">
HTML;
            if($imagePath)
                $html .= <<<HTML
                Percorso immagine 404: {$imagePath}
HTML;       
            $html .= <<<HTML
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
HTML;
            if($enabledCustomPage){
                if($useText)
                    $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text" value="true" checked>
HTML;
                else
                    $html .= <<<HTML
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text" value="true">
HTML;
            }
            else
                $html .= <<<HTML
            <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text" value="true" disabled>
HTML;
            $html .= <<<HTML
                <label for="enable-custom-404-text" class="form-label ms-2">Utilizza un testo per la pagina 404</label>
            </div>
        </div>
HTML;
        
        if($enabledCustomPage && $useText)
            $html .= <<<HTML
        <div id="page-404-text-section" class="row mt-1">
HTML;
        else
            $html .= <<<HTML
        <div id="page-404-text-section" class="row mt-1 d-none">
HTML;
        $html .= <<<HTML
            <div class="col-12 col-lg-6">
                <label for="custom-404-text" class="form-label">Testo per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <textarea id="custom-404-text" class="form-control" name="custom-404-text">{$text}</textarea>
HTML;
        $html .= <<<HTML
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
HTML;
        if($enabledCustomPage){
            if($showArticles)
                $html .= <<<HTML
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" checked> 
HTML;
        else
            $html .= <<<HTML
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true">
HTML;
        }
        else
            $html .= <<<HTML
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true" disabled>
HTML;
        $html .= <<<HTML
                <label for="show-random-articles" class="form-label ms-2">Mostra articoli</label>
            </div>
        </div>
        <div id="custom-404-button-div" class="row mt-3">
            <div class="custom-404-col-button-div col-12 text-center">
                <button type="button" id="custom-404-button" class="btn btn-primary">SALVA MODIFICHE</button>
                <div id="custom-404-button-spinner" class="spinner-border d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div id="custom-404-us-message" class="col-12 text-center"></div>
        </div>
    </div>
</div>          
HTML;
            echo $html;
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