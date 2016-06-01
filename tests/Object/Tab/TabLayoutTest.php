<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Tab;

use ExpandOnline\KlipfolioApi\Connector\Client\ClientPropertyConnector;
use ExpandOnline\KlipfolioApi\Connector\Klip\KlipSchemaConnector;
use ExpandOnline\KlipfolioApi\Connector\Tab\TabLayoutConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\Client\ClientProperty;
use ExpandOnline\KlipfolioApi\Object\Tab\Enum\TabLayoutType;
use ExpandOnline\KlipfolioApi\Object\Tab\TabLayout;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipSchema;

/**
 * Class TabLayoutTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Klip
 */
class TabLayoutTest extends BaseApiResourceTest
{
    
    /**
     * @param array $params
     * @return KlipSchemaConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new TabLayoutConnector($params);
    }

    /**
     * @return TabLayout
     */
    protected function getObjectToTest($data = [])
    {
        return new TabLayout($data);
    }

    /**
     * @return array
     */
    protected function getTestData() {
        return [
            'id' => 'test.id',
            'type' => TabLayoutType::TYPE_100,
            'state' => []
        ];
    }

    public function testValidCreate() {
        $this->assertFalse($this->getConnectorToTest()->canCreate());
    }

    public function testValidUpdate() {
        $this->setMock([], [
            'status' => 200,
            'success' => true
        ]);

        $connector = $this->getConnectorToTest();
        $layout = $this->getObjectToTest(['id' => $this->getTestData()['id']]);
        $layout->setType($this->getTestData()['type']);
        $connector->setResource($layout);
        $response = $this->getKlipfolio()->save($connector);

        $this->assertEquals('tabs/test.id/layout', $connector->getEndpoint());
        $this->assertEquals(['type' => $this->getTestData()['type']], $connector->getDataForUpdate());
        $this->assertInstanceOf(Response::class, $response);
    }

    public function testValidDelete() {
        $this->assertFalse($this->getConnectorToTest()->canDelete());
    }
}