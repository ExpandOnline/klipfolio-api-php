<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

/**
 * Class DatasourceConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Datasource
 */
class DatasourceConnector extends BaseApiResourceConnector
{

    /**
     * @var string
     */
    protected $endPoint = 'datasources';

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
    public function canDelete()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canCreate()
    {
        return true;
    }

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return true;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return Datasource::class;
    }
}