<?php

namespace Rouda\Docker\Api\Endpoint;

class ContainerUpdate extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
    * Change various configuration options of a container without having to
    recreate it.
    
    *
    * @param string $id ID or name of the container
    * @param \Rouda\Docker\Api\Model\ContainersIdUpdatePostBody $update 
    */
    public function __construct(string $id, \Rouda\Docker\Api\Model\ContainersIdUpdatePostBody $update)
    {
        $this->id = $id;
        $this->body = $update;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}/update');
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
     * @throws \Rouda\Docker\Api\Exception\ContainerUpdateNotFoundException
     * @throws \Rouda\Docker\Api\Exception\ContainerUpdateInternalServerErrorException
     *
     * @return null|\Rouda\Docker\Api\Model\ContainersIdUpdatePostResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ContainersIdUpdatePostResponse200', 'json');
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerUpdateNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerUpdateInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}