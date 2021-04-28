<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

interface ConfigProviderInterface
{
    public function getName(): string;

    public function getConfigs(): array;

    public function saveConfigs(array $configs): bool;
}