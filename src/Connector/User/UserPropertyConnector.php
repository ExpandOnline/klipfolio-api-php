<?php namespace ExpandOnline\KlipfolioApi\Connector\User;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\User\UserProperties;

/**
 * Class UserPropertyConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Client
 *
 */
class UserPropertyConnector extends BaseApiResourceConnector
{
    /**
     * @var UserProperties
     */
    protected $resource;
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if (empty($this->getId())) {
            throw new \InvalidArgumentException('Missing required user id in user property resource.');
        }

        return 'users/' . $this->getId() . '/properties';

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
    public function canUpdate() {
        return true;
    }

    /**
     * @return bool
     */
    public function canCreate() {
        return false;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return UserProperties::class;
    }

    /**
     * @return bool
     */
    public function resourceExists()
    {
        return !empty($this->getId()) || (!empty($this->getResource() && $this->getResource()->exists()));
    }
}