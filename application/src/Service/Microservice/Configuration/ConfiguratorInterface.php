<?php

declare(strict_types=1);

namespace App\Service\Microservice\Configuration;

interface ConfiguratorInterface
{
    public function getConfigurations(): array;
    public function updateConfigurations(): bool;
}