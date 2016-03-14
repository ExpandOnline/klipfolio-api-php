<?php namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Object\Klip\Klip;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipList;

class KlipTest extends BaseApiResourceTest
{
    protected $testData = [
        "id" => "test.id",
        "name" => "test.name",
        "description" => null
    ];

    public function testKlipList()
    {

        print_r($this->kp
            ->get((new KlipList())->setLimit(1)->setOffset(1))
            ->getData());
    }

    protected function getObjectToTest($id = null)
    {
        return new Klip($id);
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
}