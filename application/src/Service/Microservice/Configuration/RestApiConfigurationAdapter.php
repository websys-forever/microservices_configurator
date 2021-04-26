<?php

declare(strict_types=1);

namespace App\Service\Microservice\Configuration;

use App\DTO\MicroserviceConfigurationDTOInterface;

class RestApiConfigurationAdapter implements ConfigurationAdapterInterface
{

    public function getConfiguration(): array
    {
        // TODO: Implement getConfiguration() method.
        return [];
    }

    /** @inheritDoc */
    public function updateConfiguration(array $configuration): bool
    {
        // TODO: Implement updateConfiguration() method.
        return true;
    }
}