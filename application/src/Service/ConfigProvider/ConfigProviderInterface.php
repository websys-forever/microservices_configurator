<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

use App\DTO\Config\ConfigCollectionDto;

interface ConfigProviderInterface
{
    public function getName(): string;

    /** @return ConfigCollectionDto */
    public function getConfigs(): ConfigCollectionDto;

    public function saveConfigs(array $configs): bool;
}