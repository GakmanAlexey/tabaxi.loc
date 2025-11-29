<?php

namespace Modules\Serv\Install;

class Item  extends \Modules\Abs\Install{

    public function install_BD(){
        $table = [];
        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'item_items (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(200) NOT NULL,
            slug VARCHAR(200) NOT NULL UNIQUE,
            description TEXT,
            categoryId INT(11) NOT NULL DEFAULT 0,
            weight DECIMAL(8,2) DEFAULT 0,
            basePrice INT(12) DEFAULT 0,
            rarity INT(2) DEFAULT 1,
            imgId INT(12) DEFAULT 0,
            sourceId INT(11) DEFAULT 0,
            tags text DEFAULT NULL,
            isActive TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_slug (slug),
            INDEX idx_category (categoryId),
            INDEX idx_rarity (rarity),
            INDEX idx_source (sourceId)
        )
        ';
        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'item_groups (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            slug VARCHAR(100) NOT NULL,
            description TEXT,
            imgId INT(12) DEFAULT 0,
            parentId INT(11) DEFAULT 0,
            sortOrder INT(11) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            INDEX idx_slug (slug),
            INDEX idx_parent (parentId)
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'item_link_groups (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            itemId INT(11) NOT NULL,
            groupId INT(11) NOT NULL,
            sortOrder INT(11) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_itemId (itemId),
            INDEX idx_groupId (groupId)
        )';

        
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