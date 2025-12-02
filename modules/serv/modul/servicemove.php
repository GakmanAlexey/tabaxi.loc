<?php

namespace Modules\Serv\Modul;

class Servicemove
{
    // \Modules\Serv\Modul\Servicemove::takeImg();
   public static function takeImg(\Modules\Serv\Modul\Service $service){            
            $file = \Modules\Files\Modul\Taker:: take($service->getLogoImgId());
            return $file->get_path();
    }
}