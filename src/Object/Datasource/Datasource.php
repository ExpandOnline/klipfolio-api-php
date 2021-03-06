<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\Datasource\Enum\DatasourceConnector;
use ExpandOnline\KlipfolioApi\Object\Datasource\Enum\DatasourceFormat;
use ExpandOnline\KlipfolioApi\Object\Datasource\Enum\DatasourceInterval;

/**
 * Class Datasource
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 *
 * @property string $name
 * @property string $description
 * @property string $format
 * @property string $connector
 * @property string $refresh_interval
 * @property DatasourceProperties $properties
 * @property string $client_id
 *
 */
class Datasource extends BaseApiResource
{

    const FIELD_PROPERTIES = 'properties';

    protected $readOnlyFieldNames = [
        'id', 'company', 'date_created', 'date_last_refresh', 'last_updated', 'created_by', 'share_rights', 'is_locked', 'is_dynamic', 'disabled',
    ];

    /**
     * Extends base constructor so we can set $this->properties to an instance of DatasourceProperties
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->transformProperties();
    }

    /**
     * Transforms properties from array to DatasourceProperties object
     */
    protected function transformProperties()
    {
        $properties = empty($this->data[static::FIELD_PROPERTIES]) ? [] : $this->data[static::FIELD_PROPERTIES];
        $this->data[static::FIELD_PROPERTIES] = new DatasourceProperties($properties);
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param mixed $format
     * @return $this
     * @throws KlipfolioApiException
     */
    public function setFormat($format)
    {
        if ($this->exists()) {
            throw new KlipfolioApiException("Unable to set format on resource that already exists");
        }
        DatasourceFormat::validate($format);
        $this->format = $format;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getConnector()
    {
        return $this->connector;
    }

    /**
     * @param mixed $connector
     * @return $this
     * @throws KlipfolioApiException
     */
    public function setConnector($connector)
    {
        if ($this->exists()) {
            throw new KlipfolioApiException("Unable to set connector on resource that already exists");
        }
        DatasourceConnector::validate($connector);
        $this->connector = $connector;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRefreshInterval()
    {
        return $this->refresh_interval;
    }

    /**
     * @param mixed $refreshInterval
     * @return $this
     */
    public function setRefreshInterval($refreshInterval)
    {

        DatasourceInterval::validate($refreshInterval);
        $this->refresh_interval = $refreshInterval;
        return $this;
    }

    /**
     * @return DatasourceProperties
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @param mixed $properties
     * @return $this
     * @throws KlipfolioApiException
     */
    public function setProperties(DatasourceProperties $properties)
    {
        if ($this->exists()) {
            throw new KlipfolioApiException("Unable to set properties on resource that already exists");
        }
        $this->properties = $properties;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $clientId
     * @return $this
     * @throws KlipfolioApiException
     */
    public function setClientId($clientId)
    {
        if ($this->exists()) {
            throw new KlipfolioApiException("Unable to set client_id on resource that already exists");
        }
        $this->client_id = $clientId;
        return $this;
    }


    public function setData(array $data)
    {
        parent::setData($data);
        if (!is_object($this->getProperties())) {
            $this->transformProperties();
        }
    }

    /**
     * @return array
     */
    public function getData()
    {
        return (new DatasourceHttpTransformer($this))->getTransformed(parent::getData());
    }

    /**
     * @return mixed
     */
    public function getMutableData()
    {
        return (new DatasourceHttpTransformer($this))->getTransformed(parent::getMutableData());
    }
}