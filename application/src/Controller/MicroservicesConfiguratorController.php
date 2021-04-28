<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ConfigProvider\ConfigManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MicroservicesConfiguratorController extends AbstractController
{
    /**
     * @Route("/configs", methods={"GET"})
     */
    public function listConfigurations(ConfigManager $configManager)
    {
        $configs = $configManager->getAllConfigs();

        return $this->render('', $configs);
    }
}