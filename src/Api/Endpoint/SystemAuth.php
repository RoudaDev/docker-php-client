<?php

namespace Rouda\Docker\Api\Endpoint;

class SystemAuth extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    /**
    * Validate credentials for a registry and, if available, get an identity
    token for accessing the registry without password.
    
    *
    * @param \Rouda\Docker\Api\Model\AuthConfig $authConfig Authentication to check
    */
    public function __construct(\Rouda\Docker\Api\Model\AuthConfig $authConfig)
    {
        $this->body = $authConfig;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/auth';
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
     * @throws \Rouda\Docker\Api\Exception\SystemAuthUnauthorizedException
     * @throws \Rouda\Docker\Api\Exception\SystemAuthInternalServerErrorException
     *
     * @return null|\Rouda\Docker\Api\Model\AuthPostResponse200
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\AuthPostResponse200', 'json');
        }
        if (204 === $status) {
            return null;
        }
        if (401 === $status) {
            throw new \Rouda\Docker\Api\Exception\SystemAuthUnauthorizedException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\SystemAuthInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}