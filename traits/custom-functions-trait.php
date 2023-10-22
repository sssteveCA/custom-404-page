<?php

namespace Custom404Page\Traits;

/**
 * trait used from private CustomFunction methods
 */
trait CustomFunctionTrait{

    /**
     * Get the slug of the used template
     */
    private function get_used_template_slug() {
        $template_slug = get_page_template_slug();
        $template_slug = preg_replace('/\.[^.]+$/','',basename($template_slug));
        return $template_slug;
    }

}