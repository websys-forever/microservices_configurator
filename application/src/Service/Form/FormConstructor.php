<?php

declare(strict_types=1);

namespace App\Service\Form;

use App\DTO\Config\ConfigCollectionDto;
use App\DTO\Config\ConfigInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FormConstructor
{
    private FormFactoryInterface $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /** @return FormInterface[] */
    public function createForms(array $allConfigs)
    {
        $forms = array_map(function ($configCollection) {
            /** @var ConfigCollectionDto $configCollection */
            $microserviceUuid = $configCollection->getMicroserviceUuid();
            $configs = $configCollection->getFields();

            $form = $this->formFactory->createBuilder()->create($microserviceUuid, null, ['compound' => true]);

            foreach ($configs as $config) {
                /** @var ConfigInterface $config */
                $form->add($config->getName(), $config->getFormType());
            }

            return $form->getForm()->createView();
        }, $allConfigs);

        return $forms;
    }
}