<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

/**
 * Class DisableOperation
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class DisableOperation extends BaseApiOperation
{
    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return 'datasources';
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return 'disable';
    }
}