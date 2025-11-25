<?php

namespace Modules\Materials\Modul;

class Materialopen{ 

    public function start()
    {
       $focusMaterial = $this->findByUrl(\Modules\Router\Modul\Router::$url["d_line"]);
       if($focusMaterial == null){        
            \Modules\Router\Modul\Errorhandler::e404(); 
            die();
       }
       $materialOpenData = new \Modules\Materials\Modul\Materialopendata;
       $materialOpenData->fillFromParent($focusMaterial);

       return $materialOpenData;
    }    

    public function findByUrl($url)
    {
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials WHERE url = :url AND isActive = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':url' => $url]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$data) {
            return null;
        }
        
        if ($data['tableStart']) {
            $data['tableStart'] = unserialize($data['tableStart']);
        }
        
        return \Modules\Materials\Modul\Material::fromArrayBase($data);
    }
}