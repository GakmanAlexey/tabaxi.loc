<?php

namespace Modules\materials\Install;

class Material  extends \Modules\Abs\Install{

    public function install_BD(){
        $table = [];
        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials (
            id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            idImg VARCHAR(255) NULL,
            smallDescription TEXT NULL,
            dounloadUrl VARCHAR(255) NULL,
            firstTag VARCHAR(255) NULL,
            tableStart TEXT NULL,
            url VARCHAR(255) NULL,
            urlBlock VARCHAR(255) NULL,
            isActive TINYINT(1) DEFAULT 1,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials_heads (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            typeH VARCHAR(255) NULL,
            textH TEXT NULL,
            idH TEXT NULL,
            classH TEXT NULL,
            styleCSSH TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials_paragraph (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            typeP VARCHAR(255) NULL,
            textP TEXT NULL,
            idP TEXT NULL,
            classP TEXT NULL,
            styleCSSP TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials_tablet (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            headClass TEXT NULL,
            headstyleCSSP TEXT NULL,
            headArray TEXT NULL,
            bodyClass TEXT  NULL,
            bodystyleCSSP TEXT NULL,
            bodyArray TEXT NULL,
            idP TEXT NULL,
            classP TEXT NULL,
            styleCSSP TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials_link (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            materialID TEXT NULL,
            typeBlock TEXT NULL,
            idBlock TEXT NULL,
            priorVAL INT(9) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials_data_tablet (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            materialID TEXT NULL,
            key_t TEXT NULL,
            value_t TEXT NULL,
            priorVAL INT(9) NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
        ';

        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'materials_data_list (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            materialID TEXT NULL,
            type_t TEXT NULL,
            value_array TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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