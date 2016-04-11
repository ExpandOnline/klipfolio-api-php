<?php namespace ExpandOnline\KlipfolioApi\Connector\Tab;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Tab\Tab;

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
     * @return bool
     */
    public function canRead()
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
     * @return bool
     */
    public function canDelete()
    {
        return true;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return Tab::class;
    }
}