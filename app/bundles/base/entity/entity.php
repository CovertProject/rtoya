<?php

namespace Base\Entity;

/**
 * Base Entity for all other system entities
 *
 * @author Tyler Schwartz <ts@daxiangroup.com>
 */
class Entity
{
    protected $created;
    protected $updated;

    /**
     * Get the created date.
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Get the updated date.
     *
     * @return DateTime
     */
    public function getUpdated()
    {
        return $this->updated;
    }
}
