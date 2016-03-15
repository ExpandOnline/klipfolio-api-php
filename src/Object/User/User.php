<?php namespace ExpandOnline\KlipfolioApi\Object\User;

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
}