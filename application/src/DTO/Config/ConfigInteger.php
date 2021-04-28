<?php

declare(strict_types=1);

namespace App\DTO\Config;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ConfigInteger extends AbstractConfig
{
    public function getFormType(): string
    {
        return IntegerType::class;
    }
}