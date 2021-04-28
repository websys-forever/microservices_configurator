<?php

declare(strict_types=1);

namespace App\Service\Form;

use App\DTO\Config\ConfigCollectionDto;
use App\DTO\Config\ConfigInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;

class FormConstructor
{
    /** @var FormBuilderInterface */
    private FormBuilderInterface $formBuilder;

    public function __construct(FormBuilderInterface $formBuilder)
    {
        $this->formBuilder = $formBuilder;
    }

    /** @return FormInterface[] */
    public function createForms(array $allConfigs): array
    {
        $forms = array_map(function ($configCollection) {
            /** @var ConfigCollectionDto $configCollection */
            $microserviceUuid = $configCollection->getMicroserviceUuid();
            $configs = $configCollection->getFields();

            $form = $this->formBuilder->create($microserviceUuid);

            /** @var FormBuilderInterface $configsForm */
            $configsForm = array_map(function ($config) use ($form) {
                /** @var ConfigInterface $config */
                $form->add($config->getName(), $config->getFormType());
            }, $configs);

            return $configsForm->getForm();
        }, $allConfigs);

        var_dump($forms);
        return $forms;
    }
}