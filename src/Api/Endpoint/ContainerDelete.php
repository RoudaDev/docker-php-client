<?php

namespace Rouda\Docker\Api\Endpoint;

class ContainerDelete extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
     * 
     *
     * @param string $id ID or name of the container
     * @param array $queryParameters {
     *     @var bool $v Remove anonymous volumes associated with the container.
     *     @var bool $force If the container is running, kill it before removing it.
     *     @var bool $link Remove the specified link associated with the container.
     * }
     */
    public function __construct(string $id, array $queryParameters = [])
    {
        $this->id = $id;
        $this->queryParameters = $queryParameters;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'DELETE';
    }
    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/containers/{id}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return [[], null];
    }
    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['v', 'force', 'link']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults(['v' => false, 'force' => false, 'link' => false]);
        $optionsResolver->addAllowedTypes('v', ['bool']);
        $optionsResolver->addAllowedTypes('force', ['bool']);
        $optionsResolver->addAllowedTypes('link', ['bool']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Rouda\Docker\Api\Exception\ContainerDeleteBadRequestException
     * @throws \Rouda\Docker\Api\Exception\ContainerDeleteNotFoundException
     * @throws \Rouda\Docker\Api\Exception\ContainerDeleteConflictException
     * @throws \Rouda\Docker\Api\Exception\ContainerDeleteInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (204 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerDeleteBadRequestException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerDeleteNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (409 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerDeleteConflictException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ContainerDeleteInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}