<?php

namespace Rouda\Docker\Api\Endpoint;

class SecretInspect extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id ID of the secret
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
        return str_replace(['{id}'], [$this->id], '/secrets/{id}');
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
     * @throws \Rouda\Docker\Api\Exception\SecretInspectNotFoundException
     * @throws \Rouda\Docker\Api\Exception\SecretInspectInternalServerErrorException
     * @throws \Rouda\Docker\Api\Exception\SecretInspectServiceUnavailableException
     *
     * @return null|\Rouda\Docker\Api\Model\Secret
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\Secret', 'json');
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\SecretInspectNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\SecretInspectInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (503 === $status) {
            throw new \Rouda\Docker\Api\Exception\SecretInspectServiceUnavailableException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}