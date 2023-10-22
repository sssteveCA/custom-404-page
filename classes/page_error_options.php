<?php

namespace CustomErrorPage\Classes;

use wpdb;

/**
 * Manage custom 404 page options
 */
class PageErrorOptions{


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

    public function __construct(wpdb $wpdb, string $table_name){
        $this->wpdb = $wpdb;
        $this->table_name = $table_name;
        $this->get_options();
    }

    public function getEnableCustom404Page(): bool{ return $this->enable_custom_404_page;}
    public function getUseImage(): bool{return $this->use_image;}
    public function getImagePath(): ?string{return $this->image_path;}
    public function getUseText(): bool{return $this->use_text;}
    public function getCustom404PageText(): ?string{ return $this->custom_404_page_text;}
    public function getShowArticles(): bool{return $this->show_articles;}

    /**
     * Fetch the options from the database table
     */
    private function get_options(){
        $sql = <<<SQL
SELECT * FROM {$this->table_name};
SQL;
        $result = $this->wpdb->get_results($sql,ARRAY_A);
        $this->enable_custom_404_page = (isset($result['enable_custom_404_page'])) ? $result['enable_custom_404_page'] : false;
        $this->use_image = (isset($result['use_image'])) ? $result['use_image'] : false;
        $this->image_path = (isset($result['image_path'])) ? $result['image_path'] :null;
        $this->use_text = (isset($result['use_text'])) ? $result['use_test'] : false;
        $this->custom_404_page_text = (isset($result['custom_404_page_text'])) ? $result['custom_404_page_text'] : null;
        $this->show_articles = (isset($result['show_articles'])) ? $result['show_articles'] : false;
    }


}

?>