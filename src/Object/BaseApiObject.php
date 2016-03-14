<?php namespace ExpandOnline\KlipfolioApi\Object;

use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;

/**
 * Class BaseApiObject
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class BaseApiObject extends BaseObject
{
    /**
     * @var array
     */
    protected $apiParams = [];

    /**
     * @var array
     */
    protected $readOnlyFieldNames = ['id'];

    /**
     * @param null $option
     * @return mixed
     */
    abstract public function getEndpoint($option = null);

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->apiParams;
    }

    /**
     * @return bool
     */
    public function canRead()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canDelete()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canCreate()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return false;
    }

    /**
     * @param $id
     */
    public function setClientId($id)
    {
        $this->apiParams['client_id'] = $id;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    public function __set($name, $value)
    {
        if (in_array($name, $this->getReadOnlyFieldNames())) {
            throw new KlipfolioApiException("Can't set protected field " . $name . " on " . get_class($this));
        }
        parent::__set($name, $value);
    }

    /**
     * @return array
     */
    public function getReadOnlyFieldNames()
    {
        return $this->readOnlyFieldNames;
    }
}