<?php


namespace ExpandOnline\KlipfolioApi\Tests\Object\Client;

use ExpandOnline\KlipfolioApi\Object\Client\ClientResource;
use ExpandOnline\KlipfolioApi\Object\Client\ClientResourceHttpTransformer;

class ClientResourceHttpTransformerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  ClientResourceHttpTransformer */
    protected $transformer;

    public function setUp()
    {
        $this->transformer = new ClientResourceHttpTransformer();
    }

    public function testIfGetTransformsToPut()
    {
        $testData = [
            'input' => [
                ClientResource::FIELD_RESOURCES => [
                    [
                        'name' => 'API Calls per Day',
                        'value' => '1'
                    ]
                ]
            ],
            'expected' => [
                ClientResource::FIELD_RESOURCES => [
                    [
                        'name' => ClientResource::API_REQUESTS_PER_DAY,
                        'value' => '1'
                    ]
                ]
            ]
        ];

        $result = $this->transformer->transformGetToPut($testData['input']);
        $this->assertSame($testData['expected'], $result);
    }

    public function testIfRemovesFalseyValues()
    {
        $testData = [
            'input' => [
                'resources' => [
                    [
                        'name' => ClientResource::API_REQUESTS_PER_DAY,
                        'value' => '0'
                    ]
                ]
            ],
            'expected' => [
                'resources' => []
            ]
        ];

        $result = $this->transformer->withoutFalseyValues($testData['input']);
        $this->assertSame($testData['expected'], $result);
    }
}