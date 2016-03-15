<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\ClientList;

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

    protected function getObjectName()
    {
        return ClientList::class;
    }
}