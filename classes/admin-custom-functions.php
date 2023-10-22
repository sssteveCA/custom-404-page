<?php

namespace Custom404Page\Classes;
use Custom404Page\Trait\CustomFunctionsTrait;

/**
 * Function used in custom 404 page admin panel
 */
class AdminCustomFunction{

    use CustomFunctionsTrait;

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
            <div class="col">
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image">
                <label for="enable-custom-404-image" class="form-label ms-2">Utilizza un'immagine per la pagina 404</label>
            </div>
            <div class="col">
                <label for="custom-404-image" class="form-label">Aggiungi o modifica l'immagine per la pagina 404</label>
                <input type="file" id="custom-404-image" class="form-control" name="custom-404-image" accept="image/*">
            </div>
            <div class="col">
                Percorso immagine 404: 
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text">
                <label for="enable-custom-404-text" class="form-label ms-2">Utilizza un testo per la pagina 404</label>
            </div>
            <div class="col d-flex flex-column">
                <label for="custom-404-text" class="form-label">Testo per la pagina 404</label>
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
}
?>