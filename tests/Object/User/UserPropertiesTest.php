<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\User;

use ExpandOnline\KlipfolioApi\Connector\User\UserConnector;
use ExpandOnline\KlipfolioApi\Connector\User\UserPropertyConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\User\UserProperties;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\User\User;

class UserTest extends BaseApiResourceTest
{
    protected $testData = [
        'id' => 'test.id'
    ];

    protected function getConnectorToTest($params = [])
    {
        return new UserPropertyConnector($params);
    }

    protected function getObjectToTest()
    {
        return new UserProperties();
    }

    protected function getTestData()
    {
        return $this->testData;
    }

    public function testIfPropertyWillSetChanged()
    {
        $this->setMock($this->getTestData());

        /** @var UserProperties $user */
        $user = $this->getKlipfolio()->get($this->getConnectorToTest()->setId('test.id'));
        $user->addProperty('foo', 'bar');

        $this->assertNotEmpty($user->getChanges());
    }

    public function testValidDelete()
    {
        $this->assertFalse($this->getConnectorToTest()->canDelete());
    }

    public function testValidUpdate()
    {
        $this->assertTrue($this->getConnectorToTest()->canUpdate());
    }
}