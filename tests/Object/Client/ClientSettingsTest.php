<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Client;

use ExpandOnline\KlipfolioApi\Connector\Client\ClientSettingsConnector;
use ExpandOnline\KlipfolioApi\Object\Client\ClientSettings;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;

/**
 * Class ClientSettingsTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Client
 */
class ClientSettingsTest extends BaseApiResourceTest
{

    /**
     * @param array $params
     * @return ClientSettingsConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new ClientSettingsConnector($params);
    }

    /**
     * @return ClientSettings
     */
    protected function getObjectToTest()
    {
        return new ClientSettings();
    }

    /**
     * @return array
     */
    protected function getTestData()
    {
        return [
            'id' => 1
        ];
    }

    public function testValidCreate()
    {

        $this->assertTrue($this->getConnectorToTest()->canCreate());
    }

    public function testValidUpdate()
    {
        $this->setMock([], [
            'status' => 200,
            'success' => true
        ]);

        $connector = $this->getConnectorToTest();
        $settings = new ClientSettings(['id' => 1]);
        $settings->setBrandEnabled(true);
        $connector->setResource($settings);
        $response = $this->getKlipfolio()->save($connector);

        $this->assertEquals([ClientSettings::BRAND_ENABLED => true], $connector->getDataForUpdate());
        $this->assertInstanceOf(Response::class, $response);
        $this->assertFalse($this->getConnectorToTest()->canUpdate());
    }

    public function testValidDelete()
    {
        $this->assertFalse($this->getConnectorToTest()->canDelete());
    }
}