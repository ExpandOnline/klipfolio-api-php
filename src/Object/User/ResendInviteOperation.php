<?php namespace ExpandOnline\KlipfolioApi\Object\User;

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
     * @return string
     */
    public function getEndpoint()
    {
        return 'users/' . $this->id;
    }
}