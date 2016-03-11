<?php


namespace Object\User;


use ExpandOnline\KlipfolioApi\Object\Klip\Klip;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipList;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;

class KlipListTest extends KlipfolioApiTestCase
{

    public function testKlipListRead()
    {

        $this->setMock([
            "klips" => [
                [
                    "id" => "test.id",
                    "name" => "test.name",

                    "description" => null

                ]
            ]
        ]);

        $klipList = new KlipList();

        $response = $this->getKlipfolio()->get($klipList);

        $klipArray = $response->getData();

        foreach ($klipArray as $klip) {
            $this->assertInstanceOf(Klip::class, $klip);
        }
    }
}