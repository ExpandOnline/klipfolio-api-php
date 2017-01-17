<?php

namespace ExpandOnline\KlipfolioApi\Tests\Connector;

use ExpandOnline\KlipfolioApi\Connector\Client\ClientSettingsConnector;
use ExpandOnline\KlipfolioApi\Object\Client\ClientSettings;

/**
 * Class ClientSettingsConnectorTest
 * @package ExpandOnline\KlipfolioApi\Tests\Connector
 */
class ClientSettingsConnectorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetEndpoint()
    {
        $connector = new ClientSettingsConnector();
        $resource = new ClientSettings(['id' => 'test']);
        $connector->setResource($resource);

        $this->assertEquals('clients/test/settings', $connector->getEndpoint());
    }

    public function testExceptionWhenNoId()
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        $connector = new ClientSettingsConnector();
        $resource = new ClientSettings();
        $connector->setResource($resource);
        $connector->getEndpoint();
    }


    public function testIfCanCreate()
    {
        $connector = new ClientSettingsConnector();
        $this->assertTrue($connector->canCreate());
    }

    public function testIfCanUpdate()
    {
        $connector = new ClientSettingsConnector();
        $this->assertFalse($connector->canUpdate());
    }

    public function testIfUpdateTransformsToPost()
    {

        $connector = new ClientSettingsConnector();
        $settings = new ClientSettings(['id' => 'test']);
        $settings->setBrandEnabled(true);
        $connector->setResource($settings);

        $this->assertSame([ClientSettings::BRAND_ENABLED => true], $connector->getDataForPost());
    }
}