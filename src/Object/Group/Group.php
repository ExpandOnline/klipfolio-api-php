<?php namespace ExpandOnline\KlipfolioApi\Object\Group;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Client
 * @package ExpandOnline\KlipfolioApi\Object\Group
 *
 * @property $client_id
 * @property $name
 * @property $description
 * @property $external_id
 */
class Group extends BaseApiResource
{
    /**
     * @return mixed
     */
    public function getClientId() {
        return $this->client_id;
    }

    /**
     * @param mixed $client_id
     */
    public function setClientId($client_id) {
        $this->client_id = $client_id;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getExternalId() {
        return $this->external_id;
    }

    /**
     * @param mixed $external_id
     */
    public function setExternalId($external_id) {
        $this->external_id = $external_id;
    }


}