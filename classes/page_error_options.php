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
     * If the page has a custom title
     */
    private string $use_title;

    /**
     * The custom 404 page header title
     */
    private string $title;

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
    private ?string $text;

    /**
     * If the 404 page must show some random articles
     */
    private string $show_articles;

    /**
     * URL of default post thumbnail
     */
    private string $default_post_thumbnail;

    public function __construct(wpdb $wpdb, string $table_name){
        $this->wpdb = $wpdb;
        $this->table_name = $table_name;
        $this->get_options();
    }

    public function getEnableCustom404Page(): string{ return $this->enable_custom_404_page;}
    public function getUseTitle(): string{return $this->use_title;}
    public function getTitle(): string{ return $this->title;}
    public function getUseImage(): string{return $this->use_image;}
    public function getImagePath(): string{return $this->image_path;}
    public function getUseText(): string{return $this->use_text;}
    public function getText(): string{ return $this->text;}
    public function getShowArticles(): string{return $this->show_articles;}
    public function getDefaultPostThumbnail(): string{return $this->default_post_thumbnail;}

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
        $this->use_title = $results_kv['use_title'];
        $this->title = $results_kv['title'];
        $this->use_image = $results_kv['use_image'];
        $this->image_path = $results_kv['image_path'];
        $this->use_text = $results_kv['use_text'];
        $this->text = $results_kv['text'];
        $this->show_articles = $results_kv['show_articles'];
        $this->default_post_thumbnail = $results_kv['default_post_thumbnail'];
    }


}

?>