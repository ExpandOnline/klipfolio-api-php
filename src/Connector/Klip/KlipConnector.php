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
     * @var array
     */
    protected $apiParams = [
        'full' => 'true'
    ];

    /**
     * @var string
     */
    protected $endPoint = 'klips';

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