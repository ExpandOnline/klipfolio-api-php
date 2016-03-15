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
     * @param null $option
     * @return string
     */
    public function getEndpoint($option = null)
    {
        return 'users/' . $this->id;
    }
}