<?php

namespace CustomErrorPage\Classes;

use CustomErrorPage\Exceptions\InvalidDataException;
use CustomErrorPage\Exceptions\MissingDataException;
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
        $this->checkData($data);
        $this->assignData($data);
    }

    /**
     * Verify the mandatory data are present and valid
     * @param array $data
     * @throws \CustomErrorPage\Exceptions\MissingDataException
     * @throws \CustomErrorPage\Exceptions\InvalidDataException
     */
    private function checkData(array $data){
        if(isset($data['enable_custom_404_page'],$data['use_image'],$data['image_path'],$data['use_text'],$data['custom_404_page_text'],$data['show_articles'])){
            if(in_array($data['enable_custom_404_page'],[true,false])){
                if(in_array($data['use_image'],[true,false])){
                    if(in_array($data['use_text'],[true,false])){
                        if(in_array($data['show_articles'],[true,false])){
                            $path_regex = '/^(\/[a-zA-Z0-9_\-]+)+\/?$/';
                            if(preg_match($path_regex,$data['image_path'])){
                                return;
                            }
                        }
                    }
                }
            }
            else throw new InvalidDataException;
        }
        else throw new MissingDataException;
        
    }

    /**
     * Assign the array values to the class properties
     * @param array $data
     */
    private function assignData(array $data){
        $this->enable_custom_404_page = $data['enable_custom_404_page'];
        $this->use_image = $data['use_image'];
        $this->image_path = $data['image_path'];
        $this->use_text = $data['use_text'];
        $this->custom_404_page_text = $data['custom_404_page_text'];
        $this->show_articles = $data['show_articles'];
    }

}
?>