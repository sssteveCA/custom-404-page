<?php

namespace CustomErrorPage\Classes;

use CustomErrorPage\Traits\CommonTrait;
use wpdb;

/**
 * Manage custom 404 page options
 */
class PageErrorOptions extends DatabaseProperties{

    use CommonTrait;

    private wpdb $wpdb;

    private string $table_name;

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
    public function getPostImagePath(): string{return $this->post_image_path;}

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
        $this->post_image_path = $results_kv['post_image_path'];
    }


}

?>