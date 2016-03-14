<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

class ImportOperation extends BaseApiOperation
{
    public function __construct($id, $clientId)
    {
        parent::__construct($id);

        $this->data['client_id'] = $clientId;
    }

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
        return 'import';
    }
}