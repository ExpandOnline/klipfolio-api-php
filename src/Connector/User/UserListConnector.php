<?php namespace ExpandOnline\KlipfolioApi\Connector\User;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\User\UserList;

/**
 * Class UserListConnector
 * @package ExpandOnline\KlipfolioApi\Connector\User
 */
class UserListConnector extends BaseApiCollectionConnector
{
    /**
     * @var array
     */
    protected $apiParams = [
        'include_roles' => 'true',
        'include_groups' => 'true'
    ];

    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return 'users';
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return UserList::class;
    }
}