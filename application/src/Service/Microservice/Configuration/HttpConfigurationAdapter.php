<?php

declare(strict_types=1);

namespace App\Service\Microservice\Configuration;

use App\DTO\MicroserviceConfigurationDTOInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HttpConfigurationAdapter implements ConfigurationAdapterInterface
{
    private const GET_REQUEST_METHOD = 'GET';
    private const UPDATE_REQUEST_METHOD = 'POST';
    private HttpClientInterface $client;
    private string $microserviceUrl;

    public function __construct(HttpClientInterface $client, $microserviceUrl)
    {
        $this->client = $client;
        $this->microserviceUrl = $microserviceUrl;
    }

    public function getConfiguration(): array
    {
        $response = $this->client->request(
            self::GET_REQUEST_METHOD,
            $this->microserviceUrl
        );

        $content = [];
        if (Response::HTTP_OK === $response->getStatusCode() &&
            $response->getContent()
        ) {
            $content = $response->toArray();
        }

        return $content;
    }

    /** @inheritDoc */
    public function updateConfiguration(array $configuration): bool
    {
        // TODO: Implement updateConfiguration() method.
    }
}