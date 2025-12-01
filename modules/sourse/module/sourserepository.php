<?php

namespace Modules\Source\Repository;

use Modules\Source\Model\Source;


class SourceRepository
{
    private \PDO $pdo;
    private string $tableName;

    public function __construct()
    {
        $this->pdo = \Modules\Core\Modul\Sql::connect();
        $this->tableName = \Modules\Core\Modul\Env::get("DB_PREFIX") . "sources";
    }
    
    private function logError(string $method, string $message): void
    {
        $logger = new \Modules\Core\Modul\Logs();
        $msg = "SourceRepository {$method}: {$message}";
        $logger->loging('source', $msg);
    }
    
    public function getById(int $id): ?Source
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = ? LIMIT 1");
            $stmt->execute([$id]);
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            if ($data) {
                return Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getById', $e->getMessage());
        }
        
        return null;
    }
    
    public function getBySlug(string $slug): ?Source
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE slug = ? LIMIT 1");
            $stmt->execute([$slug]);
            $data = $stmt->fetch(\PDO::FETCH_ASSOC);
            
            if ($data) {
                return Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getBySlug', $e->getMessage());
        }
        
        return null;
    }
    
    public function getByIdentifier(int|string $identifier): ?Source
    {
        if (is_numeric($identifier)) {
            return $this->getById((int)$identifier);
        }
        
        return $this->getBySlug((string)$identifier);
    }
    
    public function getAll(): array
    {
        $sources = [];
        
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} ORDER BY name ASC");
            $stmt->execute();
            
            while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $sources[] = Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getAll', $e->getMessage());
        }
        
        return $sources;
    }
    
    public function getAllActive(): array
    {
        $sources = [];
        
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE is_public = 1 ORDER BY name ASC");
            $stmt->execute();
            
            while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $sources[] = Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getAllActive', $e->getMessage());
        }
        
        return $sources;
    }
    
    public function getOrStub(int|string $identifier): Source
    {
        $source = $this->getByIdentifier($identifier);
        
        if ($source !== null) {
            return $source;
        }
        return $this->createStub($identifier);
    }
    
    private function createStub(int|string $identifier): Source
    {
        $isNumeric = is_numeric($identifier);
        
        $sourceData = [
            'id' => $isNumeric ? (int)$identifier : 0,
            'name' => 'Неизвестный источник',
            'slug' => $isNumeric ? 'unknown-' . $identifier : (string)$identifier,
            'abbreviation' => 'UNK',
            'edition' => null,
            'type' => 'homebrew',
            'imgId' => 0,
            'url' => null,
            'full_url' => null,
            'is_official' => 0,
            'publisher' => null,
            'creator_user_id' => null,
            'is_public' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        return Source::fromArray($sourceData);
    }
    
    public function getByIds(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }
        
        $sources = [];
        $ids = array_map('intval', $ids);
        $placeholders = str_repeat('?,', count($ids) - 1) . '?';
        
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id IN ({$placeholders}) ORDER BY name ASC");
            $stmt->execute($ids);
            
            while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $sources[] = Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getByIds', $e->getMessage());
        }
        
        return $sources;
    }
    
    public function getByType(string $type): array
    {
        $sources = [];
        
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE type = ? AND is_public = 1 ORDER BY name ASC");
            $stmt->execute([$type]);
            
            while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $sources[] = Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getByType', $e->getMessage());
        }
        
        return $sources;
    }
    
    public function save(Source $source): bool
    {
        $data = $source->toArray();
        $dbData = [
            'name' => $data['name'],
            'slug' => $data['slug'],
            'abbreviation' => $data['abbreviation'],
            'edition' => $data['edition'],
            'type' => $data['type'],
            'imgId' => $data['imgId'],
            'url' => $data['url'],
            'full_url' => $data['fullUrl'],
            'is_official' => $data['isOfficial'] ? 1 : 0,
            'publisher' => $data['publisher'],
            'creator_user_id' => $data['creatorUserId'],
            'is_public' => $data['isPublic'] ? 1 : 0
        ];
        
        try {
            if ($source->getId() > 0) {
                $setParts = [];
                $params = [];
                
                foreach ($dbData as $key => $value) {
                    $setParts[] = "{$key} = ?";
                    $params[] = $value;
                }
                
                $params[] = $source->getId();
                
                $sql = "UPDATE {$this->tableName} SET " . implode(', ', $setParts) . " WHERE id = ?";
                $stmt = $this->pdo->prepare($sql);
                return $stmt->execute($params);
            } else {
                $fields = array_keys($dbData);
                $placeholders = str_repeat('?,', count($fields) - 1) . '?';
                $values = array_values($dbData);
                
                $sql = "INSERT INTO {$this->tableName} (" . implode(', ', $fields) . 
                       ") VALUES ({$placeholders})";
                $stmt = $this->pdo->prepare($sql);
                
                if ($stmt->execute($values)) {
                    $source->setId((int)$this->pdo->lastInsertId());
                    return true;
                }
            }
        } catch (\PDOException $e) {
            $this->logError('save', $e->getMessage());
        }
        
        return false;
    }
    
    public function delete(int $id): bool
    {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id = ?");
            return $stmt->execute([$id]);
        } catch (\PDOException $e) {
            $this->logError('delete', $e->getMessage());
            return false;
        }
    }
    
    public function slugExists(string $slug, ?int $excludeId = null): bool
    {
        try {
            if ($excludeId) {
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->tableName} WHERE slug = ? AND id != ?");
                $stmt->execute([$slug, $excludeId]);
            } else {
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->tableName} WHERE slug = ?");
                $stmt->execute([$slug]);
            }
            
            return (int)$stmt->fetchColumn() > 0;
        } catch (\PDOException $e) {
            $this->logError('slugExists', $e->getMessage());
            return false;
        }
    }
    
    public function searchByName(string $query, int $limit = 10): array
    {
        $sources = [];
        
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE name LIKE ? AND is_public = 1 ORDER BY name ASC LIMIT ?");
            $searchTerm = "%" . $query . "%";
            $stmt->execute([$searchTerm, $limit]);
            
            while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $sources[] = Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('searchByName', $e->getMessage());
        }
        
        return $sources;
    }
    
    public function getCount(bool $onlyActive = false): int
    {
        try {
            if ($onlyActive) {
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->tableName} WHERE is_public = 1");
            } else {
                $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM {$this->tableName}");
            }
            
            $stmt->execute();
            return (int)$stmt->fetchColumn();
        } catch (\PDOException $e) {
            $this->logError('getCount', $e->getMessage());
            return 0;
        }
    }
    
    public function getPaginated(int $page = 1, int $perPage = 20, bool $onlyActive = false): array
    {
        $sources = [];
        $offset = ($page - 1) * $perPage;
        
        try {
            $whereClause = $onlyActive ? "WHERE is_public = 1" : "";
            $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName} {$whereClause} ORDER BY name ASC LIMIT ? OFFSET ?");
            $stmt->bindValue(1, $perPage, \PDO::PARAM_INT);
            $stmt->bindValue(2, $offset, \PDO::PARAM_INT);
            $stmt->execute();
            
            while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $sources[] = Source::fromArray($data);
            }
        } catch (\PDOException $e) {
            $this->logError('getPaginated', $e->getMessage());
        }
        
        return $sources;
    }
}