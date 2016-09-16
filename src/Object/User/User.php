<?php namespace ExpandOnline\KlipfolioApi\Object\User;

use AppBundle\Lib\Klipfolio\Exception\ResourceAlreadyExistsException;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class User
 * @package ExpandOnline\KlipfolioApi\Object\User
 * @property-read string $company
 * @property-read string $date_created
 * @property-read string $date_last_login
 * @property      string $email
 * @property      string $first_name
 * @property-read array $groups
 * @property-read boolean $is_locked_out
 * @property      string $last_name
 * @property-read array $properties
 * @property-read array $roles
 * @property-read array $tab_instances
 * @property      string $external_id
 * @property      string $password
 * @property      array $roles
 */
class User extends BaseApiResource
{
    /**
     * @var array
     */
    protected $readOnlyFieldNames = [
        'id', 'company', 'date_created', 'date_last_login', 'groups', 'is_locked_out', 'properties', 'tab_instances'
    ];

    /**
     * @param $password
     * @throws ResourceAlreadyExistsException
     */
    public function setPassword($password)
    {
        if($this->exists()) {
            throw new ResourceAlreadyExistsException();
        }
        $this->password = $password;
    }

    /**
     * @param $roles
     * @throws ResourceAlreadyExistsException
     */
    public function setRoles($roles)
    {
        if($this->exists()) {
            throw new ResourceAlreadyExistsException();
        }
        $this->roles = $roles;
    }

    /**
     * @param $clientId
     * @throws ResourceAlreadyExistsException
     */
    public function setClient($clientId)
    {
        if($this->exists()) {
            throw new ResourceAlreadyExistsException();
        }
        $this->client_id = $clientId;
    }

    /**
     * @param $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->first_name = $firstName;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }

    /**
     * @param $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->last_name = $lastName;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param $externalId
     * @return $this
     */
    public function setExternalId($externalId)
    {
        $this->external_id = $externalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->external_id;
    }

    /**
     * @param $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @return string
     */
    public function getDateLastLogin()
    {
        return $this->date_last_login;
    }

    /**
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return bool
     */
    public function isLockedOut()
    {
        return $this->is_locked_out;
    }

    /**
     * @return array
     */
    public function getProperties()
    {
        return $this->properties;
    }

    /**
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * @return array
     */
    public function getTabInstances()
    {
        return $this->tab_instances;
    }
}