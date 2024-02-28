<?php

namespace Rouda\Docker\Api\Endpoint;

class ContainerExport extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id ID or name of the container
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/export');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return [[], null];
    }
    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Rouda\Docker\Api\Exception\ContainerExportNotFoundException
     * @throws \Rouda\Docker\Api\Exception\ContainerExportInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return null;
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerExportNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerExportInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}