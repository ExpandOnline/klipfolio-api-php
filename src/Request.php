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
    protected $path;
    /**
     * @var string
     */
    protected $method;
    /**
     * @var array
     */
    protected $data;

    /**
     * Request constructor.
     * @param $path
     * @param $method
     * @param array $data
     */
    public function __construct($path, $method, $data = [])
    {
        $this->path = $path;
        $this->method = $method;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }


}