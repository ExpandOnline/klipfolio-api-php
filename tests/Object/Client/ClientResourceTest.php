<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Client;

use ExpandOnline\KlipfolioApi\Connector\Client\ClientPropertyConnector;
use ExpandOnline\KlipfolioApi\Connector\Client\ClientResourceConnector;
use ExpandOnline\KlipfolioApi\Connector\Klip\KlipSchemaConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\Client\ClientProperty;
use ExpandOnline\KlipfolioApi\Object\Client\ClientResource;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipSchema;

/**
 * Class KlipSchemaTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Klip
 */
class ClientResourceTest extends BaseApiResourceTest
{

    /**
     * @param array $params
     * @return ClientResourceConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new ClientResourceConnector($params);
    }

    /**
     * @param array $data
     * @return ClientResource
     */
    protected function getObjectToTest()
    {
        return new ClientResource();
    }

    /**
     * @return array
     */
    protected function getTestData()
    {
        return [
            'id' => 'test.id',
            'properties' => [
                'a' => '1',
                'b' => '2'
            ]
        ];
    }

    public function testValidCreate()
    {
        $this->assertFalse($this->getConnectorToTest()->canCreate());
    }

    public function testValidUpdate()
    {
        $this->setMock([], [
            'status' => 200,
            'success' => true
        ]);

        $connector = $this->getConnectorToTest();
        $resource = new ClientResource(['id' => 1]);
        $resource->setTotalDashboards(2);
        $connector->setResource($resource);
        $response = $this->getKlipfolio()->save($connector);

        $this->assertEquals('clients/1/resources', $connector->getEndpoint());
        $this->assertEquals(['resources' => [
            ['name' => 'dashboard.tabs.total', 'value' => '2']
        ]], $connector->getDataForUpdate());
        $this->assertInstanceOf(Response::class, $response);
    }

    public function testValidDelete()
    {
        $this->assertFalse($this->getConnectorToTest()->canDelete());
    }

    public function testResourceMap()
    {
        $resource = new ClientResource([
            'resources' => [
                [
                    'name' => 'Dashboards',
                    'value' => -1
                ]
            ]
        ]);

        $this->assertSame(-1, $resource->getTotalDashboards());
    }
}