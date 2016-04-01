<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

/**
 * Class EnableOperation
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class EnableOperation extends BaseApiOperation
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
        return 'enable';
    }
}