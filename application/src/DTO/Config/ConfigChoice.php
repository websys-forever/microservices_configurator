<?php

declare(strict_types=1);

namespace App\DTO\Config;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConfigChoice extends AbstractConfig
{
    public function getFormType(): string
    {
        return ChoiceType::class;
    }
}