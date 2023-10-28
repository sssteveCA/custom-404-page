<?php

namespace CustomErrorPage\Classes;
use wpdb;

/**
 * Update the custom 404 page menu settings
 */
class UpdateSettings{

    private wpdb $wpdb;
    private string $table_name;

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
    private ?string $image_path;

    /**
     * If the page has custom text
     */
    private bool $use_text;

    /**
     * The text for the 404 page (only if use_text is true)
     */
    private ?string $custom_404_page_text;

    /**
     * If the 404 page must show some random articles
     */
    private bool $show_articles;

    public function __construct(array $data)
    {
        
    }

}
?>