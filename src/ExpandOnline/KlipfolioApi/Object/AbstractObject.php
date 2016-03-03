<?php

namespace ExpandOnline\KlipfolioApi\Object;


/**
 * Class AbstractObject
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class AbstractObject
{
    /**
     * @var array
     */
    protected $_data = array();

    /**
     * @var mixed[] set of key value pairs representing data
     */
    public function __construct()
    {
        $this->_data = [];
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __get($name)
    {

        if (array_key_exists($name, $this->_data)) {
            return $this->_data[$name];
        } else {
            throw new \InvalidArgumentException(
                $name . ' is not a field of ' . get_class($this));
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->_data[$name] = $value;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function __isset($name)
    {
        return array_key_exists($name, $this->_data);
    }

    /**
     * @param array
     * @return $this
     */
    public function setData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->_data;
    }
}