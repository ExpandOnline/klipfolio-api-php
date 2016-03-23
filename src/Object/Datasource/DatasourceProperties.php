<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class DatasourceProperties
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class DatasourceProperties extends BaseApiResource
{

    const FIELD_PROPERTIES = 'properties';

    /**
     * @return mixed
     */
    public function getProperties() {
        return $this->data[self::FIELD_PROPERTIES];
    }

    /**
     * @param $properties
     * @return $this
     */
    public function setProperties($properties) {
        $this->{self::FIELD_PROPERTIES} = $properties;

        return $this;
    }
    
    /**
     * A DatasourceProprerty always exists because the PUT creates it if it does not exist or
     * updates it if it existss.
     * @return bool
     */
    public function exists()
    {
        return true;
    }

}