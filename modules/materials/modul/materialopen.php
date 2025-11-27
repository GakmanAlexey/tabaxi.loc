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
        $materialOpenData = $this->takePageLink( $materialOpenData);
        $materialOpenData = $this->takePageLinkBuild( $materialOpenData);
        $materialOpenData = $this->takeMainDataTable( $materialOpenData);
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

    public function takePageLink(\Modules\Materials\Modul\Materialopendata $materialOpenData)
    {
        $arrayLinkMaterial = [];
        $material = $materialOpenData->getId();
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials_link WHERE materialID = :materialID ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':materialID' => $material]);
        while($data = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $arrayLinkMaterial[] =[$data["typeBlock"],$data["idBlock"],$data["priorVAL"]];
        }
        
        usort($arrayLinkMaterial, function($a, $b) {
            return (int)$a[2] - (int)$b[2];
        });
        $materialOpenData->setTextPageLink($arrayLinkMaterial);
        return $materialOpenData;
    }

    public function takeMainDataTable(\Modules\Materials\Modul\Materialopendata $materialOpenData)
    {
        $material = $materialOpenData->getId();
        
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials_data_tablet WHERE materialID = :materialID ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':materialID' => $material]);
        $arrayMainDataTable = [];
        while($data = $stmt->fetch(\PDO::FETCH_ASSOC)){
            $arrayMainDataTable[] =[$data["key_t"],$data["value_t"],$data["priorVAL"]];
        }
        
        
        usort($arrayMainDataTable, function($a, $b) {
            return (int)$a[2] - (int)$b[2];
        });

        $materialOpenData->setTableStart($arrayMainDataTable);
        return $materialOpenData;
    }

    public function takePageLinkBuild(\Modules\Materials\Modul\Materialopendata $materialOpenData)
    {
        $arrDataPageLink = $materialOpenData->getTextPageLink();
        $arrayData = [];
        foreach($arrDataPageLink as $pageLink){
            $data = "";
             switch($pageLink[0]) {
                case 'h':
                    $pageLink[3]  = $this->takeHead($pageLink); // функция для 'h'
                    break;
                case 't':
                    $pageLink[3]  = $this->takeText($pageLink); // функция для 't'
                    break;
                case 'p':
                    $pageLink[3]  = $this->takeParagraph($pageLink); // функция для 'p'
                    break;
                default:
                    $pageLink[3]  = $this->takeOther($pageLink); // функция по умолчанию
                    break;
            }
            $arrayData [] = $pageLink;
        }
        $materialOpenData->settextPageData($arrayData);
        return $materialOpenData;
    }

    public function takeHead($pageLink)
    {        
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials_heads WHERE id = :id Limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $pageLink[1]]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function takeText($pageLink)
    {
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials_tablet WHERE id = :id Limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $pageLink[1]]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
        
    }

    public function takeParagraph($pageLink)
    {
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials_paragraph WHERE id = :id Limit 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $pageLink[1]]);
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $data;
        
    }

    public function takeOther($pageLink)
    {
        return [];
    }
    
}