<?php namespace ExpandOnline\KlipfolioApi\Object\Klip;

use DateTime;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Klip
 *
 * @property string $name
 * @property string $description
 * @property-write string $client_id
 * @property-read string $company
 * @property-read string $date_created
 * @property-read string $created_by
 * @property-read string $last_updated
 * @property-read array $share_rights
 */
class Klip extends BaseApiResource
{
    protected $readOnlyFieldNames = [
        'id', 'company', 'date_created', 'last_updated', 'created_by', 'share_rights'
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
     * @param $clientId
     * @return $this
     */
    public function setClientId($clientId)
    {
        $this->client_id = $clientId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * $date_created is an ISO 8601 time string
     *
     * @see https://www.w3.org/TR/NOTE-datetime
     * @return DateTime
     */
    public function getDateCreated()
    {
        return new DateTime($this->date_created);
    }

    /**
     * $last_updated is an ISO 8601 time string
     *
     * @see https://www.w3.org/TR/NOTE-datetime
     * @return DateTime
     */
    public function getDateUpdated()
    {
        return new DateTime($this->last_updated);
    }

    /**
     * @return array
     */
    public function getShareRights()
    {
        return $this->share_rights;
    }
}