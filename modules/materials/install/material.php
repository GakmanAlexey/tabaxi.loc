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