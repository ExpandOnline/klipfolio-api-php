<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

class DatasourceConnector extends BaseApiResourceConnector
{
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'datasources/' . $this->getId();
        }

        return 'datasources';
    }

    /**
     * @return bool
     */
    public function canRead()
    {
        return true;
    }

    protected function getObjectName()
    {
        return Datasource::class;
    }
}