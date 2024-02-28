<?php

namespace Rouda\Docker\Api\Model;

class PortStatus
{
    /**
     * @var array
     */
    protected $initialized = [];
    public function isInitialized($property) : bool
    {
        return array_key_exists($property, $this->initialized);
    }
    /**
     * 
     *
     * @var EndpointPortConfig[]|null
     */
    protected $ports;
    /**
     * 
     *
     * @return EndpointPortConfig[]|null
     */
    public function getPorts() : ?array
    {
        return $this->ports;
    }
    /**
     * 
     *
     * @param EndpointPortConfig[]|null $ports
     *
     * @return self
     */
    public function setPorts(?array $ports) : self
    {
        $this->initialized['ports'] = true;
        $this->ports = $ports;
        return $this;
    }
}