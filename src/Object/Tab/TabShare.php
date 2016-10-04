<?php namespace ExpandOnline\KlipfolioApi\Object\Tab;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Tab
 * @package ExpandOnline\KlipfolioApi\Object\Tab
 *
 * @property bool $can_edit
 * @property array $groups
 */
class TabShare extends BaseApiResource
{
    private $tabId;
    /**
     * @return boolean
     */
    public function isCanEdit() {
        return $this->can_edit;
    }

    /**
     * @param boolean $can_edit
     * @return $this
     */
    public function setCanEdit($can_edit) {
        $this->can_edit = $can_edit;
        return $this;
    }

    /**
     * @param $groupId
     * @param $canEdit
     */
    public function addShare($groupId, $canEdit) {
        $this->data['groups'][] = [
            'group_id' => $groupId,
            'can_edit' => $canEdit
        ];
    }

    /**
     * @return mixed
     */
    public function getShares() {
        return $this->data['groups'];
    }

    /**
     * @return string
     */
    public function getTabId() {
        return $this->tabId;
    }

    /**
     * @param string $tabId
     */
    public function setTabId($tabId) {
        $this->tabId = $tabId;
    }



}