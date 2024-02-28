<?php

namespace Rouda\Docker\Api\Endpoint;

class NetworkCreate extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    /**
     * 
     *
     * @param \Rouda\Docker\Api\Model\NetworksCreatePostBody $networkConfig Network configuration
     */
    public function __construct(\Rouda\Docker\Api\Model\NetworksCreatePostBody $networkConfig)
    {
        $this->body = $networkConfig;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return '/networks/create';
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
     * @throws \Rouda\Docker\Api\Exception\NetworkCreateBadRequestException
     * @throws \Rouda\Docker\Api\Exception\NetworkCreateForbiddenException
     * @throws \Rouda\Docker\Api\Exception\NetworkCreateNotFoundException
     * @throws \Rouda\Docker\Api\Exception\NetworkCreateInternalServerErrorException
     *
     * @return null|\Rouda\Docker\Api\Model\NetworksCreatePostResponse201
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (201 === $status) {
            return $serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\NetworksCreatePostResponse201', 'json');
        }
        if (400 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkCreateBadRequestException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (403 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkCreateForbiddenException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkCreateNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\NetworkCreateInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}