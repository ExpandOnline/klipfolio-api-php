<?php
namespace ExpandOnline\KlipfolioApi\Connector\UserTabInstance;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\UserTabInstance\UserTabInstance;

/**
 * Class UserTabInstanceConnector
 * @package ExpandOnline\KlipfolioApi\Connector\UserTabInstance
 */
class UserTabInstanceConnector extends BaseApiResourceConnector
{

    /**
     * @var int
     */
    protected $userId;

    /**
     * @var UserTabInstance
     */
    protected $resource;

    /**
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function getEndpoint()
    {
        if (is_null($this->getUserId())) {
            throw new \InvalidArgumentException('UserTabInstance must always have a User ID.');
        }

        return $this->formatEndpoint('users' . '/' . $this->getUserId() . '/' . 'tab-instances');
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
     * @return bool
     */
    public function canRead()
    {
        return true;
    }

    /**
     * @return mixed
     */
    protected function getObjectName()
    {
        return UserTabInstance::class;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     * @return UserTabInstanceConnector
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return array
     */
    public function getDataForUpdate()
    {
        return $this->resource->getData();
    }

}