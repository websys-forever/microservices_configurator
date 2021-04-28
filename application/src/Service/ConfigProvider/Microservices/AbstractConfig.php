<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider\Microservices;

abstract class AbstractConfig implements MicroserviceConfigInterface
{
    private string $microserviceUuid;
    private array  $config;

    public function __construct(string $microserviceUuid, array $config)
    {
        $this->microserviceUuid = $microserviceUuid;
        $this->config = $config;
    }

    public function getConfig(): array
    {
        return ($this->config) ?
            [$this->microserviceUuid => $this->config] :
            [$this->microserviceUuid => []];
    }

    public function updateConfig(array $config): bool
    {
        return true;
    }
}