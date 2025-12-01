<?php

namespace Modules\Serv\Modul;

class Itemfull extends Item
{
    private  $rImg = "";
    private  $rWeight = "";
    private  $rPrice = "";
    private  $rRarityType = "";

    public function baseIN(Item $item): self
    {
        $this->copyParentProperties($item);
        
        $this->rImg = \Modules\Serv\Modul\Itemtrans::getImg($item->getImgId());   
        $this->rWeight = \Modules\Serv\Modul\Itemtrans::getWeight($item->getWeight()); 
        $this->rPrice = \Modules\Serv\Modul\Itemtrans::getPrice($item->getBasePrice()); 
        $this->rRarityType = \Modules\Serv\Modul\Itemtrans::getRarityType($item->getRarity()); 
        
        return $this;
    }
    
    private function copyParentProperties(Item $item): void
    {
        $this->setId($item->getId())
             ->setName($item->getName())
             ->setSlug($item->getSlug())
             ->setDescription($item->getDescription())
             ->setCategoryId($item->getCategoryId())
             ->setWeight($item->getWeight())
             ->setBasePrice($item->getBasePrice())
             ->setRarity($item->getRarity())
             ->setImgId($item->getImgId())
             ->setSourceId($item->getSourceId())
             ->setTags($item->getTags())
             ->setIsActive($item->getIsActive());
    }
    
    private function copyParentPropertiesViaReflection(Item $item): void
    {
        $reflection = new \ReflectionClass($item);
        
        foreach ($reflection->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
            $propertyName = $property->getName();
            $this->$propertyName = $item->$propertyName;
        }
        
        $this->copyViaSetters($item);
    }
    
    private function copyViaSetters(Item $item): void
    {
        $methods = get_class_methods($item);
        
        foreach ($methods as $method) {
            if (strpos($method, 'get') === 0) {
                $propertyName = lcfirst(substr($method, 3));
                $setter = 'set' . substr($method, 3);
                
                if (method_exists($this, $setter)) {
                    $value = $item->$method();
                    $this->$setter($value);
                }
            }
        }
    }
    
    public static function fromItem(Item $item): self
    {
        $instance = new static();
        return $instance->baseIN($item);
    }
    
    public function getRImg(): string
    {
        return $this->rImg;
    }
    
    public function getRWeight(): string
    {
        return $this->rWeight;
    }
    
    public function getRPrice(): string
    {
        return $this->rPrice;
    }
    
    public function getRRarityType(): string
    {
        return $this->rRarityType;
    }
    
    public function setRImg(string $rImg): self
    {
        $this->rImg = $rImg;
        return $this;
    }
    
    public function setRWeight(string $rWeight): self
    {
        $this->rWeight = $rWeight;
        return $this;
    }
    
    public function setRPrice(string $rPrice): self
    {
        $this->rPrice = $rPrice;
        return $this;
    }
    
    public function setRRarityType(string $rRarityType): self
    {
        $this->rRarityType = $rRarityType;
        return $this;
    }
}
