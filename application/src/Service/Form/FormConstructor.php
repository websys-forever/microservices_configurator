<?php

declare(strict_types=1);

namespace App\Service\Form;

use App\DTO\Config\ConfigCollectionDto;
use App\Form\ConfigsFormType;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;

class FormConstructor
{
    private FormFactoryInterface $formFactory;

    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @param ConfigCollectionDto[]
     *
     * @return FormInterface[]
     */
    public function createForms(array $allConfigs): array
    {
        $forms = array_map(function ($configCollectionDTO) {
            /** @var ConfigCollectionDto $configCollectionDTO */

            $form = $this->formFactory->create(
                ConfigsFormType::class,
                $configCollectionDTO,
                ['compound' => true]
            );

            return $form->createView();
        }, $allConfigs);

        return $forms;
    }
}