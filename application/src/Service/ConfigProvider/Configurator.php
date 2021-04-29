<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

class Configurator
{
    private array $configProviders;

    public function __construct(array $configProviders)
    {
        $this->configProviders = $configProviders;
    }

    public function getAllConfigs(): array
    {
        $configs = [];

        /** @var ConfigProviderInterface $provider */
        foreach ($this->configProviders as $provider) {
            $configs[$provider->getName()] = $provider->getConfigs();
        }

        return $configs;
    }

    public function update(string $serviceName, array $configs): bool
    {
        return false; // TODO реализовать
    }


}