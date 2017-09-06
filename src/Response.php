<?php namespace ExpandOnline\KlipfolioApi;

use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use Symfony\Component\Config\Definition\Exception\Exception;

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
     * @throws KlipfolioApiException
     */
    public function __construct($statusCode, $body)
    {
        $this->statusCode = $statusCode;

        $responseArr = json_decode($body, true);
        if (empty($responseArr)) {
            throw new KlipfolioApiException('Invalid response received from Klipfolio: ' . $body);
        };

        $this->mapResponse($responseArr);
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

    /**
     * @return bool
     */
    public function hasError()
    {
        return array_key_exists('error_code', $this->meta) || array_key_exists('error_desc', $this->meta);
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->meta['error_desc'];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode(['data' => $this->data, 'meta' => $this->meta]);
    }
}