<?php

namespace Modules\Serv\Modul;

class Item{
    public $id;
    public $name;
    public $slug;
    public $description;
    public $categoryId;
    public $weight;
    public $basePrice;
    public $rarity;
    public $imgId;
    public $sourceId;
    public $tags;
    public $isActive;
    

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getSlug()
    {
        return $this->slug;
    }
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getCategoryId()
    {
        return $this->categoryId;
    }
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    public function getWeight()
    {
        return $this->weight;
    }
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    public function getBasePrice()
    {
        return $this->basePrice;
    }
    public function setBasePrice($basePrice)
    {
        $this->basePrice = $basePrice;
        return $this;
    }

    public function getRarity()
    {
        return $this->rarity;
    }
    public function setRarity($rarity)
    {
        $this->rarity = $rarity;
        return $this;
    }

    public function getImgId()
    {
        return $this->imgId;
    }
    public function setImgId($imgId)
    {
        $this->imgId = $imgId;
        return $this;
    }

    public function getSourceId()
    {
        return $this->sourceId;
    }
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
        return $this;
    }

    public function getTags()
    {
        return $this->tags;
    }
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    public function getIsActive()
    {
        return $this->isActive;
    }
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }
}