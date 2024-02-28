<?php

namespace Rouda\Docker;

use Rouda\Docker\Api\Client;
use Symfony\Component\HttpClient\HttpClient;

class Docker extends Client
{

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [])
    {
        if (null === $httpClient) {
            // create a symfony http client that has the docker socket as the base uri
            $httpClient = HttpClient::create();

            // set the base uri to the docker socket
            $httpClient->withOptions([
                'base_uri' => 'unix:///var/run/docker.sock',
            ]);
        }

        return parent::create($httpClient, $additionalPlugins, $additionalNormalizers);
    }
}
