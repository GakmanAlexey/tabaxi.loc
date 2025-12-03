<?php

namespace Modules\Item\Install;

class Item  extends \Modules\Abs\Install{

    public function install_BD(){
        $table = [];        
        $table[] = '
        CREATE TABLE '.\Modules\Core\Modul\Env::get("DB_PREFIX").'item_resurce (
            id INT(12) NOT NULL AUTO_INCREMENT PRIMARY KEY,
            type_s TEXT NULL,
            exp_t int(12) NULL,
            lvl_t int(2) NULL,
            pather_id int(12) NULL,
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