<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Object\Client\Client;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;

class ClientConnector extends BaseApiResourceConnector
{
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'clients/' . $this->getId();
        }

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
        return Client::class;
    }
}