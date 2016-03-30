<?php namespace ExpandOnline\KlipfolioApi;

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
     * @var array
     */
    protected $meta;

    /**
     * Response constructor.
     * @param $statusCode
     * @param $body
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;

        $bodyObj = json_decode($body, true);


        if (array_key_exists('data', $bodyObj)) {
            $this->data = $bodyObj["data"];
        }

        if (array_key_exists('meta', $bodyObj)) {
            $this->meta = $bodyObj["meta"];

            // Klipfolio should do this automatically but you never know
            $this->statusCode = array_key_exists('status', $bodyObj["meta"]) ? $this->meta['status'] : $statusCode;
        }
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

    /**
     * @return string|null
     */
    public function getLocation()
    {
        return array_key_exists('location', $this->meta) ? $this->meta['location'] : null;
    }

    /**
     * @return string|null
     */
    public function getLocationId()
    {
        return array_key_exists('location', $this->meta) ? explode('/', $this->meta['location'])[2] : null;
    }
}