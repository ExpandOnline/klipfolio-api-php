<?php namespace ExpandOnline\KlipfolioApi\Object\DatasourceInstance;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

/**
 * Class RefreshOperation
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class RefreshOperation extends BaseApiOperation
{
    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return 'datasource-instances/' . $this->id;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return 'refresh';
    }
}