<?php namespace ExpandOnline\KlipfolioApi\Object\UserGroup;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Client
 * @package ExpandOnline\KlipfolioApi\Object\Group
 */
class UserGroup extends BaseApiResource
{
    private $userId;
    private $groupId;

    /**
     * @return mixed
     */
    public function getUserId() {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     * @return UserGroup
     */
    public function setUserId($userId) {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGroupId() {
        return $this->groupId;
    }

    /**
     * @param mixed $groupId
     * @return UserGroup
     */
    public function setGroupId($groupId) {
        $this->groupId = $groupId;
        return $this;
    }


}