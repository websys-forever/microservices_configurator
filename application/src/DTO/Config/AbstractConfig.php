<?php

declare(strict_types=1);

namespace App\DTO\Config;

abstract class AbstractConfig implements ConfigInterface
{
    private string $name;
    private $value;

    public function __construct(string $name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue()
    {
        return $this->value;
    }

    abstract public function getFormType(): string;
}