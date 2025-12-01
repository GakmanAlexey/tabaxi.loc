<?php

namespace Modules\Serv\Modul;

class Itemopen{
    public function open(){
        if(!isset($_GET["slug"])){
            return null;
        }
        $slug = $_GET["slug"];
        $item = new \Modules\Serv\Modul\Item;
        $item->setSlug($slug);
        $item = $this->loadBase($item);

        return $item;
    }

    public function loadBase(\Modules\Serv\Modul\Item $item){
        $itemrepository = new \Modules\Serv\Modul\Itemrepository;
        $item = $itemrepository->getBySlug($item->getSlug());
        $itemFull = new \Modules\Serv\Modul\Itemfull;
        $item = $itemFull->baseIN($item);
        return $item;
    }
    
}