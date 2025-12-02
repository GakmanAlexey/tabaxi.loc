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

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'services (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(150) NOT NULL,
            slug VARCHAR(150) NOT NULL,
            short_description VARCHAR(500),
            full_description TEXT,
            category_id INT(11) DEFAULT 0,
            parent_category_id INT(11) DEFAULT 0,
            tags TEXT,
            logo_img_id INT(11) DEFAULT 0,
            gallery_img_ids TEXT,
            website_url VARCHAR(500),
            demo_url VARCHAR(500),
            api_available TINYINT(1) DEFAULT 0,
            platforms TEXT,
            languages TEXT,
            difficulty VARCHAR(50),
            price_model VARCHAR(50),
            price_info VARCHAR(500),
            status VARCHAR(50),
            original_release_year INT(4),
            last_updated_date DATE,
            rating DECIMAL(3,2) DEFAULT 0.00,
            review_count INT(11) DEFAULT 0,
            view_count INT(11) DEFAULT 0,
            click_count INT(11) DEFAULT 0,
            features TEXT,
            system_requirements TEXT,
            supported_editions TEXT,
            is_official TINYINT(1) DEFAULT 0,
            is_recommended TINYINT(1) DEFAULT 0,
            sort_order INT(11) DEFAULT 0,
            featured TINYINT(1) DEFAULT 0,
            weight INT(11) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            published_at TIMESTAMP NULL DEFAULT NULL,
            INDEX idx_slug (slug),
            INDEX idx_category_id (category_id),
            INDEX idx_status (status(20)),
            INDEX idx_price_model (price_model(20)),
            INDEX idx_rating (rating DESC),
            INDEX idx_view_count (view_count DESC),
            INDEX idx_featured (featured),
            INDEX idx_parent_category_id (parent_category_id),
            INDEX idx_release_year (original_release_year),
            INDEX idx_created_at (created_at DESC)
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