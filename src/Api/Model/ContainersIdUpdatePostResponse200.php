<?php

namespace Rouda\Docker\Api\Model;

class ContainersIdUpdatePostResponse200
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
     * @var string[]|null
     */
    protected $warnings;
    /**
     * 
     *
     * @return string[]|null
     */
    public function getWarnings() : ?array
    {
        return $this->warnings;
    }
    /**
     * 
     *
     * @param string[]|null $warnings
     *
     * @return self
     */
    public function setWarnings(?array $warnings) : self
    {
        $this->initialized['warnings'] = true;
        $this->warnings = $warnings;
        return $this;
    }
}