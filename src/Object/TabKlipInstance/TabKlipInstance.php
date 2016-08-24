<?php namespace ExpandOnline\KlipfolioApi\Object\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class TabKlipInstance
 * @package ExpandOnline\KlipfolioApi\Object\TabKlipInstance
 */
class TabKlipInstance extends BaseApiResource
{

    const FIELD_KLIP_ID = 'klip_id';
    const FIELD_NAME = 'name';
    const FIELD_POSITION = 'position';
    const FIELD_REGION = 'region';

    /**
     * @return mixed
     */
    public function getPosition() {
        return $this->data[static::FIELD_POSITION];
    }

    /**
     * @param $position
     * @return $this
     */
    public function setPosition($position) {
        $this->{static::FIELD_POSITION} = $position;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRegion() {
        return $this->data[static::FIELD_REGION];
    }

    /**
     * @param $region
     * @return $this
     */
    public function setRegion($region) {
        $this->{static::FIELD_REGION} = $region;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKlipId() {
        return $this->data[static::FIELD_KLIP_ID];
    }

    /**
     * @param $klipId
     * @return $this
     */
    public function setKlipId($klipId) {
        $this->{static::FIELD_KLIP_ID} = $klipId;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->data[static::FIELD_NAME];
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name) {
        $this->{static::FIELD_NAME} = $name;

        return $this;
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return isset($this->data[static::FIELD_KLIP_ID]);
    }

}