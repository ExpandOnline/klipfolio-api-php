<?php namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Connector\Tab\TabConnector;
use ExpandOnline\KlipfolioApi\Object\Tab\Tab;
use ExpandOnline\KlipfolioApi\Response;

class TabTest extends BaseApiResourceTest
{
    protected $testData = [
        "id" => "2",
        "name" => "TabTwo",
        "description" => "This is the second tab"
    ];

    protected function getObjectToTest($id = null)
    {
        return new Tab();
    }

    protected function getTestData()
    {
        return $this->testData;
    }

    public function testValidCreate()
    {
        $testData = $this->testData;
        unset($testData['id']);
        $metaData = [
            'status' => 201,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => (new Tab($testData))
        ]));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(201, $response->getStatusCode());
    }

    protected function getConnectorToTest($params = [])
    {
        return new TabConnector($params);
    }

    public function testValidUpdate() {
        // TODO: Implement testValidUpdate() method.
    }

    public function testValidDelete() {
        // TODO: Implement testValidDelete() method.
    }
}