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
    protected $readOnlyFieldNames = ['id'];

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