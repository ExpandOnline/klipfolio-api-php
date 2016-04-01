<?php namespace ExpandOnline\KlipfolioApi\Object\User;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

/**
 * Class ResetPasswordOperation
 * @package ExpandOnline\KlipfolioApi\Object\User
 */
class ResetPasswordOperation extends BaseApiOperation
{
    /**
     * @return string
     */
    public function getOperation()
    {
        return 'reset-password';
    }

    /**
     * @return string
     */
    public function getEndpoint()
    {
        return 'users/' . $this->id;
    }
}