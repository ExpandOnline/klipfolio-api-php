<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\User;

use ExpandOnline\KlipfolioApi\Connector\User\UserConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\User\User;

class UserTest extends BaseApiResourceTest
{
    protected $testData = [
        'id' => 'test.id',
        'company' => 'test.company',
        'first_name' => 'test.first_name',
        'last_name' => 'test.last_name',
        'email' => 'test@email.com',
        'date_last_login' => '2016-03-03T09:59:02Z',
        'data_created' => '2015-02-16T13:35:00Z',
        'is_locked_out' => 'false',
        'roles' => ['test.role_id'],
        'client_id' => 'test.client_id',
        'groups' => ['test.group_id']
    ];

    protected function getConnectorToTest($params = [])
    {
        return new UserConnector($params);
    }

    protected function getObjectToTest()
    {
        return new User();
    }

    protected function getTestData()
    {
        return $this->testData;
    }

    public function testValidUpdate()
    {
        $this->setMock($this->getTestData());

        /** @var BaseApiResource $user */
        $user = $this->getKlipfolio()->get((new UserConnector())->setId('23348f02a135a64b4ebcbecd66301118'));
        $user->last_name = 'test.mutated_last_names';

        $this->setMock([]);
    }

    public function testValidDelete()
    {
        // TODO: Implement testValidDelete() method.
    }
}