<?php

namespace Modules\Materials\Modul\Service;

class Item{
    private static $data = [];
    private static $loaded = false;
    
    private static function loadAll() {
        if (self::$loaded) {
            return;
        }
        $pdo = \Modules\Core\Modul\Sql::connect();
        $stmt = $pdo->query("
            SELECT id, slug, name, basePrice 
            FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."item_items"
        );
        
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $id = $row['id'];
            self::$data[$id] = [
                'slug'   => $row['slug'],
                'name'    => $row['name'],
                'basePrice'   => $row['basePrice']
            ];
        }

        self::$loaded = true;
    }

    public static function name($id) {
        self::loadAll();
        return self::$data[$id]['name'] ?? null;
    }

    public static function url($id) {
        self::loadAll();
        return "<a href='/service/items/open/?slug=".self::$data[$id]['slug']."'> открыть </a>" ?? null;
    }

    public static function price($id) {
        self::loadAll();
        return self::$data[$id]['basePrice']." мм" ?? null;
    }
}