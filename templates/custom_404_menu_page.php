<div id="custom-404-item-container">
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col h2 text-center">
                Impostazioni pagina 404 personalizzata
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <?php if($enabledCustomPage == 'true'): ?>
                <input type="checkbox" id="enable-custom-404-page" class="form-check-input" name="enable-custom-404-page" value="true" checked>
            <?php else: ?>
                <input type="checkbox" id="enable-custom-404-page" class="form-check-input" name="enable-custom-404-page" value="true">
            <?php endif; ?>
                <label for="enable-custom-404-page" class="form-label ms-2">Utilizza la pagina 404</label>
            </div>
        <div>
        <div class="row mt-3">
            <div class="col-12">
                <?php if($enabledCustomPage == 'true'): ?>
                    <?php if($useTitle == 'true'): ?>
                        <input type="checkbox" id="use-custom-404-title" class="form-check-input" name="use-custom-404-title" value="true" checked>
                    <?php else: ?>
                        <input type="checkbox" id="use-custom-404-title" class="form-check-input" name="use-custom-404-title" value="true">
                    <?php endif; ?>
                <?php else: ?>
                    <input type="checkbox" id="use-custom-404-title" class="form-check-input" name="use-custom-404-title" value="true" disabled>
                <?php endif; ?>
                    <label for="use-custom-404-title" class="form-label ms-2">Titolo per la pagina 404</label>
            </div>
        </div>
        <?php if($enabledCustomPage == 'true' && $useTitle == 'true'): ?>
        <div id="custom-404-title-section" class="row mt-1">
        <?php else: ?>
        <div id="custom-404-title-section" class="row mt-1 d-none">
        <?php endif; ?>
            <div class="col-12 col-lg-6">
                <label for="custom-404-title" class="form-label">Titolo</label>
            </div>
            <div class="col-12 col-lg-6">
                <input type="text" id="custom-404-title" class="form-control" name="custom-404-title" value="<?php echo esc_attr($title); ?>">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
            <?php if($enabledCustomPage == 'true'): ?>
                <?php if($useImage == 'true'): ?>
                <input type="checkbox" id="use-custom-404-image" class="form-check-input" name="use-custom-404-image" value="true" checked>
                <?php else: ?>
                <input type="checkbox" id="use-custom-404-image" class="form-check-input" name="use-custom-404-image" value="true">
                <?php endif; ?>
            <?php else: ?>
                <input type="checkbox" id="use-custom-404-image" class="form-check-input" name="use-custom-404-image" value="true" disabled>
            <?php endif; ?>    
                <label for="use-custom-404-image" class="form-label ms-2">Utilizza un'immagine per la pagina 404</label>
            </div>
        </div>
        <?php if($enabledCustomPage == 'true' && $useImage == 'true'): ?>
        <div id="custom-404-image-section" class="row mt-1">
        <?php else: ?>
        <div id="custom-404-image-section" class="row mt-1 d-none">
        <?php endif; ?>
            <div class="col-12 col-lg-6">
                <label for="custom-404-image" class="form-label">Aggiungi o modifica l'immagine per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <input type="file" id="custom-404-image" class="form-control" name="custom-404-image" accept="image/*">
                <input type="hidden" id="custom-404-image-path" name="image_path" value="<?php echo esc_url($imagePath); ?>">
            </div>
            <div id="custom-404-image-path-div" class="col-12 mt-2">
            <?php if(!empty($imagePath)): ?>
                Percorso immagine 404: <?php echo esc_url($imagePath); ?>
            <?php endif; ?>       
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
            <?php if($enabledCustomPage == 'true'): ?>
                <?php if($useText == 'true'): ?>
                <input type="checkbox" id="use-custom-404-text" class="form-check-input" name="use-custom-404-text" value="true" checked>
                <?php else: ?>
                <input type="checkbox" id="use-custom-404-text" class="form-check-input" name="use-custom-404-text" value="true">
                <?php endif; ?>
            <?php else: ?>
                <input type="checkbox" id="use-custom-404-text" class="form-check-input" name="use-custom-404-text" value="true" disabled>
            <?php endif; ?>
                <label for="use-custom-404-text" class="form-label ms-2">Utilizza un testo per la pagina 404</label>
            </div>
        </div>
        <?php if($enabledCustomPage == 'true' && $useText == 'true'): ?>
        <div id="page-404-text-section" class="row mt-1">
        <?php else: ?>
        <div id="page-404-text-section" class="row mt-1 d-none">
        <?php endif; ?>
            <div class="col-12 col-lg-6">
                <label for="custom-404-text" class="form-label">Testo per la pagina 404</label>
            </div>
            <div class="col-12 col-lg-6">
                <textarea id="custom-404-text" class="form-control" name="custom-404-text"><?php echo esc_html($text); ?></textarea>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
        <?php if($enabledCustomPage == 'true'): ?>
            <?php if($showArticles == 'true'): ?>
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true" checked> 
            <?php else: ?>
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true">
            <?php endif; ?>
        <?php else: ?>
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true" disabled>
        <?php endif; ?>
                <label for="show-random-articles" class="form-label ms-2">Mostra articoli</label>
            </div>
        <?php if($showArticles == 'true'): ?>
            <div id="custom-404-post-image-section" class="row mt-1">
        <?php else: ?>
            <div id="custom-404-post-image-section" class="row mt-1 d-none">
        <?php endif; ?>
                <div class="col-12 col-lg-6">
                    <label for="custom-404-post-image" class="form-label">Aggiungi o modifica la miniatura di default degli articoli</label>
                </div>
                <div class="col-12 col-lg-6">
                    <input type="file" id="custom-404-post-image" class="form-control" name="custom-404-post-image" accept="image/*">
                    <input type="hidden" id="custom-404-post-image-path" name="image_post_path" value="<?php echo esc_url($postImagePath); ?>">
                </div>
                <div id="custom-404-post-image-path-div" class="col-12 mt-2">
                <?php if(!empty($postImagePath)): ?>
                    Percorso immagine miniatura: <?php echo esc_url($postImagePath); ?>
                <?php endif; ?>       
                </div>
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