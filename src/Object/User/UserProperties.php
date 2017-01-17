<?php namespace ExpandOnline\KlipfolioApi\Object\User;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class UserProperties
 * @package ExpandOnline\KlipfolioApi\Object\ClientProprty
 *
 * @property array properties
 */
class UserProperties extends BaseApiResource
{


    /**
     * @param array $properties
     * @return $this
     */
    public function setProperties(array $properties)
    {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function addProperty($name, $value)
    {
        if (!array_key_exists('properties', $this->data)) {
            $this->data['properties'] = [];
        }
        $this->data['properties'][$name] = $value;

        if (!in_array('properties', $this->dataChanged)) {
            $this->dataChanged[] = 'properties';
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }
}