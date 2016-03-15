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
     * @param null $option
     * @return mixed
     */
    public function getEndpoint($option = null)
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