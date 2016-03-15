<?php namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Connector\Klip\KlipConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\Klip;

class KlipTest extends BaseApiResourceTest
{
    protected $testData = [
        "id" => "test.id",
        "name" => "test.name",
        "description" => null
    ];

    protected function getObjectToTest($id = null)
    {
        return new Klip();
    }

    protected function getTestData()
    {
        return $this->testData;
    }

    public function testValidUpdate()
    {
        // TODO: Implement testValidUpdate() method.
    }

    public function testValidDelete()
    {
        // TODO: Implement testValidDelete() method.
    }

    protected function getConnectorToTest($params = [])
    {
        return new KlipConnector($params);
    }
}