<?php

namespace CustomErrorPage\Classes;

use wpdb;

/**
 * Manage custom 404 page options
 */
class PageErrorOptions{


    private wpdb $wpdb;

    /**
     * If the custom 404 page must be shown on 404 errors
     */
    private bool $enable_custom_404_page;

    /**
     * If the page has an image
     */
    private bool $use_image;

    /**
     * The image for the 404 page (only if use_image is true)
     */
    private string $image_path;

    /**
     * If the page has custom text
     */
    private bool $use_text;

    /**
     * The text for the 404 page (only if use_text is true)
     */
    private string $custom_404_page_text;

    /**
     * If the 404 page must show some random articles
     */
    private bool $show_articles;

    public function __construct(wpdb $wpdb){
        $this->wpdb = $wpdb;
    }

    public function getEnableCustom404Page(): bool{ return $this->enable_custom_404_page;}
    public function getUseImage(): bool{return $this->use_image;}
    public function getImagePath(): string{return $this->image_path;}
    public function getUseText(): bool{return $this->use_text;}
    public function getCustom404PageText(): string{ return $this->custom_404_page_text;}
    public function getShowArticles(): bool{return $this->show_articles;}


}

?>