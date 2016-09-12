<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Datasource;

use ExpandOnline\KlipfolioApi\Connector\Datasource\DatasourcePropertiesConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourceProperties;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourcePropertiesParameters;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiObjectTest;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;

/**
 * Class DatasourcePropertiesTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Datasource
 */
class DatasourcePropertiesTest extends BaseApiObjectTest
{

    /**
     * @var array
     */
    protected $testData = [
        'my property' => 123,
        'second property' => 321,
        'parameters' => [
            ['name' => 'test', 'value' => 'oioioi', 'type' => 'header']
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
            'resource' => (new DatasourceProperties())->setProperties($this->testData)
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
            'resource' => (new DatasourceProperties())->setProperties($this->testData)
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
        $this->setMock(['properties' => $this->getTestData()]);

        /** @var DataSourceProperties $response */
        $response = $this->getKlipfolio()->get($this->getConnectorToTest()->setId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(DatasourceProperties::class, $response);

        $this->assertEquals(count($this->testData), count($response->getProperties()));
    }

    public function testIfParametersIsObjectAtConstruct()
    {
        $props = new DatasourceProperties($this->testData);
        $this->assertInstanceOf(DatasourcePropertiesParameters::class, $props->getParameters());
    }

    public function testIfAddPropertySetsParameters() {
        $props = new DatasourceProperties($this->testData);
        $props->setProperty('parameters', [
            [
                DatasourcePropertiesParameters::KEY_NAME => 'test2',
                DatasourcePropertiesParameters::KEY_VALUE => 'test_value',
                DatasourcePropertiesParameters::KEY_TYPE => DatasourcePropertiesParameters::TYPE_HEADER
            ]
        ]);

        $this->assertSame('test_value', $props->getParameters()->getHeader('test2'));
        $this->assertSame('oioioi', $props->getParameters()->getHeader('test'));
    }

}