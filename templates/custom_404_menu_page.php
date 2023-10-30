<div id="custom-404-item-container">
    <div class="container-fluid">
        <div class="row mt-1">
            <div class="col h2 text-center">
                Impostazioni pagina 404 personalizzata
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
            <?php if($enabledCustomPage): ?>
                <input type="checkbox" id="enable-custom-404" class="form-check-input" name="enable-custom-404" value="true" checked>
            <?php else: ?>
                <input type="checkbox" id="enable-custom-404" class="form-check-input" name="enable-custom-404" value="true">
            <?php endif; ?>
                <label for="enable-custom-404" class="form-label ms-2">Utilizza la pagina 404</label>
            </div>
        <div>
        <div class="row mt-3">
            <div class="col-12">
                <?php if($enabledCustomPage): ?>
                    <?php if($useTitle): ?>
                        <input type="checkbox" id="enable-custom-404-title" class="form-check-input" name="enable-custom-404-title" value="true" checked>
                    <?php else: ?>
                        <input type="checkbox" id="enable-custom-404-title" class="form-check-input" name="enable-custom-404-title" value="true">
                    <?php endif; ?>
                <?php else: ?>
                    <input type="checkbox" id="enable-custom-404-title" class="form-check-input" name="enable-custom-404-title" value="true" disabled>
                <?php endif; ?>
                    <label for="enable-custom-404-title" class="form-label ms-2">Titolo per la pagina 404</label>
            </div>
        </div>
        <?php if($enabledCustomPage && $useTitle): ?>
        <div id="custom-404-title-section" class="row mt-1">
        <?php else: ?>
        <div id="custom-404-title-section" class="row mt-1 d-none">
        <?php endif; ?>
            <div class="col-12 col-lg-6">
                <label for="custom-404-title" class="form-label">Titolo</label>
            </div>
            <div class="col-12 col-lg-6">
                <input type="text" id="custom-404-title" class="form-control" name="custom-404-title" accept="image/*">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
            <?php if($enabledCustomPage): ?>
                <?php if($useImage): ?>
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image" value="true" checked>
                <?php else: ?>
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image" value="true">
                <?php endif; ?>
            <?php else: ?>
                <input type="checkbox" id="enable-custom-404-image" class="form-check-input" name="enable-custom-404-image" value="true" disabled>
            <?php endif; ?>    
                <label for="enable-custom-404-image" class="form-label ms-2">Utilizza un'immagine per la pagina 404</label>
            </div>
        </div>
        <?php if($enabledCustomPage && $useImage): ?>
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
            <?php if($imagePath): ?>
                Percorso immagine 404: <?php echo esc_url($imagePath); ?>
            <?php endif; ?>       
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
            <?php if($enabledCustomPage): ?>
                <?php if($useText): ?>
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text" value="true" checked>
                <?php else: ?>
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text" value="true">
                <?php endif; ?>
            <?php else: ?>
                <input type="checkbox" id="enable-custom-404-text" class="form-check-input" name="enable-custom-404-text" value="true" disabled>
            <?php endif; ?>
                <label for="enable-custom-404-text" class="form-label ms-2">Utilizza un testo per la pagina 404</label>
            </div>
        </div>
        <?php if($enabledCustomPage && $useText): ?>
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
        <?php if($enabledCustomPage): ?>
            <?php if($showArticles): ?>
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true" checked> 
            <?php else: ?>
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true">
            <?php endif; ?>
        <?php else: ?>
                <input type="checkbox" id="show-random-articles" class="form-check-input" name="show-random-articles" value="true" disabled>
        <?php endif; ?>
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