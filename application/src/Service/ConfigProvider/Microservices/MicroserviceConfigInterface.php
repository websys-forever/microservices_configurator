<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider\Microservices;

interface MicroserviceConfigInterface
{
    public function getConfig(): array;

    public function updateConfig(array $config): bool;
}