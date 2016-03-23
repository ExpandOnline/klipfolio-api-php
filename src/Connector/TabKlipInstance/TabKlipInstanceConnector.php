<?php namespace ExpandOnline\KlipfolioApi\Connector\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\TabKlipInstance\TabKlipInstance;

/**
 * Class TabKlipInstanceConnector
 * @package ExpandOnline\KlipfolioApi\Connector\TabKlipInstance
 */
class TabKlipInstanceConnector extends BaseApiResourceConnector
{

    /**
     * @var int
     */
    protected $tabId;

    /**
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getEndpoint()
    {
        if (!is_null($this->getTabId())) {
            return sprintf(
                'tabs/%s/klip-instances%s',
                $this->getTabId(),
                !is_null($this->getId()) ? '/' . $this->getId() : ''
            );
        }

        throw new \InvalidArgumentException('KlipInstance must always have a Tab ID.');
    }

    /**
     * The create of klip instance is actually an update (PUT).
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
        return TabKlipInstance::class;
    }

    /**
     * @return mixed
     */
    public function getTabId()
    {
        return $this->tabId;
    }

    /**
     * @param mixed $tabId
     * @return TabKlipInstanceConnector
     */
    public function setTabId($tabId)
    {
        $this->tabId = $tabId;

        return $this;
    }

}