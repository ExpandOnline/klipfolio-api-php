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

        // Klipfolio sometimes adds empty values to the GET request, but doesn't accept them back.
        // Unset all empty keys so we don't get errors.
        if (!empty($data['properties'])) {
            foreach ($data['properties'] as $key => $value) {
                if (empty($value)) {
                    unset($data['properties'][$key]);
                }
            }
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