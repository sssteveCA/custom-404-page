<?php

namespace CustomErrorPage\Classes;
use CustomErrorPage\Interfaces\Constants;


/**
 * Plugin activation/deactivation functions
 */
class ActivationDeactivation{

    const TABLE_NAME = "custom_404_page_table";

    private \wpdb $wpdb;

    public function __construct(\wpdb $wpdb){
        $this->wpdb = $wpdb;
    }

    /**
     * Executed while plugin activation
     */
    public function activate(){
        $table_name = $this->wpdb->prefix .self::TABLE_NAME;
        $charset_collate = $this->wpdb->get_charset_collate();
        $query = <<<SQL
CREATE TABLE {$table_name} (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) UNIQUE,
    value VARCHAR(255)
    PRIMARY KEY (id)
) {$charset_collate};
SQL;
        require_once ABSPATH."/wp-admin/includes/upgrade.php";
        dbDelta( $query );
        $this->insertDefaultData();
    }

    /**
     * Executed while plugin uninstallation
     */
    public function uninstall(){
        $table_name = $this->wpdb->prefix .self::TABLE_NAME;
        $query = <<<SQL
DROP TABLE IF EXISTS {$table_name};
SQL;
        $this->wpdb->query($query);
    }

    /**
     * Insert the default data when the table is created
     */
    private function insertDefaultData(){
        $table_name = $this->wpdb->prefix.self::TABLE_NAME;
        $this->wpdb->get_results("SELECT * FROM {$table_name} LIMIT 1");
        if($this->wpdb->num_rows < 1){
            $this->wpdb->insert($table_name,['enable_custom_404_page' => false],['%s']);
            $this->wpdb->insert($table_name,['use_image' => false],['%s']);
            $this->wpdb->insert($table_name,['image_path' => ''],['%s']);
            $this->wpdb->insert($table_name,['use_text' => false],['%s']);
            $this->wpdb->insert($table_name,['custom_404_page_text' => ''],['%s']);
            $this->wpdb->insert($table_name,['show_articles' => false],['%s']);
        }
    }

}
?>