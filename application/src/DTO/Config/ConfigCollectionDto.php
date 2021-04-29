<?php

declare(strict_types=1);

namespace App\DTO\Config;

class ConfigCollectionDto
{
    private array  $collection;

    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }

    public function getCollection(): array
    {
        return $this->collection;
    }
}