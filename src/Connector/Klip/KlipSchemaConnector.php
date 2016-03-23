<?php namespace ExpandOnline\KlipfolioApi\Connector\Klip;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipSchema;

/**
 * Class KlipSchemaConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Klip
 */
class KlipSchemaConnector extends BaseApiResourceConnector
{

    /**
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getEndpoint()
    {
        if (!is_null($this->getId())) {
            return sprintf(
                'klips/%s/schema',
                $this->getId()
            );
        }

        throw new \InvalidArgumentException('KlipSchema must always have a Klip ID.');
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
     * @return mixed
     */
    protected function getObjectName()
    {
        return KlipSchema::class;
    }
}