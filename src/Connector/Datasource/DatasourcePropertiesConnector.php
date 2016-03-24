<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourceProperties;

/**
 * Class DatasourcePropertiesConnector
 * @package ExpandOnline\KlipfolioApi\Connector\DataSource
 */
class DatasourcePropertiesConnector extends BaseApiResourceConnector
{

    /**
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getEndpoint()
    {
        if (!is_null($this->getId())) {
            return sprintf(
                'datasources/%s/properties',
                $this->getId()
            );
        }

        throw new \InvalidArgumentException('DatasourceProperties must always have a Datasource ID.');
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
    public function canUpdate()
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
     * @return mixed
     */
    protected function getObjectName()
    {
        return DatasourceProperties::class;
    }
}