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

        $this->mapResponse(json_decode($body, true));
    }

    /**
     * @param $array
     */
    protected function mapResponse($array)
    {
        if (array_key_exists('data', $array)) {
            $this->data = $array["data"];
        }

        if (array_key_exists('meta', $array)) {
            $this->meta = $array["meta"];

            // Klipfolio should do this automatically but you never know
            $this->statusCode = array_key_exists('status', $array["meta"]) ? $this->meta['status'] : $this->statusCode;
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