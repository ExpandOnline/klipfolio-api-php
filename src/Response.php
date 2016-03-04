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
    protected $statusCode;
    /**
     * @var array
     */
    protected $data;

    /**
     * Response constructor.
     * @param $statusCode
     * @param $body
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;
        $this->data = json_decode($body, true)["data"];
    }

    /**
     * @return string
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getContent()
    {

        return $this->data;
    }


}