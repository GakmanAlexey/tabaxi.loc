<?php

namespace Modules\Serv\Modul;

class Itemtrans{
    // \Modules\Serv\Modul\Itemtrans::getHTMKImg($idIMG);
    public static function getHTMKImg($idIMG){        
        $file = \Modules\Files\Modul\Taker:: take($idIMG);
        return '
         <img src="'.$file->get_path().'" alt="" style="width:50px; ">
        ';
    }
    public static function getImg($idIMG){        
        $file = \Modules\Files\Modul\Taker:: take($idIMG);
        return $file->get_path();
    }

    public static function getWeight($weight){    
        $weight = (int)$weight; 
        return $weight." фунтов";
    }
    public static function getPrice($price){      
        $copper = $price;
        $silver = 0;
        $gold = 0;
        $platinum = 0;        
        
        if ($copper >= 1000) {
            $platinum = floor($copper / 1000);
            $copper = $copper % 1000;
        }        
        
        if ($copper >= 100) {
            $gold = floor($copper / 100);
            $copper = $copper % 100;
        }        
        
        if ($copper >= 10) {
            $silver = floor($copper / 10);
            $copper = $copper % 10;
        }        
        
        $result = "";        
        
        if ($platinum > 0) {
            $result .= self::formatCoin($platinum, 'платиновая', 'платиновые', 'платиновых');
        }        
        
        if ($gold > 0) {
            if ($result !== "") $result .= ", ";
            $result .= self::formatCoin($gold, 'золотая', 'золотые', 'золотых');
        }        
        
        if ($silver > 0) {
            if ($result !== "") $result .= ", ";
            $result .= self::formatCoin($silver, 'серебряная', 'серебряные', 'серебряных');
        }        
        
        if ($copper > 0) {
            if ($result !== "") $result .= ", ";
            $result .= self::formatCoin($copper, 'медная', 'медные', 'медных');
        }
        
        return $result;
    }

    private static function formatCoin($amount, $singular, $plural, $genitive) {
        $lastDigit = $amount % 10;
        $lastTwoDigits = $amount % 100;
        
        if ($lastDigit == 1 && $lastTwoDigits != 11) {
            return $amount . ' ' . $singular . ' монета';
        } elseif (($lastDigit >= 2 && $lastDigit <= 4) && !($lastTwoDigits >= 12 && $lastTwoDigits <= 14)) {
            return $amount . ' ' . $plural . ' монеты';
        } else {
            return $amount . ' ' . $genitive . ' монет';
        }
    }

    

    public static function getRarityType($rarityId){    
        $rarities = [
            1 => "Обычный",
            2 => "Необычный", 
            3 => "Редкий",
            4 => "Очень редкий",
            5 => "Легендарный",
            6 => "Артефакт"
        ];        
        return $rarities[$rarityId] ?? "Неизвестно";
    }
}