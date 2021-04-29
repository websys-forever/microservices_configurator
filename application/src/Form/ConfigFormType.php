<?php

declare(strict_types=1);

namespace App\Form;

use App\DTO\Config\ConfigChoice;
use App\DTO\Config\ConfigInteger;
use App\DTO\Config\ConfigInterface;
use App\DTO\Config\ConfigText;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConfigFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) use ($builder) {
            $form = $event->getForm();
            /** @var ConfigInterface $configDto */
            $configDto = $event->getData();

            if ($configDto instanceof ConfigInterface) {
                switch (get_class($configDto)) {
                    case ConfigInteger::class:
                        $form->add('value', IntegerType::class, [
                            'label' => $configDto->getName(),
                        ]);
                        break;

                    case ConfigText::class:
                        $form->add('value', TextType::class, [
                            'label' => $configDto->getName(),
                        ]);
                        break;

                    case ConfigChoice::class:
                        $form->add('value', ChoiceType::class, [
                            'choices' => array_combine($configDto->getValue(), $configDto->getValue()),
                            'label' => $configDto->getName(),
                            'multiple' => true
                        ]);

                        break;
                }
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ConfigInterface::class,
        ]);
    }
}