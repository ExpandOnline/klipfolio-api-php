<?php
namespace ExpandOnline\KlipfolioApi;

use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Client
 * @package ExpandOnline\KlipfolioApi
 */
class Client
{

    /**
     * @var string
     */
    protected $_apiKey;

    /**
     * @var string
     */
    protected $_base_url = "https://app.klipfolio.com/api";

    /**
     * @var int
     */
    protected $_version = 1;

    /**
     * @var GuzzleClient
     */
    protected $_client;


    /**
     * Client constructor.
     * @param $apiKey
     * @param GuzzleClient $guzzleClient
     */
    public function __construct($apiKey, GuzzleClient $guzzleClient)
    {
        $this->_apiKey = $apiKey;
        $this->_client = $guzzleClient;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function sendRequest(Request $request)
    {
        $url = $this->getUrl() . $request->getPath();

        try {
            $guzzleRequest = new GuzzleRequest(
                $request->getMethod(),
                $url,
                $headers = [
                    'kf-api-key' => $this->_apiKey
                ],
                $request->getData()
            );

            $guzzleResponse = $this->_client->send($guzzleRequest);

            $response = new Response(
                $guzzleResponse->getStatusCode(),
                (string)$guzzleResponse->getBody()
            );

        } catch (RequestException $e) {

            $response = Response(
                500,
                $body = json_encode([
                    'meta' => [
                        'success' => false,
                        'status' => 500
                    ],
                    'data' => ['error' => 'Invalid request']
                ])
            );


        }

        return $response;

    }

    /**
     * @return string
     */
    private function getUrl()
    {
        return $this->_base_url . '/' . $this->_version . '/';
    }

}