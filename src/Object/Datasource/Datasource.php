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
 * @property array $properties
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

        if (!empty($this->data[static::FIELD_PROPERTIES])) {
            $this->data[static::FIELD_PROPERTIES] = new DatasourceProperties($this->data[static::FIELD_PROPERTIES]);
        }
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
    public function setProperties($properties)
    {
        if ($this->exists()) {
            throw new KlipfolioApiException("Unable to set properties on resource that already exists");
        }
        $properties instanceof DatasourceProperties ?
            $this->properties = $properties
            : $this->properties = new DatasourceProperties($properties);

        return $this;
    }

    /**
     * @param $properties
     * @return Datasource
     * @throws KlipfolioApiException
     */
    public
    function addProperties($properties)
    {
        return $this->setProperties(array_merge($this->getProperties(), $properties));
    }

    /**
     * @return mixed
     */
    public
    function getClientId()
    {
        return $this->client_id;
    }

    /**
     * @param mixed $clientId
     * @return $this
     * @throws KlipfolioApiException
     */
    public
    function setClientId($clientId)
    {
        if ($this->exists()) {
            throw new KlipfolioApiException("Unable to set client_id on resource that already exists");
        }
        $this->client_id = $clientId;
        return $this;
    }


    /**
     * @return array
     */
    public
    function getData()
    {
        $data = parent::getData();

        if (array_key_exists(static::FIELD_PROPERTIES, $data) &&
            array_key_exists('parameters', $data[static::FIELD_PROPERTIES]) &&
            is_array($data[static::FIELD_PROPERTIES]['parameters'])
        ) {
            $data[static::FIELD_PROPERTIES]['parameters'] = json_encode($data[static::FIELD_PROPERTIES]['parameters']);
        }

        return $data;
    }

}