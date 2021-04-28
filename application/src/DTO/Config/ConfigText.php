<?php

declare(strict_types=1);

namespace App\DTO\Config;

use Symfony\Component\Form\Extension\Core\Type\TextType;

class ConfigText extends AbstractConfig
{
    public function getFormType(): string
    {
        return TextType::class;
    }
}