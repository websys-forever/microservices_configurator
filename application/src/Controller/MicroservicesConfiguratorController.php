<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ConfigsFormType;
use App\Service\ConfigProvider\Configurator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroservicesConfiguratorController extends AbstractController
{
    /** @var Configurator */
    private Configurator $configurator;

    public function __construct(Configurator $configurator)
    {
        $this->configurator = $configurator;
    }

    /**
     * @Route("/configs", methods={"GET"}, name="configs_list")
     */
    public function listConfigurations()
    {
        $allConfigs = $this->configurator->getAllConfigs();

        $formViews = [];
        foreach ($allConfigs as $microserviceUuid => $microserviceConfigs) {
            $form = $this->createForm(
                ConfigsFormType::class,
                $microserviceConfigs,
                [
                    'action' => $this->generateUrl('configs_save', ['microservice_uuid' => $microserviceUuid]),
                    'method' => 'POST',
                ]
            );

            $formViews[$microserviceUuid] = $form->createView();
        }

        return $this->render('config/index.html.twig', ['forms' => $formViews]);
    }

    /**
     * @Route("/configs/{microservice_uuid}/", methods={"POST"}, name="configs_save")
     */
    public function saveConfigurations()
    {
        // TODO Доделать сохранение
        return new Response('TODO Доделать сохранение');
    }
}