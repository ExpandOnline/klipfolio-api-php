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
     * @var null
     */
    protected $id = null;
    /**
     * @var null
     */
    protected $resource = null;

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
}