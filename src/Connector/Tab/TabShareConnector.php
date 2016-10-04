<?php namespace ExpandOnline\KlipfolioApi\Connector\Tab;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\Tab\TabShare;

/**
 * Class TabShareConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Tab
 */
class TabShareConnector extends BaseApiResourceConnector
{
    /**
     * @var int
     */
    protected $groupId;

    public function getEndpoint($option = '')
    {
        return 'tabs' . '/' . $this->getId() . '/' . 'share-rights'
        . (!is_null($this->getGroupId()) ? '/' . $this->getGroupId() : '');
    }

    public function setResource(BaseApiResource $resource) {
        $this->resource = $resource;
        $this->id = $resource->getTabId();
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidUpdate() {
        return !empty($this->resource->getShares());
    }

    /**
     * @return BaseApiObject
     */
    protected function getObjectName() {
        return TabShare::class;
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
    public function canDelete()
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
     * @return int
     */
    public function getGroupId()
    {
        return $this->groupId;
    }

    /**
     * @param int $groupId
     * @return $this
     */
    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }

    /**
     * @return bool
     */
    public function resourceExists()
    {
        //There is no POST endpoint for TabShareRights, only PUT, so we always want to return true
        return true;
    }

    /**
     * @return array
     */
    public function getDataForUpdate()
    {
        return ['groups' => $this->resource->getShares()];

    }
}