<?php

namespace Modules\Serv\Modul;

class Itemrepository{
   /**
     * Получить таблицу с префиксом
     */
    private function getTableName(): string
    {
        return \Modules\Core\Modul\Env::get("DB_PREFIX") . "item_items";
    }

    /**
     * Получить соединение с базой данных
     */
    private function getConnection(): \PDO
    {
        return \Modules\Core\Modul\Sql::connect();
    }

    /**
     * Создать объект Item из массива данных
     */
    private function createItemFromArray(array $data): \Modules\Serv\Modul\Item
    {
        $item = new \Modules\Serv\Modul\Item();
        $item->setId($data['id'] ?? null)
             ->setName($data['name'] ?? '')
             ->setSlug($data['slug'] ?? '')
             ->setDescription($data['description'] ?? '')
             ->setCategoryId($data['categoryId'] ?? 0)
             ->setWeight($data['weight'] ?? 0.00)
             ->setBasePrice($data['basePrice'] ?? 0)
             ->setRarity($data['rarity'] ?? 1)
             ->setImgId($data['imgId'] ?? 0)
             ->setSourceId($data['sourceId'] ?? 0)
             ->setTags($data['tags'] ?? '')
             ->setIsActive($data['isActive'] ?? 1);
        
        return $item;
    }

    /**
     * 1. Получить данные по ID
     */
    public function getById(int $id): ?\Modules\Serv\Modul\Item
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($data) {
            return $this->createItemFromArray($data);
        }
        
        return null;
    }

    /**
     * 2. Получить все данные
     */
    public function getAll(): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $items = [];
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($results as $data) {
            $items[] = $this->createItemFromArray($data);
        }
        
        return $items;
    }

    /**
     * 3. Получить все данные где isActive = 1
     */
    public function getAllActive(): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE isActive = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $items = [];
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($results as $data) {
            $items[] = $this->createItemFromArray($data);
        }
        
        return $items;
    }

    /**
     * Дополнительный метод: получить по slug
     */
    public function getBySlug(string $slug): ?\Modules\Serv\Modul\Item
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE slug = :slug";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':slug' => $slug]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($data) {
            return $this->createItemFromArray($data);
        }
        
        return null;
    }

    /**
     * Дополнительный метод: получить по категории
     */
    public function getByCategoryId(int $categoryId): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE categoryId = :categoryId";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':categoryId' => $categoryId]);
        
        $items = [];
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($results as $data) {
            $items[] = $this->createItemFromArray($data);
        }
        
        return $items;
    }

    /**
     * Дополнительный метод: получить активные по категории
     */
    public function getActiveByCategoryId(int $categoryId): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE categoryId = :categoryId AND isActive = 1";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':categoryId' => $categoryId]);
        
        $items = [];
        $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach ($results as $data) {
            $items[] = $this->createItemFromArray($data);
        }
        
        return $items;
    }

    public function buildTable(){
        $data = $this->getAllActive();
        $newTable=[];
        $newTable[]=["ИД","Изображение","Название","Вес","Цена","Редкость","Источник","Ссылка"];
        foreach($data as $el){
            $timedArray = [];
            $timedArray[0] = $el->getId();           
            $timedArray[1] = \Modules\Serv\Modul\Itemtrans::getHTMKImg($el->getImgId());    // 
            $timedArray[2] = $el->getName();         
            $timedArray[3] = \Modules\Serv\Modul\Itemtrans::getWeight($el->getWeight());       // 
            $timedArray[4] = \Modules\Serv\Modul\Itemtrans::getPrice($el->getBasePrice());    // 
            $timedArray[5] = \Modules\Serv\Modul\Itemtrans::getRarityType($el->getRarity()); 
            $timedArray[6] = \Modules\Serv\Modul\Itemtrans::getHTMLSource($el->getSourceId());     // 
            $timedArray[7] = \Modules\Serv\Modul\Itemtrans::getHTMLSlug($el->getSlug());         // 
            $newTable[]=$timedArray;
        }
        return $newTable;
    }
}