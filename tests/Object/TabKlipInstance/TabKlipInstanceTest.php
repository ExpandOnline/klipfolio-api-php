<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Connector\TabKlipInstance\TabKlipInstanceConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\TabKlipInstance\TabKlipInstance;

class TabKlipInstanceTest extends BaseApiResourceTest
{
    protected $testData = [
        'id' => 'our id',
        'klip_id' => 'my id',
        'name' => 'My name'
    ];

    /**
     * @param array $params
     * @return TabKlipInstanceConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new TabKlipInstanceConnector($params);
    }

    protected function getObjectToTest()
    {
        return new TabKlipInstance();
    }

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
            'resource' => (new TabKlipInstance())->setKlipId(1)->setName('My name!')
        ])->setTabId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testValidCreate() {
        $this->setMock([]);

        $this->setExpectedException(KlipfolioApiException::class);
        $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => (new TabKlipInstance())->setName('My name!')
        ])->setTabId('23348f02a135a64b4ebcbecd66301118'));
    }

    public function testValidDelete()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock([], $metaData);

        $response = $this->getKlipfolio()->delete($this->getConnectorToTest([
            'id' => 1
        ])->setTabId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testValidGet()
    {
        $this->setMock([]);

        $this->setExpectedException(KlipfolioApiException::class);
        $this->getKlipfolio()->get($this->getConnectorToTest([
            'id' => 1
        ])->setTabId('23348f02a135a64b4ebcbecd66301118'));
    }

}