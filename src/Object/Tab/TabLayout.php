<?php namespace ExpandOnline\KlipfolioApi\Object\Tab;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\Tab\Enum\TabLayoutType;

/**
 * Class TabLayout
 * @package ExpandOnline\KlipfolioApi\Object\Tab
 *
 * @property string type
 * @property array state
 *
 */
class TabLayout extends BaseApiResource
{
    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        TabLayoutType::validate($type);
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}