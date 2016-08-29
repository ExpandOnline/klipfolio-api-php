<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Object\Client\ClientProperty;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Client\ClientResource;

/**
 * Class ClientResourceConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Client
 *
 */
class ClientResourceConnector extends BaseApiResourceConnector
{
    /**
     * @var ClientProperty
     */
    protected $resource;
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if (empty($this->getId())) {
            throw new \InvalidArgumentException('Missing required client id in client property resource.');
        }

        return 'clients/' . $this->getId() . '/resources';

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
        return ClientResource::class;
    }

    /**
     * @return mixed
     */
    public function resourceExists()
    {
        return !empty($this->getId());
    }
}