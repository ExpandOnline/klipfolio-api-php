<?php

namespace ExpandOnline\KlipfolioApi\Object;


/**
 * Class User
 * @package ExpandOnline\KlipfolioApi\Object
 */
class User extends AbstractCrudObject
{

    /**
     * @return string
     */
    protected function getEndpoint()
    {
        return 'users';
    }

}