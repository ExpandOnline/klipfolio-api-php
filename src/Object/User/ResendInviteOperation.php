<?php


namespace ExpandOnline\KlipfolioApi\Object\User;


use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

/**
 * Class ResendInviteOperation
 * @package ExpandOnline\KlipfolioApi\Object\User
 */
class ResendInviteOperation extends BaseApiOperation
{
    /**
     * @return string
     */
    public function getOperation()
    {
        return 'resend-invite';
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