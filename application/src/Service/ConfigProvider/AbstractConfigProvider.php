<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

use App\DTO\Config\ConfigChoice;
use App\DTO\Config\ConfigCollectionDto;
use App\DTO\Config\ConfigInteger;
use App\DTO\Config\ConfigInterface;
use App\DTO\Config\ConfigText;

abstract class AbstractConfigProvider implements ConfigProviderInterface
{
    private string $microserviceUuid;
    private array  $configs;

    public function __construct(string $microserviceUuid, array $configs)
    {
        $this->microserviceUuid = $microserviceUuid;
        $this->configs = $configs;
    }

    public function getName(): string
    {
        return $this->microserviceUuid;
    }

    /** @inheritDoc */
    public function getConfigs(): array
    {
        $configCollection = [];

        /** @var ConfigInterface $config */
        foreach ($this->configs as $name => $config) {
            if (is_int($config)) {
                $configCollection[] = new ConfigInteger($name, $config);
            } elseif (is_array($config)) {
                $configCollection[] = new ConfigChoice($name, $config);
            } else {
                $configCollection[] = new ConfigText($name, $config);
            }
        }

        return [$this->microserviceUuid => new ConfigCollectionDto($configCollection)];
    }

    public function saveConfigs(array $configs): bool
    {
        return true; // TODO реализовать
    }
}