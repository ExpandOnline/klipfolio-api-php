<?php namespace ExpandOnline\KlipfolioApi\Object\Klip;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class KlipShare
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 *
 * @property bool $can_edit
 * @property array $groups
 */
class KlipShare extends BaseApiResource
{
    private $klipId;

    /**
     * @return boolean
     */
    public function canEdit() {
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
     * @return mixed
     */
    public function getKlipId() {
        return $this->klipId;
    }

    /**
     * @param mixed $klipId
     * @return KlipShare
     */
    public function setKlipId($klipId) {
        $this->klipId = $klipId;
        return $this;
    }
}