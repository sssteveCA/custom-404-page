<?php

namespace Custom404Page\Traits;

/**
 * Trait used by WpHooks and AdminHooks classes
 */
trait HooksTrait{

    /**
     * Insert the bootstrap CSS and JS main files
     */
    public function enqueue_bootstrap_scripts(){
        $bootstrapCssAbs = WP_PLUGIN_DIR.\Custom404Page\Interfaces\Constants::BOOSTRAP_CSS_RELATIVE;
        $bootstrapJsAbs = WP_PLUGIN_DIR.\Custom404Page\Interfaces\Constants::BOOSTRAP_JS_RELATIVE;
        if(file_exists($bootstrapCssAbs) && file_exists($bootstrapJsAbs)){
            $styles = wp_styles();
            $pattern = '/Bootstrap/i';
            array_walk($styles->queue, function($key,$value) use($pattern){
                if(preg_match($pattern, $value)) wp_dequeue_style($value);
            });
            $scripts = wp_scripts();
            array_walk($scripts->queue, function($key,$value) use($pattern){
                if(preg_match($pattern, $value)) wp_dequeue_script($value);
            });
            $bootstrapCss = plugins_url().\Custom404Page\Interfaces\Constants::BOOSTRAP_CSS_RELATIVE;
            $bootstrapJs = plugins_url().\Custom404Page\Interfaces\Constants::BOOSTRAP_JS_RELATIVE;
            wp_enqueue_style('BootstrapCss',$bootstrapCss,[],'5.3.2');
            wp_enqueue_script('BootstrapJs',$bootstrapJs,[],'5.3.2',true);
        }
    }


}

?>