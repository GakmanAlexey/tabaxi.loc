<?php

namespace Modules\Serv\Modul;

class Service
{
    private int $id;
    private string $name;
    private string $slug;
    private ?string $shortDescription;
    private ?string $fullDescription;
    private int $categoryId = 0;
    private int $parentCategoryId = 0;
    private ?string $tags;
    private int $logoImgId = 0;
    private ?string $galleryImgIds;
    private ?string $websiteUrl;
    private ?string $demoUrl;
    private bool $apiAvailable = false;
    private ?string $platforms;
    private ?string $languages;
    private ?string $difficulty;
    private ?string $priceModel;
    private ?string $priceInfo;
    private ?string $status;
    private ?int $originalReleaseYear;
    private ?string $lastUpdatedDate;
    private float $rating = 0.00;
    private int $reviewCount = 0;
    private int $viewCount = 0;
    private int $clickCount = 0;
    private ?string $features;
    private ?string $systemRequirements;
    private ?string $supportedEditions;
    private bool $isOfficial = false;
    private bool $isRecommended = false;
    private int $sortOrder = 0;
    private bool $featured = false;
    private int $weight = 0;
    private string $createdAt;
    private string $updatedAt;
    private ?string $publishedAt;

    // ID
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    // Name
    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    // Slug
    public function getSlug(): string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;
        return $this;
    }

    // Short Description
    public function getShortDescription(): ?string
    {
        return $this->shortDescription;
    }

    public function setShortDescription(?string $shortDescription): self
    {
        $this->shortDescription = $shortDescription;
        return $this;
    }

    // Full Description
    public function getFullDescription(): ?string
    {
        return $this->fullDescription;
    }

    public function setFullDescription(?string $fullDescription): self
    {
        $this->fullDescription = $fullDescription;
        return $this;
    }

    // Category ID
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $categoryId): self
    {
        $this->categoryId = $categoryId;
        return $this;
    }

    // Parent Category ID
    public function getParentCategoryId(): int
    {
        return $this->parentCategoryId;
    }

    public function setParentCategoryId(int $parentCategoryId): self
    {
        $this->parentCategoryId = $parentCategoryId;
        return $this;
    }

    // Tags
    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(?string $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    // Logo Image ID
    public function getLogoImgId(): int
    {
        return $this->logoImgId;
    }

    public function setLogoImgId(int $logoImgId): self
    {
        $this->logoImgId = $logoImgId;
        return $this;
    }

    // Gallery Image IDs
    public function getGalleryImgIds(): ?string
    {
        return $this->galleryImgIds;
    }

    public function setGalleryImgIds(?string $galleryImgIds): self
    {
        $this->galleryImgIds = $galleryImgIds;
        return $this;
    }

    // Website URL
    public function getWebsiteUrl(): ?string
    {
        return $this->websiteUrl;
    }

    public function setWebsiteUrl(?string $websiteUrl): self
    {
        $this->websiteUrl = $websiteUrl;
        return $this;
    }

    // Demo URL
    public function getDemoUrl(): ?string
    {
        return $this->demoUrl;
    }

    public function setDemoUrl(?string $demoUrl): self
    {
        $this->demoUrl = $demoUrl;
        return $this;
    }

    // API Available
    public function isApiAvailable(): bool
    {
        return $this->apiAvailable;
    }

    public function setApiAvailable(bool $apiAvailable): self
    {
        $this->apiAvailable = $apiAvailable;
        return $this;
    }

    // Platforms
    public function getPlatforms(): ?string
    {
        return $this->platforms;
    }

    public function setPlatforms(?string $platforms): self
    {
        $this->platforms = $platforms;
        return $this;
    }

    // Languages
    public function getLanguages(): ?string
    {
        return $this->languages;
    }

    public function setLanguages(?string $languages): self
    {
        $this->languages = $languages;
        return $this;
    }

    // Difficulty
    public function getDifficulty(): ?string
    {
        return $this->difficulty;
    }

    public function setDifficulty(?string $difficulty): self
    {
        $this->difficulty = $difficulty;
        return $this;
    }

    // Price Model
    public function getPriceModel(): ?string
    {
        return $this->priceModel;
    }

    public function setPriceModel(?string $priceModel): self
    {
        $this->priceModel = $priceModel;
        return $this;
    }

    // Price Info
    public function getPriceInfo(): ?string
    {
        return $this->priceInfo;
    }

    public function setPriceInfo(?string $priceInfo): self
    {
        $this->priceInfo = $priceInfo;
        return $this;
    }

    // Status
    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    // Original Release Year
    public function getOriginalReleaseYear(): ?int
    {
        return $this->originalReleaseYear;
    }

    public function setOriginalReleaseYear(?int $originalReleaseYear): self
    {
        $this->originalReleaseYear = $originalReleaseYear;
        return $this;
    }

    // Last Updated Date
    public function getLastUpdatedDate(): ?string
    {
        return $this->lastUpdatedDate;
    }

    public function setLastUpdatedDate(?string $lastUpdatedDate): self
    {
        $this->lastUpdatedDate = $lastUpdatedDate;
        return $this;
    }

    // Rating
    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    // Review Count
    public function getReviewCount(): int
    {
        return $this->reviewCount;
    }

    public function setReviewCount(int $reviewCount): self
    {
        $this->reviewCount = $reviewCount;
        return $this;
    }

    // View Count
    public function getViewCount(): int
    {
        return $this->viewCount;
    }

    public function setViewCount(int $viewCount): self
    {
        $this->viewCount = $viewCount;
        return $this;
    }

    // Click Count
    public function getClickCount(): int
    {
        return $this->clickCount;
    }

    public function setClickCount(int $clickCount): self
    {
        $this->clickCount = $clickCount;
        return $this;
    }

    // Features
    public function getFeatures(): ?string
    {
        return $this->features;
    }

    public function setFeatures(?string $features): self
    {
        $this->features = $features;
        return $this;
    }

    // System Requirements
    public function getSystemRequirements(): ?string
    {
        return $this->systemRequirements;
    }

    public function setSystemRequirements(?string $systemRequirements): self
    {
        $this->systemRequirements = $systemRequirements;
        return $this;
    }

    // Supported Editions
    public function getSupportedEditions(): ?string
    {
        return $this->supportedEditions;
    }

    public function setSupportedEditions(?string $supportedEditions): self
    {
        $this->supportedEditions = $supportedEditions;
        return $this;
    }

    // Is Official
    public function isOfficial(): bool
    {
        return $this->isOfficial;
    }

    public function setIsOfficial(bool $isOfficial): self
    {
        $this->isOfficial = $isOfficial;
        return $this;
    }

    // Is Recommended
    public function isRecommended(): bool
    {
        return $this->isRecommended;
    }

    public function setIsRecommended(bool $isRecommended): self
    {
        $this->isRecommended = $isRecommended;
        return $this;
    }

    // Sort Order
    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    // Featured
    public function isFeatured(): bool
    {
        return $this->featured;
    }

    public function setFeatured(bool $featured): self
    {
        $this->featured = $featured;
        return $this;
    }

    // Weight
    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): self
    {
        $this->weight = $weight;
        return $this;
    }

    // Created At
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    // Updated At
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    // Published At
    public function getPublishedAt(): ?string
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?string $publishedAt): self
    {
        $this->publishedAt = $publishedAt;
        return $this;
    }

    // Helper methods for array/JSON fields
    public function getTagsArray(): array
    {
        if (empty($this->tags)) {
            return [];
        }
        
        // Если tags хранится как JSON
        if (strpos($this->tags, '[') === 0) {
            return json_decode($this->tags, true) ?? [];
        }
        
        // Если tags хранится через запятую
        return array_map('trim', explode(',', $this->tags));
    }

    public function setTagsArray(array $tags): self
    {
        $this->tags = json_encode($tags);
        return $this;
    }

    public function getGalleryImgIdsArray(): array
    {
        if (empty($this->galleryImgIds)) {
            return [];
        }
        
        if (strpos($this->galleryImgIds, '[') === 0) {
            return json_decode($this->galleryImgIds, true) ?? [];
        }
        
        $ids = array_map('intval', array_filter(explode(',', $this->galleryImgIds)));
        return array_values($ids);
    }

    public function setGalleryImgIdsArray(array $galleryImgIds): self
    {
        $this->galleryImgIds = json_encode($galleryImgIds);
        return $this;
    }

    public function getPlatformsArray(): array
    {
        if (empty($this->platforms)) {
            return [];
        }
        
        if (strpos($this->platforms, '[') === 0) {
            return json_decode($this->platforms, true) ?? [];
        }
        
        return array_map('trim', explode(',', $this->platforms));
    }

    public function setPlatformsArray(array $platforms): self
    {
        $this->platforms = json_encode($platforms);
        return $this;
    }

    public function getLanguagesArray(): array
    {
        if (empty($this->languages)) {
            return [];
        }
        
        if (strpos($this->languages, '[') === 0) {
            return json_decode($this->languages, true) ?? [];
        }
        
        return array_map('trim', explode(',', $this->languages));
    }

    public function setLanguagesArray(array $languages): self
    {
        $this->languages = json_encode($languages);
        return $this;
    }

    public function getFeaturesArray(): array
    {
        if (empty($this->features)) {
            return [];
        }
        
        if (strpos($this->features, '[') === 0) {
            return json_decode($this->features, true) ?? [];
        }
        
        return array_map('trim', explode(',', $this->features));
    }

    public function setFeaturesArray(array $features): self
    {
        $this->features = json_encode($features);
        return $this;
    }

    public function getSupportedEditionsArray(): array
    {
        if (empty($this->supportedEditions)) {
            return [];
        }
        
        if (strpos($this->supportedEditions, '[') === 0) {
            return json_decode($this->supportedEditions, true) ?? [];
        }
        
        return array_map('trim', explode(',', $this->supportedEditions));
    }

    public function setSupportedEditionsArray(array $supportedEditions): self
    {
        $this->supportedEditions = json_encode($supportedEditions);
        return $this;
    }

   // Method to convert object to array for database operations
    public function toArray(): array
    {
        $result = [];
        
        // Проверяем и добавляем только инициализированные свойства
        $properties = [
            'id' => $this->id ?? null,
            'name' => $this->name ?? '',
            'slug' => $this->slug ?? '',
            'short_description' => $this->shortDescription ?? null,
            'full_description' => $this->fullDescription ?? null,
            'category_id' => $this->categoryId,
            'parent_category_id' => $this->parentCategoryId,
            'tags' => $this->tags ?? null,
            'logo_img_id' => $this->logoImgId,
            'gallery_img_ids' => $this->galleryImgIds ?? null,
            'website_url' => $this->websiteUrl ?? null,
            'demo_url' => $this->demoUrl ?? null,
            'api_available' => $this->apiAvailable ? 1 : 0,
            'platforms' => $this->platforms ?? null,
            'languages' => $this->languages ?? null,
            'difficulty' => $this->difficulty ?? null,
            'price_model' => $this->priceModel ?? null,
            'price_info' => $this->priceInfo ?? null,
            'status' => $this->status ?? null,
            'original_release_year' => $this->originalReleaseYear ?? null,
            'last_updated_date' => $this->lastUpdatedDate ?? null,
            'rating' => $this->rating,
            'review_count' => $this->reviewCount,
            'view_count' => $this->viewCount,
            'click_count' => $this->clickCount,
            'features' => $this->features ?? null,
            'system_requirements' => $this->systemRequirements ?? null,
            'supported_editions' => $this->supportedEditions ?? null,
            'is_official' => $this->isOfficial ? 1 : 0,
            'is_recommended' => $this->isRecommended ? 1 : 0,
            'sort_order' => $this->sortOrder,
            'featured' => $this->featured ? 1 : 0,
            'weight' => $this->weight,
            'created_at' => $this->createdAt ?? null,
            'updated_at' => $this->updatedAt ?? null,
            'published_at' => $this->publishedAt ?? null,
        ];
        
        return $properties;
    }

    // Method to populate object from array (e.g., from database row)
    public function fromArray(array $data): self
    {
        foreach ($data as $key => $value) {
            $method = 'set' . str_replace('_', '', ucwords($key, '_'));
            if (method_exists($this, $method)) {
                // Convert database values to proper types
                if ($key === 'api_available' || $key === 'is_official' || 
                    $key === 'is_recommended' || $key === 'featured') {
                    $value = (bool)$value;
                } elseif ($key === 'rating') {
                    $value = (float)$value;
                } elseif (in_array($key, ['id', 'category_id', 'parent_category_id', 'logo_img_id', 
                    'review_count', 'view_count', 'click_count', 'sort_order', 'weight', 'original_release_year'])) {
                    $value = (int)$value;
                }
                $this->$method($value);
            }
        }
        return $this;
    }
}