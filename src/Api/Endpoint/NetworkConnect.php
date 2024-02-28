<?php

namespace Rouda\Docker\Api\Endpoint;

class NetworkConnect extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * The network must be either a local-scoped network or a swarm-scoped network with the `attachable` option set. A network cannot be re-attached to a running container
     *
     * @param string $id Network ID or name
     * @param \Rouda\Docker\Api\Model\NetworksIdConnectPostBody $container 
     */
    public function __construct(string $id, \Rouda\Docker\Api\Model\NetworksIdConnectPostBody $container)
    {
        $this->id = $id;
        $this->body = $container;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/networks/{id}/connect');
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
     * @throws \Rouda\Docker\Api\Exception\NetworkConnectBadRequestException
     * @throws \Rouda\Docker\Api\Exception\NetworkConnectForbiddenException
     * @throws \Rouda\Docker\Api\Exception\NetworkConnectNotFoundException
     * @throws \Rouda\Docker\Api\Exception\NetworkConnectInternalServerErrorException
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
        if (400 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkConnectBadRequestException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (403 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkConnectForbiddenException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkConnectNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkConnectInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}