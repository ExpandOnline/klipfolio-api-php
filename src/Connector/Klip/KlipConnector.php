<?php namespace ExpandOnline\KlipfolioApi\Connector\Klip;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\Klip;

/**
 * Class KlipConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Klip
 */
class KlipConnector extends BaseApiResourceConnector
{

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'klips/' . $this->getId();
        }

        return 'klips';
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
        return Klip::class;
    }
}