<?php

namespace ExpandOnline\KlipfolioApi;


/**
 * Class Response
 * @package ExpandOnline\KlipfolioApi
 */
class Response
{
    /**
     * @var int
     */
    protected $_statusCode;
    /**
     * @var array
     */
    protected $_data;

    /**
     * Response constructor.
     * @param $statusCode
     * @param $body
     */
    public function __construct($statusCode, $body)
    {
        $this->_statusCode = $statusCode;
        $this->_data = json_decode($body, true)["data"];
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->_statusCode;
    }

    /**
     * @return string
     */
    public function getContent()
    {

        return $this->_data;
    }


}