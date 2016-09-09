<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class DatasourceProperties
 * @property mixed parameters
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class DatasourceProperties extends BaseApiResource
{

    const FIELD_PARAMETERS = 'parameters';

    /**
     * Extends base constructor so we can set $this->parameters to an instance of DatasourceProperties
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);

        if (!empty($this->data[static::FIELD_PARAMETERS]) && !$this->data[static::FIELD_PARAMETERS] instanceof DatasourcePropertiesParameters) {
            $this->data[static::FIELD_PARAMETERS] = new DatasourcePropertiesParameters($this->data[static::FIELD_PARAMETERS]);
        }
        elseif(empty($this->data[static::FIELD_PARAMETERS])) {
            $this->data[static::FIELD_PARAMETERS] = new DatasourcePropertiesParameters();
        }
    }

    /**
     * @return mixed
     */
    public function getProperties()
    {
        // todo : rename
        return array_diff_key($this->data, array_flip(['id']));
    }

    /**
     * @param $properties
     * @return $this
     */
    public function setProperties($properties)
    {
        foreach($properties as $propertyName => $propertyValue) {

            $this->{$propertyName} = $propertyValue;
        }

        return $this;
    }
    /**
     * @return mixed
     */
    public function getProperty($name)
    {
        return $this->{$name};
    }

    public function setProperty($name, $value)
    {
        $this->{$name} = $value;

        return $this;
    }

    /**
     * @return DatasourcePropertiesParameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    public function setParameters(DatasourcePropertiesParameters $parameters)
    {
        $this->parameters = $parameters;
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