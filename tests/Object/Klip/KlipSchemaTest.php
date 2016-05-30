<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Klip;

use ExpandOnline\KlipfolioApi\Connector\Klip\KlipSchemaConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipSchema;

/**
 * Class KlipSchemaTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Klip
 */
class KlipSchemaTest extends BaseApiResourceTest
{

    /**
     * @var array
     */
    protected $testData = [
        'id' => 'our id',
        'title' => 'Test title',
        'workspace' => [
            'datasources' => [
                '1234'
            ]
        ],
        'components' => []
    ];

    /**
     * @param array $params
     * @return KlipSchemaConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new KlipSchemaConnector($params);
    }

    /**
     * @return KlipSchema
     */
    protected function getObjectToTest()
    {
        return new KlipSchema();
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
            'resource' => (new KlipSchema([
                'id' => 1
            ]))->setComponents([])->setWorkspace([])->setTitle('My title')
        ])->setId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     *
     */
    public function testValidCreate() {
        $this->setMock([]);

        $this->setExpectedException(KlipfolioApiException::class);
        $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => (new KlipSchema())->setComponents([])->setWorkspace([])->setTitle('My title')
        ])->setId('23348f02a135a64b4ebcbecd66301118'));
    }

    /**
     * @throws KlipfolioApiException
     */
    public function testValidDelete()
    {
        $this->setMock([]);

        $this->setExpectedException(KlipfolioApiException::class);
        $this->getKlipfolio()->delete($this->getConnectorToTest([])->setId('23348f02a135a64b4ebcbecd66301118'));
    }

    /**
     * @throws KlipfolioApiException
     */
    public function testValidGet()
    {
        $this->setMock($this->getTestData());

        /** @var KlipSchema $response */
        $response = $this->getKlipfolio()->get($this->getConnectorToTest([])->setId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(KlipSchema::class, $response);
        $this->assertEquals($this->testData['components'], $response->getComponents());
        $this->assertEquals($this->testData['workspace'], $response->getWorkspace());
        $this->assertEquals($this->testData['title'], $response->getTitle());
    }


    /**
     *
     */
    public function testAddGetDatasource()
    {
        $klipSchema = new KlipSchema();
        $klipSchema->addDatasource('test.datasourceId');

        $this->assertContains('test.datasourceId', $klipSchema->getDatasources());
    }

    /**
     *
     */
    public function testSetGetDatasources()
    {
        $klipSchema = new KlipSchema();

        $testArr = ['test.datasourceId1', 'test.datasourceId2'];

        $klipSchema->setDatasources($testArr);

        $this->assertSame($testArr, $klipSchema->getDatasources());
    }

    /**
     *
     */
    public function testRemoveDatasource()
    {
        $klipSchema = new KlipSchema();
        $testArr = ['test.datasourceId1', 'test.datasourceId2'];
        $klipSchema->setDatasources($testArr);

        $klipSchema->removeDatasource($testArr[1]);
        unset($testArr[1]);

        $this->assertSame($testArr, $klipSchema->getDatasources());
    }
    
    public function testReplaceDatasource() {
        $klipSchema = new KlipSchema();
        $klipSchema->addDatasource(1);
        $klipSchema->replaceDatasource(1, 2);
        $this->assertEquals(2, $klipSchema->getDatasources()[0]);
    }

    public function testReplaceDatasources() {
        $klipSchema = new KlipSchema();
        $klipSchema->addDatasource(1);
        $klipSchema->addDatasource(2);
        $klipSchema->addDatasource(3);
        $klipSchema->replaceDatasources([1 => 10, 2 => 20, 3 => 30]);
        $this->assertEquals(10, $klipSchema->getDatasources()[0]);
        $this->assertEquals(20, $klipSchema->getDatasources()[1]);
        $this->assertEquals(30, $klipSchema->getDatasources()[2]);
    }
}