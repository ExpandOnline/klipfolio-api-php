<?php namespace Object\User;

use ExpandOnline\KlipfolioApi\Object\User\UserList;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;

class UserListTest extends KlipfolioApiTestCase
{
    public function testUserListRead()
    {

        $this->setMock([
            'users' => [
                [
                    'id' => 'db55bc08f2be1bf753353fb8a0ae66bc',
                    'first_name' => 'test.first_name',
                    'last_name' => 'test.last_name',
                    'email' => 'test@email.com',
                    'roles' => ['26a3d3fb4cd6bf23d35b4126be26e5f3'],
                    'groups' => ['6e81c1944082bde3e527b9cc016c9144']
                ]
            ]
        ]);

        $userList = new UserList();
        $userList->setClientId('c43b0d13e63b5116a955711b4106d284');

        $response = $this->getKlipfolio()->get($userList);

        $userArray = $response->getData();

        foreach ($userArray as $user) {
            $this->assertInstanceOf('\ExpandOnline\KlipfolioApi\Object\User\User', $user);
        }
    }
}