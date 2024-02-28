<?php

namespace Rouda\Docker\Api\Endpoint;

class ImageTag extends \Rouda\Docker\Api\Runtime\Client\BaseEndpoint implements \Rouda\Docker\Api\Runtime\Client\Endpoint
{
    protected $name;
    /**
     * Tag an image so that it becomes part of a repository.
     *
     * @param string $name Image name or ID to tag.
     * @param array $queryParameters {
     *     @var string $repo The repository to tag in. For example, `someuser/someimage`.
     *     @var string $tag The name of the new tag.
     * }
     */
    public function __construct(string $name, array $queryParameters = [])
    {
        $this->name = $name;
        $this->queryParameters = $queryParameters;
    }
    use \Rouda\Docker\Api\Runtime\Client\EndpointTrait;
    public function getMethod() : string
    {
        return 'POST';
    }
    public function getUri() : string
    {
        return str_replace(['{name}'], [$this->name], '/images/{name}/tag');
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
        $optionsResolver->setDefined(['repo', 'tag']);
        $optionsResolver->setRequired([]);
        $optionsResolver->setDefaults([]);
        $optionsResolver->addAllowedTypes('repo', ['string']);
        $optionsResolver->addAllowedTypes('tag', ['string']);
        return $optionsResolver;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Rouda\Docker\Api\Exception\ImageTagBadRequestException
     * @throws \Rouda\Docker\Api\Exception\ImageTagNotFoundException
     * @throws \Rouda\Docker\Api\Exception\ImageTagConflictException
     * @throws \Rouda\Docker\Api\Exception\ImageTagInternalServerErrorException
     *
     * @return null
     */
    protected function transformResponseBody(\Psr\Http\Message\ResponseInterface $response, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        $status = $response->getStatusCode();
        $body = (string) $response->getBody();
        if (201 === $status) {
            return null;
        }
        if (400 === $status) {
            throw new \Rouda\Docker\Api\Exception\ImageTagBadRequestException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (404 === $status) {
            throw new \Rouda\Docker\Api\Exception\ImageTagNotFoundException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (409 === $status) {
            throw new \Rouda\Docker\Api\Exception\ImageTagConflictException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
        if (500 === $status) {
            throw new \Rouda\Docker\Api\Exception\ImageTagInternalServerErrorException($serializer->deserialize($body, 'Rouda\\Docker\\Api\\Model\\ErrorResponse', 'json'), $response);
        }
    }
    public function getAuthenticationScopes() : array
    {
        return [];
    }
}