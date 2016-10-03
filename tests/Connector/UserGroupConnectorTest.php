<?php namespace ExpandOnline\KlipfolioApi\Tests\Connector;


use ExpandOnline\KlipfolioApi\Connector\UserGroup\UserGroupConnector;
use ExpandOnline\KlipfolioApi\Object\UserGroup\UserGroup;

class UserGroupConnectorTest extends \PHPUnit_Framework_TestCase
{

    public function testGetEndpoint() {
        $connector = new UserGroupConnector();
        $resource = new UserGroup();
        $resource->setGroupId(123);
        $resource->setUserId(456);
        $connector->setResource($resource);

        $this->assertEquals('users/456/groups/123', $connector->getEndpoint());
    }
}