<?php


namespace ExpandOnline\KlipfolioApi\Tests\Object\Datasource;

use ExpandOnline\KlipfolioApi\Connector\Datasource\DatasourceConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourceProperties;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;

/**
 * Class DatasourceTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Datasource
 */
class DatasourceTest extends BaseApiResourceTest
{

    /**
     * @var array
     */
    protected $testData = [
        'id' => 1,
        'name' => 'test.datasource',
        'format' => 'csv',
        'connector' => 'db',
        'refresh_interval' => 0,
        'client_id' => 'test.client_id',
        'properties' => [
            'my property' => 123,
            'second property' => 321
        ]
    ];

    /**
     * @param array $params
     * @return BaseApiObject
     */
    protected function getObjectToTest($params = [])
    {
        return new Datasource($params);
    }

    /**
     * @param array $data
     * @return DatasourceConnector
     */
    protected function getConnectorToTest($data = [])
    {
        return new DatasourceConnector($data);
    }

    /**
     * @return array
     */
    protected function getTestData()
    {
        return $this->testData;
    }

    public function testValidUpdate()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => (new Datasource([
                'id' => 1
            ]))->setName($this->getTestData()['name'])
        ])->setId('test.id'));

        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testValidDelete()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->delete($this->getConnectorToTest()->setId('test.id'));
        $this->assertEquals(200, $response->getStatusCode());
    }


    public function testIfDatasourcePropertiesIsObjectAtConstruct()
    {
        $datasource = new Datasource($this->testData);

        $this->assertInstanceOf(DatasourceProperties::class, $datasource->getProperties());
    }
}