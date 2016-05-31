<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Client;

use ExpandOnline\KlipfolioApi\Connector\Client\ClientPropertyConnector;
use ExpandOnline\KlipfolioApi\Connector\Klip\KlipSchemaConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\Client\ClientProperty;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipSchema;

/**
 * Class KlipSchemaTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Klip
 */
class ClientPropertyTest extends BaseApiResourceTest
{
    
    /**
     * @param array $params
     * @return KlipSchemaConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new ClientPropertyConnector($params);
    }

    /**
     * @return KlipSchema
     */
    protected function getObjectToTest()
    {
        return new ClientProperty();
    }

    /**
     * @return array
     */
    protected function getTestData() {
        return [
            'id' => 'test.id',
            'properties' => [
                'a' => '1',
                'b' => '2'
            ]
        ];
    }

    public function testValidCreate() {
        $this->assertFalse($this->getConnectorToTest()->canCreate());
    }

    public function testValidUpdate() {
        $this->setMock([], [
            'status' => 200,
            'success' => true
        ]);

        $connector = $this->getConnectorToTest();
        $property = new ClientProperty(['id' => 1]);
        $property->setProperties(['hello' => 'world', 'alpha' => 'omega']);

        $connector->setResource($property);
        $response = $this->getKlipfolio()->save($connector);

        $this->assertEquals('clients/1/properties', $connector->getEndpoint());
        $this->assertEquals(['properties' => ['hello' => 'world', 'alpha' => 'omega']], $connector->getDataForUpdate());
        $this->assertInstanceOf(Response::class, $response);
    }

    public function testValidDelete() {
        $this->assertFalse($this->getConnectorToTest()->canDelete());
    }


}