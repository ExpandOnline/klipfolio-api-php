<?php namespace ExpandOnline\KlipfolioApi\Object\Tab;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Tab
 * @package ExpandOnline\KlipfolioApi\Object\Tab
 *
 * @property string $name
 * @property string $description
 * @property-read string $company
 * @property-read string $last_updated
 * @property-read string $created_by
 * @property-read string $id
 */
class Tab extends BaseApiResource
{
    protected $readOnlyFieldNames = [
        'id', 'company', 'last_updated', 'created_by'
    ];

    /**
     * @param $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getCompany() {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getLastUpdated() {
        return $this->last_updated;
    }

    /**
     * @return string
     */
    public function getCreatedBy() {
        return $this->created_by;
    }

    /**
     * @return string
     */
    public function getId() {
        return $this->id;
    }



}