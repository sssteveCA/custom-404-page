<?php

namespace CustomErrorPage\Classes;

use CustomErrorPage\Traits\CommonTrait;
use wpdb;

/**
 * Manage custom 404 page options
 */
class PageErrorOptions{

    use CommonTrait;

    private wpdb $wpdb;

    private string $table_name;

    /**
     * If the custom 404 page must be shown on 404 errors
     */
    private string $enable_custom_404_page;

    /**
     * The custom 404 page header title
     */
    private string $custom_404_page_title;

    /**
     * If the page has an image
     */
    private string $use_image;

    /**
     * The image for the 404 page (only if use_image is true)
     */
    private ?string $image_path;

    /**
     * If the page has custom text
     */
    private string $use_text;

    /**
     * The text for the 404 page (only if use_text is true)
     */
    private ?string $custom_404_page_text;

    /**
     * If the 404 page must show some random articles
     */
    private string $show_articles;

    public function __construct(wpdb $wpdb, string $table_name){
        $this->wpdb = $wpdb;
        $this->table_name = $table_name;
        $this->get_options();
    }

    public function getEnableCustom404Page(): string{ return $this->enable_custom_404_page;}
    public function getCustom404PageTitle(): string{ return $this->custom_404_page_title;}
    public function getUseImage(): string{return $this->use_image;}
    public function getImagePath(): string{return $this->image_path;}
    public function getUseText(): string{return $this->use_text;}
    public function getCustom404PageText(): string{ return $this->custom_404_page_text;}
    public function getShowArticles(): string{return $this->show_articles;}

    /**
     * Fetch the options from the database table
     */
    private function get_options(){
        $sql = <<<SQL
SELECT * FROM {$this->table_name};
SQL;
        $results = $this->wpdb->get_results($sql,ARRAY_A);
        $results_kv = $this->changeResultsArray($results);
        $this->enable_custom_404_page = $results_kv['enable_custom_404_page'];
        $this->use_image = $results_kv['use_image'];
        $this->image_path = $results_kv['image_path'];
        $this->use_text = $results_kv['use_text'];
        $this->custom_404_page_text = $results_kv['custom_404_page_text'];
        $this->show_articles = $results_kv['show_articles'];
    }


}

?>