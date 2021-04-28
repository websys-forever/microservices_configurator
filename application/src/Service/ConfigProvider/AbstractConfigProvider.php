<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

use App\Service\ConfigProvider\Microservices\MicroserviceConfigInterface;

abstract class AbstractConfigProvider implements ConfigProviderInterface
{
    private MicroserviceConfigInterface $microserviceConfig;

    public function __construct(MicroserviceConfigInterface $microserviceConfig)
    {
        $this->microserviceConfig = $microserviceConfig;
    }

    public function getName(): string
    {
        return (string) key($this->microserviceConfig->getConfig());
    }

    public function getConfigs(): array
    {
        return $this->microserviceConfig->getConfig();
    }

    public function saveConfigs(array $configs): bool
    {
        return true;
    }
}