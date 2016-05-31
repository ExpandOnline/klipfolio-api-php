<?php namespace ExpandOnline\KlipfolioApi\Object\Client;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class ClientProperty
 * @package ExpandOnline\KlipfolioApi\Object\ClientProprty
 *
 * @property array properties
 */
class ClientProperty extends BaseApiResource {


    /**
     * @param array $properties
     * @return $this
     */
    public function setProperties(array $properties) {
        $this->properties = $properties;
        return $this;
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function addProperty($name, $value) {
        $this->properties[$name] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getProperties() {
        return $this->properties;
    }
}