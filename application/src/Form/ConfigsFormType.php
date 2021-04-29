<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\Config\ConfigCollectionDto;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ConfigsFormType extends AbstractType
{
    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var ConfigCollectionDto $configCollectionDTO */
        $configCollectionDTO = $options['data'];
        $url = $this->urlGenerator->generate(
            'save_configs',
            ['microservice_uuid' => $configCollectionDTO->getMicroserviceUuid()]);

        $builder
            ->add('collection', CollectionType::class, ['entry_type' => ConfigType::class])
            ->add('save', SubmitType::class)
            ->setMethod('POST')
            ->setAction($url)
        ;
    }
}