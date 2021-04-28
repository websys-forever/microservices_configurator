<?php

declare(strict_types=1);

namespace App\DTO\Config;

class ConfigCollectionDto
{
    private string $microserviceUuid;
    private array  $configs;

    public function __construct(string $microserviceUuid, array $configs = [])
    {
        $this->microserviceUuid = $microserviceUuid;
        $this->configs = $configs;
    }

    public function getMicroserviceUuid(): string
    {
        return $this->microserviceUuid;
    }

    public function getFields(): array
    {
        return $this->configs;
    }
}