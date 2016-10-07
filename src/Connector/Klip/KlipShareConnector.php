<?php namespace ExpandOnline\KlipfolioApi\Connector\Klip;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\Klip\KlipShare;

/**
 * Class KlipShareConnector
 * @package ExpandOnline\KlipfolioApi\Connector\Klip
 */
class KlipShareConnector extends BaseApiResourceConnector
{
    /**
     * @var int
     */
    protected $groupId;

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        return 'Klips' . '/' . $this->getId() . '/' . 'share-rights'
        . (!is_null($this->getGroupId()) ? '/' . $this->getGroupId() : '');
    }

    /**
     * @param BaseApiResource $resource
     * @return $this
     */
    public function setResource(BaseApiResource $resource) {
        $this->resource = $resource;
        $this->id = $resource->getKlipId();
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
        return KlipShare::class;
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
        //There is no POST endpoint for KlipShareRights, only PUT, so we always want to return true
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