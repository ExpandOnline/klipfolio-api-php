<?php namespace ExpandOnline\KlipfolioApi\Connector\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
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
     * @var array
     */
    protected $klips = [];

    /**
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getEndpoint()
    {
        if (is_null($this->getTabId())) {
            throw new \InvalidArgumentException('KlipInstance must always have a Tab ID.');
        }

        return $this->formatEndpoint('tabs' . '/' . $this->getTabId() . '/' . 'klip-instances');
    }

    /**
     * @param BaseApiResource $klip
     * @return $this
     */
    public function addKlip(BaseApiResource $klip)
    {
        $this->klips[] = $klip;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataForUpdate()
    {
        $klipData = ['klips' => []];

        foreach ($this->klips as $klip) {
            $klipData['klips'][] = $klip->getData();
        }
        return $klipData;
    }

    /**
     * @return mixed
     */
    public function resourceExists()
    {
        return count($this->klips) > 0;
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