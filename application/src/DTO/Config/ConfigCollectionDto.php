<?php

declare(strict_types=1);

namespace App\DTO\Config;

class ConfigCollectionDto
{
    public array $collection;

    public function __construct(array $collection = [])
    {
        $this->collection = $collection;
    }
}