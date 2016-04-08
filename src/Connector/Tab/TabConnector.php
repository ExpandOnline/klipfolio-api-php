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
    public function canRead()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canDelete()
    {
        return false;
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
        return false;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return Datasource::class;
    }
}