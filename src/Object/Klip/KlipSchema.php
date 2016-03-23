<?php namespace ExpandOnline\KlipfolioApi\Object\Klip;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class KlipSchema
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class KlipSchema extends BaseApiResource
{
    const FIELD_TITLE = 'title';
    const FIELD_WORKSPACE = 'workspace';
    const FIELD_COMPONENTS = 'components';

    /**
     * @return mixed
     */
    public function getTitle() {
        return $this->data[self::FIELD_TITLE];
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title) {
        $this->{self::FIELD_TITLE} = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkspace() {
        return $this->data[self::FIELD_WORKSPACE];
    }

    /**
     * @param $workspace
     * @return $this
     */
    public function setWorkspace($workspace) {
        $this->{self::FIELD_WORKSPACE} = $workspace;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComponents() {
        return $this->data[self::FIELD_COMPONENTS];
    }

    /**
     * @param $components
     * @return $this
     */
    public function setComponents($components) {
        $this->{self::FIELD_COMPONENTS} = $components;

        return $this;
    }
}