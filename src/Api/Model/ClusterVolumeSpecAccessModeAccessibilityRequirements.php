<?php

namespace Rouda\Docker\Api\Model;

class ClusterVolumeSpecAccessModeAccessibilityRequirements
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
    * A list of required topologies, at least one of which the
    volume must be accessible from.
    
    *
    * @var array<string, string>[]|null
    */
    protected $requisite;
    /**
    * A list of topologies that the volume should attempt to be
    provisioned in.
    
    *
    * @var array<string, string>[]|null
    */
    protected $preferred;
    /**
    * A list of required topologies, at least one of which the
    volume must be accessible from.
    
    *
    * @return array<string, string>[]|null
    */
    public function getRequisite() : ?array
    {
        return $this->requisite;
    }
    /**
    * A list of required topologies, at least one of which the
    volume must be accessible from.
    
    *
    * @param array<string, string>[]|null $requisite
    *
    * @return self
    */
    public function setRequisite(?array $requisite) : self
    {
        $this->initialized['requisite'] = true;
        $this->requisite = $requisite;
        return $this;
    }
    /**
    * A list of topologies that the volume should attempt to be
    provisioned in.
    
    *
    * @return array<string, string>[]|null
    */
    public function getPreferred() : ?array
    {
        return $this->preferred;
    }
    /**
    * A list of topologies that the volume should attempt to be
    provisioned in.
    
    *
    * @param array<string, string>[]|null $preferred
    *
    * @return self
    */
    public function setPreferred(?array $preferred) : self
    {
        $this->initialized['preferred'] = true;
        $this->preferred = $preferred;
        return $this;
    }
}