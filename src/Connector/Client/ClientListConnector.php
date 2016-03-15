<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\ClientList;

/**
 * Class ClientListConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Client
 */
class ClientListConnector extends BaseApiCollectionConnector
{
    /**
     * @param null $option
     * @return string
     */
    public function getEndpoint($option = null)
    {
        return 'clients';
    }

    /**
     * @return bool
     */
    public function canRead()
    {
        return true;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return ClientList::class;
    }
}