<?php

namespace ExpandOnline\KlipfolioApi\Test;

use \ExpandOnline\KlipfolioApi\Object\User;
use \ExpandOnline\KlipfolioApi\Client;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;


class UserTest extends \PHPUnit_Framework_TestCase
{
    private $testUser = [
        'id' => 'b303a150d6ea30ca9ead4a9c6fac7bf8',
        'company' => 'Expand Online',
        'first_name' => 'Expand',
        'last_name' => 'Online',
        'email' => 'test@expandonline.nl',
        'date_last_login' => '2016-03-03T09:59:02Z',
        'data_created' => '2015-02-16T13:35:00Z',
        'is_locked_out' => 'false'
    ];

    public function getClient($mock)
    {
        return new Client('mock_api_key', new GuzzleClient(
            [
                'handler' => HandlerStack::create($mock)
            ]
        ));

    }

    public function testIfUserCanBeRead()
    {
        $mock = new MockHandler(
            [
                new Response(200, [], $body = json_encode([
                    'meta' => [
                        'success' => true,
                        'status' => 200
                    ],
                    'data' => $this->testUser
                ]))

            ]
        );

        $user = new User($this->testUser['id'], $this->getClient($mock));
        $user = $user->read();

        $this->assertEquals(200, $user->statusCode, "Api response did not return 200 OK, returned: " . $user->statusCode . " instead");
    }
}