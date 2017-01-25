<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

/**
 * Class DatasourceConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Datasource
 */
class DatasourceConnector extends BaseApiResourceConnector
{
    /**
     * @return mixed
     */
    public function getDataForPost()
    {
        $data = parent::getDataForPost();

        // Klipfolio randomly adds a 'body' property to datasources created with the UI, but doesn't accept
        // this property when creating a datasource with the API.
        if (!empty($data['properties']) && array_key_exists('body', $data['properties'])) {
            unset($data['properties']['body']);
        }
        return $data;
    }

    /**
     * @var string
     */
    protected $endPoint = 'datasources';

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
    public function canDelete()
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
        return Datasource::class;
    }
}