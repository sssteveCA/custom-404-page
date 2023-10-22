<?php

namespace CustomErrorPage\Classes;
use CustomErrorPage\Interfaces\Constants;


/**
 * Plugin activation/deactivation functions
 */
class ActivationDeactivation{

    private \wpdb $wpdb;

    public function __construct(\wpdb $wpdb){
        $this->wpdb = $wpdb;
    }

    /**
     * Executed while plugin activation
     */
    public function activate(){
        $table_name = $this->wpdb->prefix .Constants::TABLE_NAME;
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
    }

    /**
     * Executed while plugin uninstallation
     */
    public function uninstall(){
        $table_name = $this->wpdb->prefix .\CustomErrorPage\Interfaces\Constants::TABLE_NAME;
        $query = <<<SQL
DROP TABLE IF EXISTS {$table_name};
SQL;
        $this->wpdb->query($query);
    }

}
?>