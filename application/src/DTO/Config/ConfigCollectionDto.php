<?php

declare(strict_types=1);

namespace App\DTO\Config;

class ConfigCollectionDto
{
    private string $microserviceUuid;
    /** @var ConfigInterface[] */
    private array  $collection;

    public function __construct(string $microserviceUuid, array $collection = [])
    {
        $this->microserviceUuid = $microserviceUuid;
        $this->collection = $collection;
    }

    public function getMicroserviceUuid(): string
    {
        return $this->microserviceUuid;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }
}