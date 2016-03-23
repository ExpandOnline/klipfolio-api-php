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

    /**
     * @return mixed
     */
    public function getKlipId() {
        return $this->data[self::FIELD_KLIP_ID];
    }

    /**
     * @param $klipId
     * @return $this
     */
    public function setKlipId($klipId) {
        $this->{self::FIELD_KLIP_ID} = $klipId;
        
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->data[self::FIELD_NAME];
    }

    /**
     * @param $name
     * @return $this
     */
    public function setName($name) {
        $this->{self::FIELD_NAME} = $name;

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