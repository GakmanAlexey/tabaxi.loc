<?php

namespace Modules\Materials\Modul\Service;

class Resurse{
    private static $data = [];
    private static $loaded = false;
    
    private static function loadAll() {
        if (self::$loaded) {
            return;
        }
        $pdo = \Modules\Core\Modul\Sql::connect();
        $stmt = $pdo->query("
            SELECT id, exp_t, lvl_t 
            FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."item_resurce"
        );
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        foreach ($rows as $row) {
            $id = $row['id'];
            self::$data[$id] = [
                'exp_t'   => $row['exp_t'],
                'lvl_t'    => $row['lvl_t']
            ];
        }

        self::$loaded = true;
    }

    public static function lvl($id) {
        self::loadAll();
        return self::$data[$id]['lvl_t'] ?? null;
    }

    public static function exp($id) {
        self::loadAll();
        return self::$data[$id]['exp_t'] ?? null;
    }
}