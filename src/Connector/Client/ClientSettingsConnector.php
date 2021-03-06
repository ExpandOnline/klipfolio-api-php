<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Object\Client\ClientProperty;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Client\ClientResource;
use ExpandOnline\KlipfolioApi\Object\Client\ClientSettings;

/**
 * Class ClientSettingsConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Client
 *
 */
class ClientSettingsConnector extends BaseApiResourceConnector
{
    /**
     * @var ClientProperty
     */
    protected $resource;
    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if (empty($this->getId())) {
            throw new \InvalidArgumentException('Missing required client id in client property resource.');
        }

        return 'clients/' . $this->getId() . '/settings';

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
    public function canUpdate() {
        return false;
    }

    /**
     * @return bool
     */
    public function canCreate() {
        return true;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return ClientSettings::class;
    }

    /**
     * @return mixed
     */
    public function resourceExists()
    {
        // Always use POST
        return false;
    }


    public function getDataForPost()
    {
        return parent::getDataForUpdate();
    }
}