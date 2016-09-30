<?php namespace ExpandOnline\KlipfolioApi\Connector\Group;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Group\Group;

/**
 * Class GroupConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Group
 */
class GroupConnector extends BaseApiResourceConnector
{
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'groups/' . $this->getId();
        }

        return 'groups';
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
    public function canDelete()
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
        return Group::class;
    }
}