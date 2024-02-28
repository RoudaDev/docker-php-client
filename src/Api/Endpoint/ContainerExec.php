<?php

namespace Rouda\Docker\Api\Endpoint;

class ContainerExec extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * Run a command inside a running container.
     *
     * @param string $id ID or name of container
     * @param \Rouda\Docker\Api\Model\ContainersIdExecPostBody $execConfig Exec configuration
     */
    public function __construct(string $id, \Rouda\Docker\Api\Model\ContainersIdExecPostBody $execConfig)
    {
        $this->id = $id;
        $this->body = $execConfig;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/exec');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Rouda\Docker\Api\Exception\ContainerExecNotFoundException
     * @throws \Rouda\Docker\Api\Exception\ContainerExecConflictException
     * @throws \Rouda\Docker\Api\Exception\ContainerExecInternalServerErrorException
     *
     * @return null|\Rouda\Docker\Api\Model\IdResponse
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (201 === $status) {
            return $serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\IdResponse', 'json');
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerExecNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (409 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerExecConflictException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerExecInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}