<?php

namespace Modules\Materials\Modul;

class Materialrepository
{
    public function save(\Modules\Materials\Modul\Material $material): bool
    {
       if ($material->getId() >= 1) {
            return $this->update($material);
        } else {
            return $this->insert($material);
        }
    }  

    private function insert(\Modules\Materials\Modul\Material $material): bool
    {        
        $pdo = \Modules\Core\Modul\Sql::connect(); 
        $sql = "INSERT INTO ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials 
                (name, idImg, smallDescription, dounloadUrl, firstTag, tableStart, url, urlBlock, isActive) 
                VALUES (:name, :idImg, :smallDescription, :dounloadUrl, :firstTag, :tableStart, :url, :urlBlock, :isActive)";
        
        $stmt = $pdo->prepare($sql);
        $tableStartSerialized = !empty($material->getTableStart()) ? serialize($material->getTableStart()) : null;
        
        $result = $stmt->execute([
            ':name' => $material->getName(),
            ':idImg' => $material->getIdImg(),
            ':smallDescription' => $material->getSmallDescription(),
            ':dounloadUrl' => $material->getDownloadUrl(),
            ':firstTag' => $material->getFirstTag(),
            ':tableStart' => $tableStartSerialized,
            ':url' => $material->getUrl(),
            ':urlBlock' => $material->getUrlBlock(),
            ':isActive' => $material->getIsActive() ?? 1
        ]);
        
        if ($result) {
            $material->setId($pdo->lastInsertId());
        }
        
        return $result;
    }

    private function update(\Modules\Materials\Modul\Material $material): bool
    {
        $pdo = \Modules\Core\Modul\Sql::connect(); 
        $sql = "UPDATE ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials SET 
                name = :name,
                idImg = :idImg,
                smallDescription = :smallDescription,
                dounloadUrl = :dounloadUrl,
                firstTag = :firstTag,
                tableStart = :tableStart,
                url = :url,
                urlBlock = :urlBlock,
                isActive = :isActive,
                updated_at = CURRENT_TIMESTAMP
                WHERE id = :id";
        
        $stmt = $pdo->prepare($sql);
        $tableStartSerialized = !empty($material->getTableStart()) ? serialize($material->getTableStart()) : null;
        
        return $stmt->execute([
            ':id' => $material->getId(),
            ':name' => $material->getName(),
            ':idImg' => $material->getIdImg(),
            ':smallDescription' => $material->getSmallDescription(),
            ':dounloadUrl' => $material->getDownloadUrl(),
            ':firstTag' => $material->getFirstTag(),
            ':tableStart' => $tableStartSerialized,
            ':url' => $material->getUrl(),
            ':urlBlock' => $material->getUrlBlock(),
            ':isActive' => $material->getIsActive() ?? 1
        ]);
    }
    
    public function findById(int $id): ?\Modules\Materials\Modul\Material
    {
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if (!$data) {
            return null;
        }
        
        // Десериализуем tableStart
        if ($data['tableStart']) {
            $data['tableStart'] = unserialize($data['tableStart']);
        }
        
        return \Modules\Materials\Modul\Material::fromArrayBase($data);
    }
    
    public function findAllActive(): array
    {
        $pdo = \Modules\Core\Modul\Sql::connect();
        $sql = "SELECT * FROM ".\Modules\Core\Modul\Env::get("DB_PREFIX")."materials WHERE isActive = 1 ORDER BY created_at DESC";
        $stmt = $pdo->query($sql);
        
        $materials = [];
        while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            if ($data['tableStart']) {
                $data['tableStart'] = unserialize($data['tableStart']);
            }
            $materials[] = \Modules\Materials\Modul\Material::fromArrayBase($data);
        }
        
        return $materials;
    }
}