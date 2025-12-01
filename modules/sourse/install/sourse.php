<?php

namespace Modules\Sourse\Install;

class Sourse  extends \Modules\Abs\Install{

    public function install_BD(){
        $table = [];
        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'sources (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            slug VARCHAR(100) NOT NULL UNIQUE,
            abbreviation VARCHAR(10) NOT NULL,
            edition VARCHAR(50) DEFAULT NULL,
            type VARCHAR(50) NOT NULL,
            imgId INT(12) DEFAULT 0,
            url VARCHAR(500) DEFAULT NULL,
            full_url VARCHAR(500) DEFAULT NULL,
            is_official TINYINT(1) DEFAULT 1,
            publisher VARCHAR(150) DEFAULT NULL,
            creator_user_id INT(11) DEFAULT NULL,
            is_public TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_slug (slug),
            INDEX idx_abbreviation (abbreviation),
            INDEX idx_type (type),
            INDEX idx_edition (edition),
            INDEX idx_is_official (is_official),
            INDEX idx_is_public (is_public),
            INDEX idx_creator (creator_user_id)
        )
        ';
        
        
        return $table;
    }

    public function install_Router(){
        $table = [];

        return $table;
    }

    public function install_Congif(){
        $table = [];

        return $table;
    }
    
}