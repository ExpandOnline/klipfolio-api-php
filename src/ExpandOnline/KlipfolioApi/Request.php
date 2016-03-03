<?php

namespace ExpandOnline\KlipfolioApi;


/**
 * Class Request
 * @package ExpandOnline\KlipfolioApi
 */
class Request
{
    /**
     * @var string
     */
    protected $_path;
    /**
     * @var string
     */
    protected $_method;
    /**
     * @var array
     */
    protected $_data;

    /**
     * Request constructor.
     * @param $path
     * @param $method
     * @param array $data
     */
    public function __construct($path, $method, $data = [])
    {
        $this->_path = $path;
        $this->_method = $method;
        $this->_data = $data;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->_data;
    }


}