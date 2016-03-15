<?php namespace ExpandOnline\KlipfolioApi\Connector\User;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\User\UserList;

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
     * @param null $option
     * @return mixed
     */
    public function getEndpoint($option = null)
    {
        return 'users';
    }

    protected function getObjectName()
    {
        return UserList::class;
    }
}