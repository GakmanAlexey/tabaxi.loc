<?php

namespace Modules\Sour\Modul;

    use \PDO;
    use \PDOStatement;
    use \Modules\Core\Modul\Sql;
    use \Modules\Core\Modul\Env;

class Sourceservice
{

    private \PDO $connection;
    private string $tableName;
    private ?array $allSources = null;
    private ?array $activeSources = null;
    private ?array $inactiveSources = null;

    public function __construct()
    {
        $this->connection = Sql::connect();
        $this->tableName = Env::get("DB_PREFIX") . 'sources';
    }
    
    public function getAllActive()
    {
        if ($this->activeSources !== null) {
            return $this->activeSources;
        }

        $sql = "SELECT * FROM {$this->tableName} WHERE is_public = 1 ORDER BY name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        $sources = [];
        while ($data = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $sources[] = \Modules\Sour\Modul\Source::fromArray($data);
        }
        
        $this->activeSources = $sources;
        return $sources;
    }
    
    public function getAllInactive()
    {
        if ($this->inactiveSources !== null) {
            return $this->inactiveSources;
        }

        $sql = "SELECT * FROM {$this->tableName} WHERE is_public = 0 ORDER BY name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        $sources = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sources[] = Source::fromArray($data);
        }
        
        $this->inactiveSources = $sources;
        return $sources;
    }
    
    public function getById(int $id)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return Source::fromArray($data);
        }
        
        return null;
    }
    
    public function getBySlug(string $slug)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE slug = :slug LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':slug' => $slug]);
        
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($data) {
            return Source::fromArray($data);
        }
        
        return null;
    }
    
    public function loadAllSources(bool $forceRefresh = false): array
    {
        if ($this->allSources !== null && !$forceRefresh) {
            return $this->allSources;
        }

        $sql = "SELECT * FROM {$this->tableName} ORDER BY name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        $sources = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sources[] = Source::fromArray($data);
        }
        
        $this->allSources = $sources;
        // Также сбрасываем кэши активных/неактивных
        $this->activeSources = null;
        $this->inactiveSources = null;
        
        return $sources;
    }
    
    public function getByIdFromCache(int $id)
    {
        if ($this->allSources === null) {
            $this->loadAllSources();
        }
        
        foreach ($this->allSources as $source) {
            if ($source->getId() === $id) {
                return $source;
            }
        }
        
        return null;
    }
    
    public function getBySlugFromCache(string $slug)
    {
        if ($this->allSources === null) {
            $this->loadAllSources();
        }
        
        foreach ($this->allSources as $source) {
            if ($source->getSlug() === $slug) {
                return $source;
            }
        }
        
        return null;
    }
    
    public function getByIds(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }
        
        // Фильтруем только целые числа
        $ids = array_filter($ids, 'is_int');
        if (empty($ids)) {
            return [];
        }
        
        $placeholders = str_repeat('?,', count($ids) - 1) . '?';
        $sql = "SELECT * FROM {$this->tableName} WHERE id IN ({$placeholders}) ORDER BY FIELD(id, {$placeholders})";
        
        $params = array_merge($ids, $ids);
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        
        $sources = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sources[] = Source::fromArray($data);
        }
        
        return $sources;
    }
    
    public function getByIdsFromCache(array $ids)
    {
        if (empty($ids)) {
            return [];
        }
        
        if ($this->allSources === null) {
            $this->loadAllSources();
        }
        
        $result = [];
        $ids = array_flip($ids); // Для быстрого поиска
        
        foreach ($this->allSources as $source) {
            if (isset($ids[$source->getId()])) {
                $result[$source->getId()] = $source;
            }
        }
        
        // Восстанавливаем исходный порядок
        $orderedResult = [];
        foreach ($ids as $id => $position) {
            if (isset($result[$id])) {
                $orderedResult[] = $result[$id];
            }
        }
        
        return $orderedResult;
    }
    
    public function getByType(string $type)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE type = :type ORDER BY name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':type' => $type]);
        
        $sources = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sources[] = Source::fromArray($data);
        }
        
        return $sources;
    }
    
    public function getByPublisher(string $publisher)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE publisher = :publisher ORDER BY name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':publisher' => $publisher]);
        
        $sources = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sources[] = Source::fromArray($data);
        }
        
        return $sources;
    }
    
    public function clearCache(): void
    {
        $this->allSources = null;
        $this->activeSources = null;
        $this->inactiveSources = null;
    }
    
    public function getTotalCount(): int
    {
        $sql = "SELECT COUNT(*) as count FROM {$this->tableName}";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return (int) ($result['count'] ?? 0);
    }
    
    public function getCachedSources(): ?array
    {
        return $this->allSources;
    }
    
    public function searchByName(string $searchTerm)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE name LIKE :search ORDER BY name";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':search' => "%{$searchTerm}%"]);
        
        $sources = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $sources[] = Source::fromArray($data);
        }
        
        return $sources;
    }
    
    public function getAllTypes()
    {
        $sql = "SELECT DISTINCT type FROM {$this->tableName} ORDER BY type";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        $types = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $types[] = $data['type'];
        }
        
        return $types;
    }
    
    public function getAllPublishers()
    {
        $sql = "SELECT DISTINCT publisher FROM {$this->tableName} WHERE publisher IS NOT NULL ORDER BY publisher";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        
        $publishers = [];
        while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $publishers[] = $data['publisher'];
        }
        
        return $publishers;
    }
}