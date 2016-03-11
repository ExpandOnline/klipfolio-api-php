<?php


namespace ExpandOnline\KlipfolioApi\Object\User;


use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class User
 * @package ExpandOnline\KlipfolioApi\Object\User
 */
class User extends BaseApiResource
{

    protected $readOnlyFieldNames = [
        'id', 'date_last_login', 'date_created'
    ];

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'users/' . $this->getId();
        }

        return 'users';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->data['id'];
    }


    /**
     * @return bool
     */
    public function canRead()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canCreate()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return true;
    }

}