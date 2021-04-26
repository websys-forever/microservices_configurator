<?php

declare(strict_types=1);

namespace App\Service\Microservice\Configuration;

use App\DTO\MicroserviceConfigurationDTOInterface;

class Configurator implements ConfiguratorInterface
{
    private $microservicesConfigAdapters;

    public function __construct(array $microservicesConfigAdapters)
    {
        $this->microservicesConfigAdapters = $microservicesConfigAdapters;
    }

    /**
     * @return MicroserviceConfigurationDTOInterface[]
     */
    public function getConfigurations(): array
    {
        $configurations = [];

        /** @var ConfigurationAdapterInterface $adapter */
        foreach ($this->microservicesConfigAdapters as $adapter) {
            $configurations[] = $adapter->getConfiguration();
        }

        return $configurations;
    }

    public function updateConfigurations(): bool
    {
        return true;
    }


}