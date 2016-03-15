<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\DatasourceList;

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

    protected function getObjectName()
    {
        return DatasourceList::class;
    }
}