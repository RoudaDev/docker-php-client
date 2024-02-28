<?php

namespace Rouda\Docker\Api\Exception;

class PutContainerArchiveForbiddenException extends ForbiddenException
{
    /**
     * @var \Rouda\Docker\Api\Model\ErrorResponse
     */
    private $errorResponse;
    /**
     * @var \Psr\Http\Message\ResponseInterface
     */
    private $response;
    public function __construct(\Rouda\Docker\Api\Model\ErrorResponse $errorResponse, \Psr\Http\Message\ResponseInterface $response)
    {
        parent::__construct('Permission denied, the volume or container rootfs is marked as read-only.');
        $this->errorResponse = $errorResponse;
        $this->response = $response;
    }
    public function getErrorResponse() : \Rouda\Docker\Api\Model\ErrorResponse
    {
        return $this->errorResponse;
    }
    public function getResponse() : \Psr\Http\Message\ResponseInterface
    {
        return $this->response;
    }
}