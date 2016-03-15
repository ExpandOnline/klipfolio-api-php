<?php namespace ExpandOnline\KlipfolioApi\Connector\Klip;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipList;

class KlipListConnector extends BaseApiCollectionConnector
{

    /**
     * @param null $option
     * @return string
     */
    public function getEndpoint($option = null)
    {
        return 'klips';
    }

    /**
     * @return bool
     */
    public function canRead(){
        return true;
    }

    protected function getObjectName()
    {
        return KlipList::class;
    }
}