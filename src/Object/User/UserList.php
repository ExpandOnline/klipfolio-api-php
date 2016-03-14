<?php namespace ExpandOnline\KlipfolioApi\Object\User;

use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;

/**
 * Class UserList
 * @package ExpandOnline\KlipfolioApi\Object\User
 */
class UserList extends BaseApiCollection
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
     * @return string
     */
    public function getEndpoint($option = null)
    {
        return 'users';
    }

    /**
     * @param array $data
     * @return $this|void
     */
    public function setData($data)
    {
        foreach ($data['users'] as $item) {
            $user = new User($item[User::FIELD_ID]);
            $user->setData($item);
            $this->data[] = $user;
        }
    }

    /**
     * @return bool
     */
    public function canRead(){
        return true;
    }
}