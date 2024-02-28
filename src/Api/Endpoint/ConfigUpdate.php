<?php

namespace Rouda\Docker\Api\Endpoint;

class ConfigUpdate extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $id;
    /**
    * 
    *
    * @param string $id The ID or name of the config
    * @param \Rouda\Docker\Api\Model\ConfigSpec $body The spec of the config to update. Currently, only the Labels field
    can be updated. All other fields must remain unchanged from the
    [ConfigInspect endpoint](#operation/ConfigInspect) response values.
    
    * @param array $queryParameters {
    *     @var int $version The version number of the config object being updated. This is
    required to avoid conflicting writes.
    
    * }
    */
    public function __construct(string $id, \Rouda\Docker\Api\Model\ConfigSpec $body, array $queryParameters = [])
    {
        $this->id = $id;
        $this->body = $body;
        $this->queryParameters = $queryParameters;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(['{id}'], [$this->id], '/configs/{id}/update');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return $this->getSerializedBody($serializer);
    }
    public function getExtraHeaders() : array
    {
        return ['Accept' => ['application/json']];
    }
    protected function getQueryOptionsResolver() : \Symfony\Component\OptionsResolver\OptionsResolver
    {
        $optionsResolver = parent::getQueryOptionsResolver();
        $optionsResolver->setDefined(['version']);
        $optionsResolver->setRequired(['version']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('version', ['int']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Rouda\Docker\Api\Exception\ConfigUpdateBadRequestException
     * @throws \Rouda\Docker\Api\Exception\ConfigUpdateNotFoundException
     * @throws \Rouda\Docker\Api\Exception\ConfigUpdateInternalServerErrorException
     * @throws \Rouda\Docker\Api\Exception\ConfigUpdateServiceUnavailableException
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
            throw new \Rouda\Docker\Api\Exception\ConfigUpdateBadRequestException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\ConfigUpdateNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ConfigUpdateInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (503 === $status) {
            throw new \Rouda\Docker\Api\Exception\ConfigUpdateServiceUnavailableException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}