<?php

namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\User\User;


class UserTest extends BaseApiResourceTest
{
    protected $testData = [
        'id' => 'b303a150d6ea30cc9ead4a9c6fac7bf8',
        'company' => 'test.company',
        'first_name' => 'test.first_name',
        'last_name' => 'test.last_name',
        'email' => 'test@email.com',
        'date_last_login' => '2016-03-03T09:59:02Z',
        'data_created' => '2015-02-16T13:35:00Z',
        'is_locked_out' => 'false',
        'roles' => ['26a3d3fb4cd6bf23d35b4126be26e5f3'],
        'client_id' => 'c43b0d13e63b5116a955711b4106d284',
        'groups' => ['6e81c1944082bde3e527b9cc016c9144']
    ];

    protected function getObjectToTest($id = null)
    {
        return new User($id);
    }

    protected function getTestData()
    {
        return $this->testData;
    }

    public function testValidUpdate()
    {
        $this->setMock($this->getTestData());

        /** @var BaseApiResource $user */
        $user = $this->getKlipfolio()->get(new User('23348f02a135a64b4ebcbecd66301118'));
        $user->last_name = 'test.mutated_last_name';

        $this->setMock([]);

        print_r($this->kp->save($user));
    }

    public function testValidDelete()
    {
        // TODO: Implement testValidDelete() method.
    }
}