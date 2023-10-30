<?php

namespace CustomErrorPage\Classes;
use CustomErrorPage\Interfaces\Constants;


/**
 * Plugin activation/deactivation functions
 */
class ActivationDeactivation{

    const TABLE_NAME = "custom_404_page_table";

    private \wpdb $wpdb;

    private string $table_name;

    public function __construct(\wpdb $wpdb){
        $this->wpdb = $wpdb;
        $this->table_name = $this->wpdb->prefix.self::TABLE_NAME;
    }

    /**
     * Executed while plugin activation
     */
    public function activate(){
        $charset_collate = $this->wpdb->get_charset_collate();
        $query = <<<SQL
CREATE TABLE {$this->table_name} (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE,
    value VARCHAR(255),
    PRIMARY KEY (id)
) {$charset_collate};
SQL;
        require_once ABSPATH."/wp-admin/includes/upgrade.php";
        $result = dbDelta( $query );
        $this->insert_default_data();
    }

    /**
     * Executed while plugin uninstallation
     */
    public function uninstall(){
        $query = <<<SQL
DROP TABLE IF EXISTS {$this->table_name};
SQL;
        $this->wpdb->query($query);
    }

    /**
     * Insert the default data when the table is created
     */
    private function insert_default_data(){
        $results = $this->wpdb->get_results("SELECT * FROM {$this->table_name}",ARRAY_A);
        $found = [
            'enable_custom_404_page' => false,
            'use_image' => false,
            'image_path' => false,
            'use_text' => false,
            'custom_404_page_text' => false,
            'show_articles' => false,
        ];
        array_walk($results,function($value,$key) use($found){
            if($value['name'] == 'enable_custom_404_page') $found['enable_custom_404_page'] = true;
            if($value['name'] == 'use_image') $found['use_image'] = true;
            if($value['name'] == 'image_path') $found['image_path'] = true;
            if($value['name'] == 'use_text') $found['use_text'] = true;
            if($value['name'] == 'custom_404_page_text') $found['custom_404_page_text'] = true;
            if($value['name'] == 'show_articles') $found['show_articles'] = true;
        });
        if(!$found['enable_custom_404_page'])
            $this->wpdb->insert($this->table_name,['name' => 'enable_custom_404_page', 'value' => 'false'],['%s','%s']);
        if(!$found['use_image'])
            $this->wpdb->insert($this->table_name,['name' => 'use_image', 'value' => 'false'],['%s','%s']);
        if(!$found['image_path'])
            $this->wpdb->insert($this->table_name,['name' => 'image_path', 'value' => ''],['%s','%s']);
        if(!$found['use_text'])
            $this->wpdb->insert($this->table_name,['name' => 'use_text', 'value' => 'false'],['%s','%s']);
        if(!$found['custom_404_page_text'])
            $this->wpdb->insert($this->table_name,['name' => 'custom_404_page_text', 'value' => ''],['%s','%s']);
        if(!$found['show_articles'])
            $this->wpdb->insert($this->table_name,['name' => 'show_articles', 'value' => 'false'],['%s','%s']);
        
    }

}
?>