<?php namespace ExpandOnline\KlipfolioApi\Connector\Klip;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipList;

/**
 * Class KlipListConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Klip
 */
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

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return KlipList::class;
    }
}