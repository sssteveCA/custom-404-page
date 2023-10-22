<?php

namespace Custom404Page\Trait;

/**
 * Trait used by CustomFunctions and AdminCustomFunctions classes
 */
trait CustomFunctionsTrait{

    /**
     * Insert the bootstrap CSS and JS main files
     */
    public function enqueue_bootstrap_scripts(){
        $styles = wp_styles();
        $pattern = '/Bootstrap/i';
        array_walk($styles->queue, function($key,$value) use($pattern){
            if(preg_match($pattern, $value)) wp_dequeue_style($value);
        });
        $scripts = wp_scripts();
        array_walk($scripts->queue, function($key,$value) use($pattern){
            if(preg_match($pattern, $value)) wp_dequeue_script($value);
        });
        $bootstrapCss = "";
        $bootstrapJs = "";
        wp_enqueue_style('BootstrapCss',$bootstrapCss,[],'5.3.2');
        wp_enqueue_script('BootstrapJs',$bootstrapJs,[],'5.3.2',true);
    }


}

?>