<?php namespace ExpandOnline\KlipfolioApi\Tests\Connector;


use ExpandOnline\KlipfolioApi\Connector\Tab\TabShareConnector;
use ExpandOnline\KlipfolioApi\Object\Tab\TabShare;

class TabShareConnectorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetEndpointWithGroup() {
        $connector = new TabShareConnector();
        $resource = new TabShare();
        $resource->setTabId(456);
        $connector->setResource($resource);
        $connector->setGroupId(123);

        $this->assertEquals('tabs/456/share-rights/123', $connector->getEndpoint());
    }

    public function getTestEndpointWithoutGroup() {
        $connector = new TabShareConnector();
        $resource = new TabShare();
        $resource->setTabId(456);
        $connector->setResource($resource);

        $this->assertEquals('tabs/456/share-rights', $connector->getEndpoint());
    }
}