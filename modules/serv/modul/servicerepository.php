<?php

namespace Modules\Serv\Modul;

class Servicerepository
{
    /**
     * Получить название таблицы
     */
    private function getTableName(): string
    {
        return \Modules\Core\Modul\Env::get("DB_PREFIX") . "services";
    }

    /**
     * Получить соединение с базой данных
     */
    private function getConnection(): \PDO
    {
        return \Modules\Core\Modul\Sql::connect();
    }

    /**
     * 1) Выгружать с бд все строки в массиве где каждый элемент это образец класса сервис.
     * @return Service[]
     */
    public function findAll(): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " ORDER BY sort_order ASC, name ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * 2) Получить сервис по ид
     */
    public function getById(int $id): ?Service
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($data) {
            $service = new Service();
            $service->fromArray($data);
            return $service;
        }
        
        return null;
    }

    /**
     * 3) Получить сервис по слаг
     */
    public function getBySlug(string $slug): ?Service
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE slug = :slug";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':slug' => $slug]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($data) {
            $service = new Service();
            $service->fromArray($data);
            return $service;
        }
        
        return null;
    }

    /**
     * 4) Получить сервис по website_url
     */
    public function getByWebsiteUrl(string $websiteUrl): ?Service
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE website_url = :website_url";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':website_url' => $websiteUrl]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($data) {
            $service = new Service();
            $service->fromArray($data);
            return $service;
        }
        
        return null;
    }

    /**
     * 5) Получить сервис по demo_url
     */
    public function getByDemoUrl(string $demoUrl): ?Service
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE demo_url = :demo_url";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':demo_url' => $demoUrl]);
        
        $data = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        if ($data) {
            $service = new Service();
            $service->fromArray($data);
            return $service;
        }
        
        return null;
    }

    /**
     * Сохранить сервис (создать или обновить)
     */
    public function save(Service $service): bool
    {
        $pdo = $this->getConnection();
        $data = $service->toArray();
        
        if (empty($data['id'])) {
            // Создание нового сервиса
            unset($data['id']);
            $columns = implode(', ', array_keys($data));
            $placeholders = ':' . implode(', :', array_keys($data));
            
            $sql = "INSERT INTO " . $this->getTableName() . " ({$columns}) VALUES ({$placeholders})";
        } else {
            // Обновление существующего сервиса
            $updates = [];
            foreach (array_keys($data) as $column) {
                if ($column !== 'id') {
                    $updates[] = "{$column} = :{$column}";
                }
            }
            $setClause = implode(', ', $updates);
            
            $sql = "UPDATE " . $this->getTableName() . " SET {$setClause} WHERE id = :id";
        }
        
        $stmt = $pdo->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Удалить сервис по ID
     */
    public function delete(int $id): bool
    {
        $pdo = $this->getConnection();
        $sql = "DELETE FROM " . $this->getTableName() . " WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Поиск сервисов по категории
     */
    public function getByCategoryId(int $categoryId): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE category_id = :category_id ORDER BY sort_order ASC, name ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':category_id' => $categoryId]);
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Поиск по статусу
     */
    public function getByStatus(string $status): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE status = :status ORDER BY sort_order ASC, name ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':status' => $status]);
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Получить рекомендуемые сервисы
     */
    public function getRecommended(): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE is_recommended = 1 ORDER BY sort_order ASC, name ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Получить featured сервисы
     */
    public function getFeatured(): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " WHERE featured = 1 ORDER BY sort_order ASC, weight DESC, name ASC";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Поиск по названию и описанию
     */
    public function search(string $query): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " 
                WHERE name LIKE :query 
                   OR short_description LIKE :query 
                   OR full_description LIKE :query
                ORDER BY sort_order ASC, name ASC";
        
        $stmt = $pdo->prepare($sql);
        $searchQuery = "%{$query}%";
        $stmt->execute([':query' => $searchQuery]);
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Пагинация
     */
    public function getPaginated(int $page = 1, int $perPage = 20): array
    {
        $pdo = $this->getConnection();
        $offset = ($page - 1) * $perPage;
        
        $sql = "SELECT * FROM " . $this->getTableName() . " 
                ORDER BY sort_order ASC, name ASC 
                LIMIT :limit OFFSET :offset";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $perPage, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Получить общее количество сервисов
     */
    public function getCount(): int
    {
        $pdo = $this->getConnection();
        $sql = "SELECT COUNT(*) as total FROM " . $this->getTableName();
        $stmt = $pdo->query($sql);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        
        return (int) $result['total'];
    }

    /**
     * Увеличить счетчик просмотров
     */
    public function incrementViewCount(int $id): bool
    {
        $pdo = $this->getConnection();
        $sql = "UPDATE " . $this->getTableName() . " SET view_count = view_count + 1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Увеличить счетчик кликов
     */
    public function incrementClickCount(int $id): bool
    {
        $pdo = $this->getConnection();
        $sql = "UPDATE " . $this->getTableName() . " SET click_count = click_count + 1 WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    /**
     * Получить сервисы с наибольшим количеством просмотров
     */
    public function getMostViewed(int $limit = 10): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " 
                ORDER BY view_count DESC 
                LIMIT :limit";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }

    /**
     * Получить сервисы с наивысшим рейтингом
     */
    public function getTopRated(int $limit = 10): array
    {
        $pdo = $this->getConnection();
        $sql = "SELECT * FROM " . $this->getTableName() . " 
                WHERE rating > 0 
                ORDER BY rating DESC, review_count DESC 
                LIMIT :limit";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        
        $services = [];
        while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $service = new Service();
            $service->fromArray($row);
            $services[] = $service;
        }
        
        return $services;
    }
}