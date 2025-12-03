<?php

namespace Modules\Materials\Modul;

class Box{
    private static $bd;
    private static $loadBD = false;
    public static function loadBD(){
        self::$loadBD = true;
        self::$bd = [];
        self::$bd[] = ["item","\Modules\Materials\Modul\Service\Item"];
        self::$bd[] = ["resurse","\Modules\Materials\Modul\Service\Resurse"];
    }
    
    public static function callBox($input){
        if (!self::$loadBD) {
            self::loadBD();
        }
        if (!preg_match('/^#\[(.+)\]$/', $input, $matches)) {
            return null; 
        }
        $body = $matches[1]; 
        if (!preg_match('/^([a-zA-Z0-9_]+)\.([a-zA-Z0-9_]+)\((.*)\)$/', $body, $parts)) {
            return null;
        }

        $classKey = $parts[1];
        $method   = $parts[2];
        $param    = $parts[3];

        foreach (self::$bd as $item) {
            if ($item[0] === $classKey) {
                $className = $item[1]; 
                return $className::$method($param);
            }
        }
        return null;
    }
}