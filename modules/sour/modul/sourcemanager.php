<?php

namespace Modules\Sour\Modul;

class SourceManager
{
    private static ?array $cachedSources = null;
    private static ?SourceService $sourceService = null;
    private static ?array $abbreviationMap = null;
    
    public static function getSource(int $id, bool $loadFromCache = true): ?Source
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        if (self::$cachedSources === null && $loadFromCache) {
            self::loadAllSources();
        }
        
        if (self::$cachedSources !== null && $loadFromCache) {
            return self::$cachedSources[$id] ?? null;
        }
        
        return self::$sourceService->getById($id);
    }
    
    public static function getSourceAbbreviation(int $id): string
    {
        $source = self::getSource($id);
        return $source ? $source->getAbbreviation() : '';
    }
    
    public static function getSourceSlug(int $id): string
    {
        $source = self::getSource($id);
        return $source ? $source->getSlug() : '';
    }
    
    public static function getSourceName(int $id): string
    {
        $source = self::getSource($id);
        return $source ? $source->getName() : '';
    }
    
    public static function getSources(array $ids): array
    {
        if (empty($ids)) {
            return [];
        }
        
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        if (self::$cachedSources === null) {
            self::loadAllSources();
        }
        
        $result = [];
        $missingIds = [];
        
        foreach ($ids as $id) {
            if (isset(self::$cachedSources[$id])) {
                $result[$id] = self::$cachedSources[$id];
            } else {
                $missingIds[] = $id;
            }
        }
        
        if (!empty($missingIds)) {
            $missingSources = self::$sourceService->getByIds($missingIds);
            foreach ($missingSources as $source) {
                $result[$source->getId()] = $source;
                self::$cachedSources[$source->getId()] = $source;
            }
        }
        
        $orderedResult = [];
        foreach ($ids as $id) {
            if (isset($result[$id])) {
                $orderedResult[] = $result[$id];
            }
        }
        
        return $orderedResult;
    }
    
    public static function getAbbreviationMap(): array
    {
        if (self::$abbreviationMap === null) {
            self::$abbreviationMap = [];
            $sources = self::getAllSources();
            
            foreach ($sources as $source) {
                self::$abbreviationMap[$source->getId()] = $source->getAbbreviation();
            }
        }
        
        return self::$abbreviationMap;
    }
    
    public static function getAbbreviationFromMap(int $id): string
    {
        $map = self::getAbbreviationMap();
        return $map[$id] ?? '';
    }
    
    public static function getAllSources(): array
    {
        if (self::$cachedSources === null) {
            self::loadAllSources();
        }
        
        return array_values(self::$cachedSources);
    }
    
    public static function getAllActiveSources(): array
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->getAllActive();
    }
    
    public static function loadAllSources(): void
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        $allSources = self::$sourceService->loadAllSources();
        self::$cachedSources = [];
        
        foreach ($allSources as $source) {
            self::$cachedSources[$source->getId()] = $source;
        }
    }
    
    public static function clearCache(): void
    {
        self::$cachedSources = null;
        self::$abbreviationMap = null;
        
        if (self::$sourceService !== null) {
            self::$sourceService->clearCache();
        }
    }
    
    public static function getSourceBySlug(string $slug): ?Source
    {
        if (self::$cachedSources === null) {
            self::loadAllSources();
        }
        
        foreach (self::$cachedSources as $source) {
            if ($source->getSlug() === $slug) {
                return $source;
            }
        }
        
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        $source = self::$sourceService->getBySlug($slug);
        
        if ($source !== null) {
            self::$cachedSources[$source->getId()] = $source;
        }
        
        return $source;
    }
    
    public static function sourceExists(int $id): bool
    {
        return self::getSource($id) !== null;
    }
    
    public static function getIdByAbbreviation(string $abbreviation): ?int
    {
        if (self::$cachedSources === null) {
            self::loadAllSources();
        }
        
        foreach (self::$cachedSources as $source) {
            if ($source->getAbbreviation() === $abbreviation) {
                return $source->getId();
            }
        }
        
        return null;
    }
    
    public static function getSourceByType(string $type): array
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->getByType($type);
    }
    
    public static function getSourceByPublisher(string $publisher): array
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->getByPublisher($publisher);
    }
    
    public static function searchSourceByName(string $searchTerm): array
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->searchByName($searchTerm);
    }
    
    public static function getAllTypes(): array
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->getAllTypes();
    }
    
    public static function getAllPublishers(): array
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->getAllPublishers();
    }
    
    public static function getTotalCount(): int
    {
        if (self::$sourceService === null) {
            self::$sourceService = new SourceService();
        }
        
        return self::$sourceService->getTotalCount();
    }
}