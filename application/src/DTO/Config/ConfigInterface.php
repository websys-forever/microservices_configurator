<?php

declare(strict_types=1);

namespace App\DTO\Config;

interface ConfigInterface
{
    public function getName(): string;
    public function setName(string $name): void;

    public function getValue();
    public function setValue($value): void;
}