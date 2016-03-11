<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

class DisableOperation extends BaseApiOperation
{

    /**
     * @param null $option
     * @return mixed
     */
    public function getEndpoint($option = null)
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