<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Microservice\Configuration\ConfiguratorInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroservicesConfiguratorController
{
    /**
     * @Route("/configs")
     */
    public function listConfigurations(ConfiguratorInterface $configurator)
    {
        $configurations = $configurator->getConfigurations();

        return new JsonResponse($configurations);
    }
}