<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\Config\ConfigInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var ConfigInterface $configDto */
        $configDto = $options['data'];

        $builder->add($configDto->getName(), $configDto->getFormType())
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
    }
}