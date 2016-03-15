<?php namespace ExpandOnline\KlipfolioApi\Connector;

use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

abstract class BaseApiResourceConnector extends BaseApiConnector
{
    protected $id = null;
    protected $resource = null;

    public function __construct(array $params = [])
    {
        if (array_key_exists('id', $params)) {
            $this->id = $params['id'];
        }

        if (array_key_exists('resource', $params)) {
            $this->resource = $params['resource'];
        }
    }

    public function setId($id)
    {
        if (!empty($this->id)) {
            throw new KlipfolioApiException('Resource ID already set.');
        }
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

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