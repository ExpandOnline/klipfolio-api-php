<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Connector\TabKlipInstance\TabKlipInstanceListConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;
use \ExpandOnline\KlipfolioApi\Object\TabKlipInstance\TabKlipInstance;

class TabKlipInstanceListTest extends KlipfolioApiTestCase
{
    public function testListRead()
    {
        $data = [
            'klip_instances' => [
                [
                    'id' => 'my id',
                    'klip_id' => 'my klip id',
                    'name' => 'my name',
                ],
                [
                    'id' => 'my id #2',
                    'klip_id' => 'my klip id #2',
                    'name' => 'my name #2',
                ]
            ]
        ];
        $this->setMock($data);
        $connector = new TabKlipInstanceListConnector();
        $connector->setTabId('8iy4hjsdf');

        $response = $this->getKlipfolio()->get($connector);

        $tabKlipInstances = $response->getData();
        
        /**
         * @var TabKlipInstance $tabKlipInstance
         */
        foreach ($tabKlipInstances as $index => $tabKlipInstance) {
            $this->assertInstanceOf(TabKlipInstance::class, $tabKlipInstance);
            $this->assertEquals($data['klip_instances'][$index], $tabKlipInstance->getData());
        }
    }

    public function testListReadNoData() {
        $this->setExpectedException(KlipfolioApiException::class);
        $this->setMock([]);
        $connector = new TabKlipInstanceListConnector();
        $connector->setTabId('8iy4hjsdf');
        $response = $this->getKlipfolio()->get($connector);
    }

}