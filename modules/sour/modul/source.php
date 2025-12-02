<?php

namespace Modules\Sour\Modul;

class Source
{
    private $id;
    private $name;
    private $slug;
    private $abbreviation;
    private $edition = null;
    private $type;
    private $imgId = 0;
    private $url = null;
    private $fullUrl = null;
    private $isOfficial = true;
    private $publisher = null;
    private $creatorUserId = null;
    private $isPublic = true;
    private $createdAt;
    private $updatedAt;

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function getSlug(): string { return $this->slug; }
    public function getAbbreviation(): string { return $this->abbreviation; }
    public function getEdition(): ?string { return $this->edition; }
    public function getType(): string { return $this->type; }
    public function getImgId(): int { return $this->imgId; }
    public function getUrl(): ?string { return $this->url; }
    public function getFullUrl(): ?string { return $this->fullUrl; }
    public function isOfficial(): bool { return $this->isOfficial; }
    public function getPublisher(): ?string { return $this->publisher; }
    public function getCreatorUserId(): ?int { return $this->creatorUserId; }
    public function isPublic(): bool { return $this->isPublic; }
    public function getCreatedAt(): string { return $this->createdAt; }
    public function getUpdatedAt(): string { return $this->updatedAt; }

    public function setId(int $id): void { $this->id = $id; }
    public function setName(string $name): void { $this->name = $name; }
    public function setSlug(string $slug): void { $this->slug = $slug; }
    public function setAbbreviation(string $abbreviation): void { $this->abbreviation = $abbreviation; }
    public function setEdition(?string $edition): void { $this->edition = $edition; }
    public function setType(string $type): void { $this->type = $type; }
    public function setImgId(int $imgId): void { $this->imgId = $imgId; }
    public function setUrl(?string $url): void { $this->url = $url; }
    public function setFullUrl(?string $fullUrl): void { $this->fullUrl = $fullUrl; }
    public function setIsOfficial(bool $isOfficial): void { $this->isOfficial = $isOfficial; }
    public function setPublisher(?string $publisher): void { $this->publisher = $publisher; }
    public function setCreatorUserId(?int $creatorUserId): void { $this->creatorUserId = $creatorUserId; }
    public function setIsPublic(bool $isPublic): void { $this->isPublic = $isPublic; }
    public function setCreatedAt(string $createdAt): void { $this->createdAt = $createdAt; }
    public function setUpdatedAt(string $updatedAt): void { $this->updatedAt = $updatedAt; }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'abbreviation' => $this->abbreviation,
            'edition' => $this->edition,
            'type' => $this->type,
            'imgId' => $this->imgId,
            'url' => $this->url,
            'fullUrl' => $this->fullUrl,
            'isOfficial' => $this->isOfficial,
            'publisher' => $this->publisher,
            'creatorUserId' => $this->creatorUserId,
            'isPublic' => $this->isPublic,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt
        ];
    }

    public static function fromArray( $data)
    {
        $source = new self();
        
        if (isset($data['id'])) $source->setId((int)$data['id']);
        if (isset($data['name'])) $source->setName($data['name']);
        if (isset($data['slug'])) $source->setSlug($data['slug']);
        if (isset($data['abbreviation'])) $source->setAbbreviation($data['abbreviation']);
        if (isset($data['edition'])) $source->setEdition($data['edition']);
        if (isset($data['type'])) $source->setType($data['type']);
        if (isset($data['imgId'])) $source->setImgId((int)$data['imgId']);
        if (isset($data['url'])) $source->setUrl($data['url']);
        if (isset($data['full_url'])) $source->setFullUrl($data['full_url']);
        if (isset($data['is_official'])) $source->setIsOfficial((bool)$data['is_official']);
        if (isset($data['publisher'])) $source->setPublisher($data['publisher']);
        if (isset($data['creator_user_id'])) $source->setCreatorUserId((int)$data['creator_user_id']);
        if (isset($data['is_public'])) $source->setIsPublic((bool)$data['is_public']);
        if (isset($data['created_at'])) $source->setCreatedAt($data['created_at']);
        if (isset($data['updated_at'])) $source->setUpdatedAt($data['updated_at']);

        return $source;
    }
}