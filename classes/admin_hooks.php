<?php

namespace CustomErrorPage\Classes;
use CustomErrorPage\Traits\HooksTrait;


/**
 * Function used in custom 404 page admin panel
 */
class AdminHooks{

    use HooksTrait;

    public function __construct(){}

    /**
     * Add the custom 404 page item in the admin panel
     */
    public function custom_404_page_menu(){
        add_menu_page('Pagina 404 personalizzata','Pagina 404 personalizzata','administrator','custom-404-page',function(){
            echo <<<HTML
<div id="custom-404-item-container">
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col h2 text-center">
                Impostazioni pagina 404 personalizzata
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input type="checkbox" id="enable-custom-404" class="form-check-input" name="enable-custom-404">
                <label for="enable-custom-404" class="form-label ms-2">Utilizza la pagina 404</label>
            </div>
        <div>
        <div class="row mt-3">
            <div class="col-12">
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image">
                <label for="enable-custom-404-image" class="form-label ms-2">Utilizza un'immagine per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <label for="custom-404-image" class="form-label">Aggiungi o modifica l'immagine per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <input type="file" id="custom-404-image" class="form-control" name="custom-404-image" accept="image/*">
            </div>
            <div class="col-12">
                Percorso immagine 404: 
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text">
                <label for="enable-custom-404-text" class="form-label ms-2">Utilizza un testo per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <label for="custom-404-text" class="form-label">Testo per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <textarea id="custom-404-text" class="form-control" name="custom-404-text"></textarea>
            </div>
        </div>
        <div class="row-mt-3">
            <div class="col">
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles">
                <label for="show-random-articles" class="form-label ms-2">Mostra articoli</label>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <button type="button" id="custom-404-button" class="btn btn-primary">SALVA MODIFICHE</button>
            </div>
        </div>
    </div>
</div>          
HTML;
        });
    }

    /**
     * Add CSS and JS dependencies for the admin custom 404 page menu
     */
    public function enqueue_admin_files(){
        $css_stylesheet = plugins_url().'/custom_404_page/dist/css/admin_custom_page_menu.css';
        if(file_exists($css_stylesheet)){
            wp_enqueue_style('Custom404PageMenu',$css_stylesheet,[],null);
        }
    }
}
?>