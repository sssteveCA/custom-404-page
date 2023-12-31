<?php

namespace CustomErrorPage\Classes;

use CustomErrorPage\Exceptions\InvalidDataException;
use CustomErrorPage\Exceptions\MissingDataException;
use CustomErrorPage\Exceptions\SqlErrorException;
use CustomErrorPage\Interfaces\Constants as C;
use wpdb;

/**
 * Update the custom 404 page menu settings
 */
class UpdateSettings extends DatabaseProperties{

    private wpdb $wpdb;
    private string $table_name;

    public function __construct(wpdb $wpdb,array $data)
    {
        $this->wpdb = $wpdb;
        $this->table_name = $this->wpdb->prefix.C::TABLE_NAME;
        $this->checkData($data);
        $this->assignData($data);
        $this->updateTable();
    }

    /**
     * Verify the mandatory data are present and valid
     * @param array $data
     * @throws \CustomErrorPage\Exceptions\MissingDataException
     * @throws \CustomErrorPage\Exceptions\InvalidDataException
     */
    private function checkData(array $data){
        if(isset($data['enable_custom_404_page'],$data['use_title'],$data['title'],$data['use_image'],$data['image_path'],$data['use_text'],$data['text'],$data['show_articles'],$data['post_image_path'])){
            if(in_array($data['enable_custom_404_page'],[true,false]) && 
                in_array($data['use_title'],[true,false]) && 
                in_array($data['use_image'],[true,false]) && 
                in_array($data['use_text'],[true,false]) && 
                in_array($data['show_articles'],[true,false])){
                if($data['use_title'] == true){
                    if(empty($data['title']))
                        throw new InvalidDataException;
                }
                if($data['use_image'] == true){
                    $url_pattern = '/^(https?:\/\/)?([a-z\d.-_]+)\.([a-z]{2,6})(\/([^\s]*)?)?$/i';
                    if(!preg_match($url_pattern,$data['image_path']))
                        throw new InvalidDataException;
                }
                if($data['use_text'] == true){
                    if(empty($data['text']))
                        throw new InvalidDataException;
                }
                if($data['show_articles'] == true){
                    if(empty($data['post_image_path']))
                        throw new InvalidDataException;
                }
                return;
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
        $this->use_title = $data['use_title'];
        $this->title = $data['title'];
        $this->use_image = $data['use_image'];
        $this->image_path = $data['image_path'];
        $this->use_text = $data['use_text'];
        $this->text = $data['text'];
        $this->show_articles = $data['show_articles'];
        $this->post_image_path = $data['post_image_path'];
    }

    /**
     * Update the admin custom 404 page sql table with new settings
     * @throws \CustomErrorPage\Exceptions\SqlErrorException
     */
    private function updateTable(){
        if($this->wpdb->update($this->table_name,['value' => $this->enable_custom_404_page],['name' => 'enable_custom_404_page'],['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->use_title],['name' => 'use_title'],['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->title],['name' => 'title'],['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->use_image],['name' => 'use_image'],['%s']['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->image_path],['name' => 'image_path'],['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->use_text],['name' => 'use_text'],['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->text],['name' => 'text'],['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->show_articles],['name' => 'show_articles'], ['%s'],['%s']) === false)
            throw new SqlErrorException;
        if($this->wpdb->update($this->table_name,['value' => $this->post_image_path],['name' => 'post_image_path'],['%s'],['%s']) === false)
            throw new SqlErrorException;
    }

}
?>