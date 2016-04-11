<?php namespace ExpandOnline\KlipfolioApi\Connector\Tab;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

/**
 * Class Tab
 * @package ExpandOnline\KlipfolioApi\Connector\Tab
 */
class TabConnector extends BaseApiResourceConnector
{

    /**
     * @var string
     */
    protected $endPoint = 'tabs';

    /**
     * @return bool
     */
    public function canCreate()
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