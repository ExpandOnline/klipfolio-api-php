<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Object\Client\ClientProperty;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;

/**
 * Class ClientConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Client
 *
 */
class ClientPropertyConnector extends BaseApiResourceConnector
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

        return 'clients/' . $this->getId() . '/properties';

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
        return ClientProperty::class;
    }
}