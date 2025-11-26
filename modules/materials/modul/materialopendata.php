<?php

namespace Modules\Materials\Modul;

class Materialopendata extends \Modules\Materials\Modul\Material{
    private $textPageLink = "";
    private $textPageData = "";
    public function fillFromParent($parentData): self
    {
        if (is_array($parentData)) {
            return $this->fillFromArray($parentData);
        } elseif ($parentData instanceof \Modules\Materials\Modul\Material) {
            return $this->fillFromMaterialObject($parentData);
        } else {
            throw new \InvalidArgumentException('Parent data must be either array or Material object');
        }
        
        return $this;
    }

    private function fillFromArray(array $data)
    {
        if (isset($data['id'])) $this->setId($data['id']);
        if (isset($data['name'])) $this->setName($data['name']);
        if (isset($data['idImg'])) $this->setIdImg($data['idImg']);
        if (isset($data['smallDescription'])) $this->setSmallDescription($data['smallDescription']);
        if (isset($data['dounloadUrl'])) $this->setDownloadUrl($data['dounloadUrl']);
        if (isset($data['firstTag'])) $this->setFirstTag($data['firstTag']);
        if (isset($data['tableStart'])) $this->setTableStart($data['tableStart']);
        if (isset($data['url'])) $this->setUrl($data['url']);
        if (isset($data['urlBlock'])) $this->setUrlBlock($data['urlBlock']);
        if (isset($data['isActive'])) $this->setIsActive($data['isActive']);
        
        return $this;
    }

    private function fillFromMaterialObject(\Modules\Materials\Modul\Material $material)
    {
        $this->setId($material->getId());
        $this->setName($material->getName());
        $this->setIdImg($material->getIdImg());
        $this->setSmallDescription($material->getSmallDescription());
        $this->setDownloadUrl($material->getDownloadUrl());
        $this->setFirstTag($material->getFirstTag());
        $this->setTableStart($material->getTableStart());
        $this->setUrl($material->getUrl());
        $this->setUrlBlock($material->getUrlBlock());
        $this->setIsActive($material->getIsActive());
        
        return $this;
    }
    
    public static function createFromParent($parentData): self
    {
        $instance = new self();
        return $instance->fillFromParent($parentData);
    }
    
    public static function fromArrayBase(array $data): \Modules\Materials\Modul\Material
    {
        return self::createFromParent($data);
    }
    
    public static function fromMaterialObject(\Modules\Materials\Modul\Material $material): \Modules\Materials\Modul\Material
    {
        return self::createFromParent($material);
    }

    
    public function getTextPageLink()
    {
        return $this->textPageLink;
    }    
    public function setTextPageLink($textPageLink): self
    {
        $this->textPageLink = $textPageLink;
        return $this;
    }
    
    public function gettextPageData()
    {
        return $this->textPageData;
    }    
    public function settextPageData($textPageData): self
    {
        $this->textPageData = $textPageData;
        return $this;
    }
}