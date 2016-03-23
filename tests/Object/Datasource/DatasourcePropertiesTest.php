<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Datasource;

use ExpandOnline\KlipfolioApi\Connector\Datasource\DatasourcePropertiesConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourceProperties;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;

/**
 * Class DatasourcePropertiesTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Datasource
 */
class DatasourcePropertiesTest extends BaseApiResourceTest
{

    /**
     * @var array
     */
    protected $testData = [
        'id' => 1,
        'properties' => [
            'my property' => 123,
            'second property' => 321
        ]
    ];

    /**
     * @param array $params
     * @return DatasourcePropertiesConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new DatasourcePropertiesConnector($params);
    }

    /**
     * @return DatasourceProperties
     */
    protected function getObjectToTest()
    {
        return new DatasourceProperties();
    }

    /**
     * @return array
     */
    protected function getTestData()
    {
        return $this->testData;
    }

    /**
     *
     */
    public function testValidUpdate()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => (new DatasourceProperties([
                'id' => 1
            ]))->setProperties($this->testData['properties'])
        ])->setId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     *
     */
    public function testValidCreate() {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => (new DatasourceProperties())->setProperties($this->testData['properties'])
        ])->setId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @throws KlipfolioApiException
     */
    public function testValidDelete()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->delete($this->getConnectorToTest()->setId('23348f02a135a64b4ebcbecd66301118')
            ->setParam('field', 'value'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @throws KlipfolioApiException
     */
    public function testValidGet()
    {
        $this->setMock($this->getTestData());

        $response = $this->getKlipfolio()->get($this->getConnectorToTest()->setId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(DatasourceProperties::class, $response);
        $this->assertEquals(count($this->testData['properties']), count($response->getProperties()));
    }

}