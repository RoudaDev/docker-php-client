<?php

namespace Rouda\Docker\Api\Endpoint;

class ImageSearch extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    /**
    * Search for an image on Docker Hub.
    *
    * @param array $queryParameters {
    *     @var string $term Term to search
    *     @var int $limit Maximum number of results to return
    *     @var string $filters A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
    
    - `is-automated=(true|false)` (deprecated, see below)
    - `is-official=(true|false)`
    - `stars=<number>` Matches images that has at least 'number' stars.
    
    The `is-automated` filter is deprecated. The `is_automated` field has
    been deprecated by Docker Hub's search API. Consequently, searching
    for `is-automated=true` will yield no results.
    
    * }
    */
    public function __construct(array $queryParameters = [])
    {
        $this->queryParameters = $queryParameters;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return '/images/search';
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
        $optionsResolver->setDefined(['term', 'limit', 'filters']);
        $optionsResolver->setRequired(['term']);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('term', ['string']);
        $optionsResolver->addAllowedTypes('limit', ['int']);
        $optionsResolver->addAllowedTypes('filters', ['string']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Rouda\Docker\Api\Exception\ImageSearchInternalServerErrorException
     *
     * @return null|\Rouda\Docker\Api\Model\ImagesSearchGetResponse200Item[]
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (200 === $status) {
            return $serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ImagesSearchGetResponse200Item[]', 'json');
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ImageSearchInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}