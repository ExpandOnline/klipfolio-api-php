<?php namespace Object\User;

use ExpandOnline\KlipfolioApi\Connector\User\UserListConnector;
use ExpandOnline\KlipfolioApi\Object\User\UserList;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;

class UserListTest extends KlipfolioApiTestCase
{
    public function testUserListRead()
    {

        $this->setMock([
            'users' => [
                [
                    'id' => 'test.id',
                    'first_name' => 'test.first_name',
                    'last_name' => 'test.last_name',
                    'email' => 'test@email.com',
                    'roles' => ['test.role_id'],
                    'groups' => ['test.group_id']
                ]
            ]
        ]);

        $connector = new UserListConnector();
        $connector->setClientId('c43b0d13e63b5116a955711b4106d284');

        $response = $this->getKlipfolio()->get($connector);

        $userArray = $response->getData();

        foreach ($userArray as $user) {
            $this->assertInstanceOf('\ExpandOnline\KlipfolioApi\Object\User\User', $user);
        }
    }
}