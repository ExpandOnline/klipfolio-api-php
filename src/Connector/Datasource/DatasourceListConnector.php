<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\DatasourceList;

/**
 * Class DatasourceListConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Datasource
 */
class DatasourceListConnector extends BaseApiCollectionConnector
{
    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return 'datasources';
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return DatasourceList::class;
    }
}