<?php namespace ExpandOnline\KlipfolioApi\Connector\Datasource;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourceProperties;
use ExpandOnline\KlipfolioApi\Response;

/**
 * Class DatasourcePropertiesConnector
 * @package ExpandOnline\KlipfolioApi\Connector\DataSource
 */
class DatasourcePropertiesConnector extends BaseApiResourceConnector
{
    /**
     * @param Response $response
     * @return BaseApiObject
     */
    public function resolveResponse(Response $response)
    {
        $content = $response->getContent()['properties'];
        $objectName = $this->getObjectName();

        return new $objectName($content);
    }

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