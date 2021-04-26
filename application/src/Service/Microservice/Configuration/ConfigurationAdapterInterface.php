<?php

declare(strict_types=1);

namespace App\Service\Microservice\Configuration;

use App\DTO\MicroserviceConfigurationDTOInterface;

interface ConfigurationAdapterInterface
{
    public function getConfiguration();

    /** @var MicroserviceConfigurationDTOInterface[] $configuration */
    public function updateConfiguration(array $configuration): bool;
}