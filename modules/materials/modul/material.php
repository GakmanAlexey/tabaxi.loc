<?php

namespace Modules\Materials\Modul;

class Material{
    public $id;
    public $name;
    public $idImg;
    public $smallDescription;
    public $dounloadUrl;
    public $firstTag;
    public $tableStart;
    public $url;
    public $urlBlock;
    public $isActive;
    
    public function __construct()
    {
        $this->tableStart = [];
    }


    public function getId()
    {
        return $this->id;
    }    
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }    
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getIdImg()
    {
        return $this->idImg;
    }    
    public function setIdImg($idImg): self
    {
        $this->idImg = $idImg;
        return $this;
    }

    public function getSmallDescription()
    {
        return $this->smallDescription;
    }    
    public function setSmallDescription($smallDescription): self
    {
        $this->smallDescription = $smallDescription;
        return $this;
    }

    public function getDownloadUrl()
    {
        return $this->dounloadUrl;
    }    
    public function setDownloadUrl($dounloadUrl): self
    {
        $this->dounloadUrl = $dounloadUrl;
        return $this;
    }

    public function getFirstTag()
    {
        return $this->firstTag;
    }    
    public function setFirstTag($firstTag): self
    {
        $this->firstTag = $firstTag;
        return $this;
    }
    
    public function getTableStart()
    {
        return $this->tableStart;
    }    
    public function setTableStart(array $tableStart): self
    {
        $this->tableStart = $tableStart;
        return $this;
    }
    
    public function addToTableStart($item): self
    {
        $this->tableStart[] = $item;
        return $this;
    }    
    public function clearTableStart(): self
    {
        $this->tableStart = [];
        return $this;
    }
    
    public function getUrl()
    {
        return $this->url;
    }    
    public function setUrl($url): self
    {
        $this->url = $url;
        return $this;
    }
    
    public function getUrlBlock()
    {
        return $this->urlBlock;
    }    
    public function setUrlBlock($urlBlock): self
    {
        $this->urlBlock = $urlBlock;
        return $this;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }
    public function setIsActive($isActive): self
    {
        $this->isActive = $isActive;
        return $this;
    }
    
    public static function create(): self
    {
        return new self();
    }    
    public static function fromArrayBase(array $data): self
    {
        $material = new self();
        
        if (isset($data['id'])) $material->setId($data['id']);
        if (isset($data['name'])) $material->setName($data['name']);
        if (isset($data['idImg'])) $material->setIdImg($data['idImg']);
        if (isset($data['smallDescription'])) $material->setSmallDescription($data['smallDescription']);
        if (isset($data['dounloadUrl'])) $material->setDownloadUrl($data['dounloadUrl']);
        if (isset($data['firstTag'])) $material->setFirstTag($data['firstTag']);
        if (isset($data['tableStart'])) $material->setTableStart($data['tableStart']);
        if (isset($data['url'])) $material->setUrl($data['url']);
        if (isset($data['urlBlock'])) $material->setUrlBlock($data['urlBlock']);
        if (isset($data['isActive'])) $material->setIsActive($data['isActive']);
        
        return $material;
    }
}