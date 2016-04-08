<?php namespace ExpandOnline\KlipfolioApi\Object\User;

use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;

/**
 * Class UserList
 * @package ExpandOnline\KlipfolioApi\Object\User
 */
class UserList extends BaseApiCollection
{
    /**
     * @param array $data
     * @return $this|void
     */
    public function setData(array $data)
    {
        foreach ($data['users'] as $item) {
            $user = new User($item[User::FIELD_ID]);
            $user->setData($item);
            $this->data[] = $user;
        }
    }
}