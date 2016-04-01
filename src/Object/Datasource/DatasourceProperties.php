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
        return $this->data[static::FIELD_PROPERTIES];
    }

    /**
     * @param $properties
     * @return $this
     */
    public function setProperties($properties) {
        $this->{static::FIELD_PROPERTIES} = $properties;

        return $this;
    }
    
    /**
     * A DatasourceProperty always exists because the PUT creates it if it does not exist or
     * updates it if it exists.
     * @return bool
     */
    public function exists()
    {
        return true;
    }

}