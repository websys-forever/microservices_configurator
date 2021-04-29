<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\ConfigsFormType;
use App\Service\ConfigProvider\Configurator;
use App\Service\Form\FormConstructor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroservicesConfiguratorController extends AbstractController
{
    /** @var Configurator */
    private Configurator $configurator;
    /** @var FormConstructor */
    private FormConstructor $formConstructor;

    public function __construct(Configurator $configurator, FormConstructor $formConstructor)
    {
        $this->configurator = $configurator;
        $this->formConstructor = $formConstructor;
    }

    /**
     * @Route("/configs", methods={"GET"}, name="show_configs")
     */
    public function listConfigurations()
    {
        $allConfigs = $this->configurator->getAllConfigs();

        $formViews = [];
        foreach ($allConfigs as $microserviceUuid => $microserviceConfigs) {
            $form = $this->createForm(
                ConfigsFormType::class,
                [$microserviceConfigs],
                [
                    'action' => $this->generateUrl('save_configs', ['microservice_uuid' => $microserviceUuid]),
                    'method' => 'POST',
                ]
            );
            $formViews[] = $form->createView();
        }

        //dd($allConfigs);
        return $this->render('config/index.html.twig', ['forms' => $formViews]);
    }

    /**
     * @Route("/configs/{microservice_uuid}/save", methods={"POST"}, name="save_configs")
     */
    public function saveConfigurations()
    {
        // TODO Доделать
        return new Response('test save');
    }
}