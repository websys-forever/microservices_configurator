<?php

declare(strict_types=1);

namespace App\Service\ConfigProvider;

use App\Service\ConfigProvider\Microservices\MicroserviceConfigInterface;

class HttpConfigProvider extends AbstractConfigProvider
{
    public function __construct(MicroserviceConfigInterface $microserviceConfig)
    {
        parent::__construct($microserviceConfig);
        var_dump($this->getConfigs());
    }
}