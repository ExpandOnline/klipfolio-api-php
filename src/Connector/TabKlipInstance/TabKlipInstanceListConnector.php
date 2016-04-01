<?php namespace ExpandOnline\KlipfolioApi\Connector\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Connector\BaseApiCollectionConnector;
use ExpandOnline\KlipfolioApi\Object\TabKlipInstance\TabKlipInstanceList;

/**
 * Class TabKlipInstanceListConnector
 * @package ExpandOnline\KlipfolioApi\Connector\TabKlipInstance
 */
class TabKlipInstanceListConnector extends BaseApiCollectionConnector
{

    /**
     * @var null
     */
    protected $tabId = null;

    /**
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getEndpoint()
    {
        if (!is_null($this->getTabId())) {
            return sprintf(
                'tabs/%s/klip-instances',
                $this->getTabId()
            );
        }

        throw new \InvalidArgumentException('KlipInstance must always have a Tab ID.');
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return TabKlipInstanceList::class;
    }

    /**
     * @return null
     */
    public function getTabId()
    {
        return $this->tabId;
    }

    /**
     * @param null $tabId
     * @return TabKlipInstanceListConnector
     */
    public function setTabId($tabId)
    {
        $this->tabId = $tabId;
        return $this;
    }

}