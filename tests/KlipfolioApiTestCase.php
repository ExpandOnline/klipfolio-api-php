<?php namespace ExpandOnline\KlipfolioApi\Tests;

use ExpandOnline\KlipfolioApi\Client;
use ExpandOnline\KlipfolioApi\Klipfolio;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class KlipfolioApiTestCase extends \PHPUnit_Framework_TestCase
{
    /** @var  Klipfolio */
    protected $kp;

    protected function setMock($data, $meta = [])
    {

        $meta = array_merge(['success' => true, 'status' => 200], $meta);

        $this->kp = new Klipfolio(
            $client = new Client(
                'mock_api_url',
                'mock_api_key',
                new GuzzleClient(
                    ['handler' =>
                        HandlerStack::create(
                            new MockHandler([
                                new Response($meta['status'], [],
                                    json_encode(
                                        [
                                            'meta' => $meta,
                                            'data' => $data
                                        ]
                                    )
                                )
                            ])
                        )
                    ]
                )
            )
        );
    }

    public function getKlipfolio()
    {
        return $this->kp;
    }


}