<?php

namespace Rouda\Docker\Api\Endpoint;

class ConfigCreate extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \Rouda\Docker\Api\Model\ConfigsCreatePostBody $body 
     */
    public function __construct(\Rouda\Docker\Api\Model\ConfigsCreatePostBody $body)
    {
        $this->body = $body;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/configs/create';
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
     * @throws \Rouda\Docker\Api\Exception\ConfigCreateConflictException
     * @throws \Rouda\Docker\Api\Exception\ConfigCreateInternalServerErrorException
     * @throws \Rouda\Docker\Api\Exception\ConfigCreateServiceUnavailableException
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
        if (409 === $status) {
            throw new \Rouda\Docker\Api\Exception\ConfigCreateConflictException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ConfigCreateInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (503 === $status) {
            throw new \Rouda\Docker\Api\Exception\ConfigCreateServiceUnavailableException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}