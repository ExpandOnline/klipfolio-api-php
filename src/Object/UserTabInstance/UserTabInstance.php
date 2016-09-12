<?php
namespace ExpandOnline\KlipfolioApi\Object\UserTabInstance;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class UserTabInstance
 * @package ExpandOnline\KlipfolioApi\Object\UserTabInstance
 */
class UserTabInstance extends BaseApiResource
{

    const FIELD_TAB_IDS = 'tab_ids';
    const FIELD_TAB_INSTANCES = 'tab_instances';

    /**
     * @return mixed
     */
    public function getTabIds() {
        return $this->data[static::FIELD_TAB_IDS];
    }

    /**
     * @param $tabIds
     * @return $this
     */
    public function setTabIds($tabIds) {
        $this->{static::FIELD_TAB_IDS} = $tabIds;
        return $this;
    }

    /**
     * @param $tabId
     * @return $this
     */
    public function addTabId($tabId) {
        if (!array_key_exists(static::FIELD_TAB_IDS, $this)) {
            $this->{static::FIELD_TAB_IDS} = [];
        }
        $this->{static::FIELD_TAB_IDS}[] = $tabId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTabInstances() {
        return $this->data[static::FIELD_TAB_INSTANCES];
    }

    /**
     * @return bool
     */
    public function exists() {
        return count($this->{static::FIELD_TAB_IDS}) > 0;
    }

}