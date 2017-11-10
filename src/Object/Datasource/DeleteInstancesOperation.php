<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

/**
 * Class DeleteInstancesOperationeOperation
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class DeleteInstancesOperation extends BaseApiOperation
{
    /**
     * @return mixed
     */
    public function getEndpoint()
    {
        return 'datasources/' . $this->id;
    }

    /**
     * @return mixed
     */
    public function getOperation()
    {
        return 'delete_instances';
    }
}