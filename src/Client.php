<?php namespace ExpandOnline\KlipfolioApi;

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
    protected $apiKey;

    /**
     * @var string
     */
    protected $baseUrl;

    /**
     * @var int
     */
    protected $version = 1;

    /**
     * @var GuzzleClient
     */
    protected $client;

    protected $headers = [
        'Content-Type' => 'application/json'
    ];


    /**
     * Client constructor.
     * @param $baseUrl
     * @param string $apiKey
     * @param GuzzleClient $guzzleClient
     */
    public function __construct($baseUrl, $apiKey, GuzzleClient $guzzleClient)
    {
        $this->baseUrl = $baseUrl;

        $this->headers = array_merge($this->headers, [
            'kf-api-key' => $apiKey
        ]);

        $this->client = $guzzleClient;
    }

    /**
     * @param string $method
     * @param string $path
     * @param array $options
     * @return Response
     */
    public function sendRequest($method, $path, array $options = [])
    {
        $url = $this->getUrl() . $path;

        $options['body'] = array_key_exists('body', $options) ? \GuzzleHttp\Psr7\stream_for(json_encode($options['body'], JSON_UNESCAPED_SLASHES)) : null;
        $options['headers'] = $this->headers;

        $guzzleResponse = $this->client->request($method, $url, $options);

        return new Response(
            $guzzleResponse->getStatusCode(),
            (string)$guzzleResponse->getBody()
        );
    }

    /**
     * @return string
     */
    private function getUrl()
    {
        return $this->baseUrl . '/' . $this->version . '/';
    }
}