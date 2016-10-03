<?php
namespace ExpandOnline\KlipfolioApi\Connector\UserGroup;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\UserGroup\UserGroup;

/**
 * Class GroupConnector
 * @package ExpandOnline\KlipfolioApi\Connector\UserGroup
 */
class UserGroupConnector extends BaseApiResourceConnector
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
        if (is_null($this->getGroupId())) {
            throw new \InvalidArgumentException('UserGroup must always have a User ID.');
        }

        return 'users' . '/' . $this->getId() . '/' . 'groups'
            . (!is_null($this->getGroupId()) ? '/' . $this->getGroupId() : '');
    }

    public function setResource(UserGroup $resource) {
        $this->resource = $resource;
        $this->id = $resource->getUserId();
        $this->groupId = $resource->getGroupId();
        return $this;
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
     * @return mixed
     */
    protected function getObjectName()
    {
        return UserGroup::class;
    }

    /**
     * @return bool
     */
    public function resourceExists()
    {
        //There is no POST endpoint for UserGroup, only PUT, so we always want to return true
        return true;
    }
}