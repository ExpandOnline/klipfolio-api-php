<?php namespace ExpandOnline\KlipfolioApi\Connector\Tab;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Tab\TabLayout;

/**
 * Class TabLayoutConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Client
 *
 */
class TabLayoutConnector extends BaseApiResourceConnector
{
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if (empty($this->getId())) {
            throw new \InvalidArgumentException('Missing required tab id in tab layout resource.');
        }

        return 'tabs/' . $this->getId() . '/layout';

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
    public function canCreate()
    {
        return false;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return TabLayout::class;
    }
}