<?php namespace ExpandOnline\KlipfolioApi\Connector;

use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class BaseApiResourceConnector
 * @package ExpandOnline\KlipfolioApi\Connector
 */
abstract class BaseApiResourceConnector extends BaseApiConnector
{
    /**
     * @var string|null
     */
    protected $id = null;

    /**
     * @var string|null
     */
    protected $resource = null;

    /**
     * @var string|null
     */
    protected $endPoint = null;

    /**
     * BaseApiResourceConnector constructor.
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        if (array_key_exists('id', $params)) {
            $this->id = $params['id'];
        }

        if (array_key_exists('resource', $params)) {
            $this->resource = $params['resource'];
        }
    }

    /**
     * @param $id
     * @return $this
     * @throws KlipfolioApiException
     */
    public function setId($id)
    {
        if (!empty($this->id)) {
            throw new KlipfolioApiException('Resource ID already set.');
        }
        $this->id = $id;

        return $this;
    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param BaseApiResource $resource
     * @return $this
     */
    public function setResource(BaseApiResource $resource)
    {
        if (isset($resource->id)) {
            $this->id = $resource->id;
        }

        $this->resource = $resource;


        return $this;
    }

    /**
     * @return BaseApiResource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * @return mixed
     */
    public function resourceExists()
    {
        return $this->resource->exists();
    }

    /**
     * @return array
     */
    public function getDataForUpdate()
    {
        return $this->resource->getChanges();

    }

    /**
     * @return bool
     */
    public function isValidUpdate() {
        return !empty($this->getDataForUpdate());
    }

    /**
     * @return mixed
     */
    public function getDataForPost()
    {
        return $this->resource->getMutableData();
    }

    /**
     * @return null|string
     * @throws \Exception
     */
    public function getEndpoint()
    {
        if (is_null($this->endPoint)) {
            throw new KlipfolioApiException('Endpoint of ' . static::class . ' is not implemented');
        }

        return $this->formatEndpoint($this->endPoint);
    }

    /**
     * @return string
     */
    protected function formatEndpoint($endPoint)
    {
        if (!is_null($this->getId())) {
            return $endPoint . '/' . $this->getId();
        }

        return $endPoint;
    }
}