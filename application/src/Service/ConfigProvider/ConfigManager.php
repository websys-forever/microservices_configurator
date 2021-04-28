<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

class ConfigManager
{
    private array $configProviders;

    public function __construct(array $configProviders)
    {
        $this->configProviders = $configProviders;
    }

    public function getAllConfigs(): array
    {
        $configs = [];
echo '<pre>'; print_r($this->configProviders);
        /** @var ConfigProviderInterface $provider */
        foreach ($this->configProviders as $provider) {
            $configs[] = $provider->getConfigs();
        }

        return $configs;
    }

    public function update($serviceName, array $configs): bool
    {
        return true;
    }


}