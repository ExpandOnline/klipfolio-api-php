<?php namespace ExpandOnline\KlipfolioApi\Object\Client;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Client
 * @package ExpandOnline\KlipfolioApi\Object\Client
 *
 * @property string $name
 * @property string $description
 * @property string $status
 * @property integer $seats
 * @property bool $custom_theme
 */
class Client extends BaseApiResource
{
    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getStatus() {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status) {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getSeats() {
        return $this->seats;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name) {
        $this->name = $name;
    }

    /**
     * @param int $seats
     */
    public function setSeats($seats) {
        $this->seats = $seats;
    }

    /**
     * @return boolean
     */
    public function isCustomTheme() {
        return $this->custom_theme;
    }

    /**
     * @param boolean $custom_theme
     */
    public function setCustomTheme($custom_theme) {
        $this->custom_theme = $custom_theme;
    }

}