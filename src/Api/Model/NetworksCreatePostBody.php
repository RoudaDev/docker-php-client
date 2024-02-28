<?php

namespace Rouda\Docker\Api\Model;

class NetworksCreatePostBody
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
     * The network's name.
     *
     * @var string|null
     */
    protected $name;
    /**
     * Deprecated: CheckDuplicate is now always enabled.
     *
     * @var bool|null
     */
    protected $checkDuplicate;
    /**
     * Name of the network driver plugin to use.
     *
     * @var string|null
     */
    protected $driver = 'bridge';
    /**
     * Restrict external access to the network.
     *
     * @var bool|null
     */
    protected $internal;
    /**
    * Globally scoped network is manually attachable by regular
    containers from workers in swarm mode.
    
    *
    * @var bool|null
    */
    protected $attachable;
    /**
    * Ingress network is the network which provides the routing-mesh
    in swarm mode.
    
    *
    * @var bool|null
    */
    protected $ingress;
    /**
     * 
     *
     * @var IPAM|null
     */
    protected $iPAM;
    /**
     * Enable IPv6 on the network.
     *
     * @var bool|null
     */
    protected $enableIPv6;
    /**
     * Network specific options to be used by the drivers.
     *
     * @var array<string, string>|null
     */
    protected $options;
    /**
     * User-defined key/value metadata.
     *
     * @var array<string, string>|null
     */
    protected $labels;
    /**
     * The network's name.
     *
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
    /**
     * The network's name.
     *
     * @param string|null $name
     *
     * @return self
     */
    public function setName(?string $name) : self
    {
        $this->initialized['name'] = true;
        $this->name = $name;
        return $this;
    }
    /**
     * Deprecated: CheckDuplicate is now always enabled.
     *
     * @return bool|null
     */
    public function getCheckDuplicate() : ?bool
    {
        return $this->checkDuplicate;
    }
    /**
     * Deprecated: CheckDuplicate is now always enabled.
     *
     * @param bool|null $checkDuplicate
     *
     * @return self
     */
    public function setCheckDuplicate(?bool $checkDuplicate) : self
    {
        $this->initialized['checkDuplicate'] = true;
        $this->checkDuplicate = $checkDuplicate;
        return $this;
    }
    /**
     * Name of the network driver plugin to use.
     *
     * @return string|null
     */
    public function getDriver() : ?string
    {
        return $this->driver;
    }
    /**
     * Name of the network driver plugin to use.
     *
     * @param string|null $driver
     *
     * @return self
     */
    public function setDriver(?string $driver) : self
    {
        $this->initialized['driver'] = true;
        $this->driver = $driver;
        return $this;
    }
    /**
     * Restrict external access to the network.
     *
     * @return bool|null
     */
    public function getInternal() : ?bool
    {
        return $this->internal;
    }
    /**
     * Restrict external access to the network.
     *
     * @param bool|null $internal
     *
     * @return self
     */
    public function setInternal(?bool $internal) : self
    {
        $this->initialized['internal'] = true;
        $this->internal = $internal;
        return $this;
    }
    /**
    * Globally scoped network is manually attachable by regular
    containers from workers in swarm mode.
    
    *
    * @return bool|null
    */
    public function getAttachable() : ?bool
    {
        return $this->attachable;
    }
    /**
    * Globally scoped network is manually attachable by regular
    containers from workers in swarm mode.
    
    *
    * @param bool|null $attachable
    *
    * @return self
    */
    public function setAttachable(?bool $attachable) : self
    {
        $this->initialized['attachable'] = true;
        $this->attachable = $attachable;
        return $this;
    }
    /**
    * Ingress network is the network which provides the routing-mesh
    in swarm mode.
    
    *
    * @return bool|null
    */
    public function getIngress() : ?bool
    {
        return $this->ingress;
    }
    /**
    * Ingress network is the network which provides the routing-mesh
    in swarm mode.
    
    *
    * @param bool|null $ingress
    *
    * @return self
    */
    public function setIngress(?bool $ingress) : self
    {
        $this->initialized['ingress'] = true;
        $this->ingress = $ingress;
        return $this;
    }
    /**
     * 
     *
     * @return IPAM|null
     */
    public function getIPAM() : ?IPAM
    {
        return $this->iPAM;
    }
    /**
     * 
     *
     * @param IPAM|null $iPAM
     *
     * @return self
     */
    public function setIPAM(?IPAM $iPAM) : self
    {
        $this->initialized['iPAM'] = true;
        $this->iPAM = $iPAM;
        return $this;
    }
    /**
     * Enable IPv6 on the network.
     *
     * @return bool|null
     */
    public function getEnableIPv6() : ?bool
    {
        return $this->enableIPv6;
    }
    /**
     * Enable IPv6 on the network.
     *
     * @param bool|null $enableIPv6
     *
     * @return self
     */
    public function setEnableIPv6(?bool $enableIPv6) : self
    {
        $this->initialized['enableIPv6'] = true;
        $this->enableIPv6 = $enableIPv6;
        return $this;
    }
    /**
     * Network specific options to be used by the drivers.
     *
     * @return array<string, string>|null
     */
    public function getOptions() : ?iterable
    {
        return $this->options;
    }
    /**
     * Network specific options to be used by the drivers.
     *
     * @param array<string, string>|null $options
     *
     * @return self
     */
    public function setOptions(?iterable $options) : self
    {
        $this->initialized['options'] = true;
        $this->options = $options;
        return $this;
    }
    /**
     * User-defined key/value metadata.
     *
     * @return array<string, string>|null
     */
    public function getLabels() : ?iterable
    {
        return $this->labels;
    }
    /**
     * User-defined key/value metadata.
     *
     * @param array<string, string>|null $labels
     *
     * @return self
     */
    public function setLabels(?iterable $labels) : self
    {
        $this->initialized['labels'] = true;
        $this->labels = $labels;
        return $this;
    }
}