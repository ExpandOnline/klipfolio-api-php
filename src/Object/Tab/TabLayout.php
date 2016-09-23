<?php namespace ExpandOnline\KlipfolioApi\Object\Tab;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\Tab\Enum\TabLayoutType;
use SendGrid\Exception;

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
    protected $readOnlyFieldNames = [];

    const FIELD_DESKTOP = 'desktop';
    const FIELD_ITEMCONFIGS = 'itemConfigs';

    /**
     * Override base constructor so we can set itemConfigs to instance of ItemConfig
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct($data);
        $this->transformItemConfigs();
    }

    /**
     * @return mixed
     */
    public function getMutableData()
    {
        return $this->getData();
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();
        if (array_key_exists('state', $data) && $this->hasItemConfigs($data['state'])) {
            foreach ($data['state'][static::FIELD_DESKTOP][static::FIELD_ITEMCONFIGS] as &$itemConfig) {
                /** @var ItemConfig $itemConfig */
                $itemConfig = $itemConfig->getData();
            }
        }
        return $data;
    }

    /**
     * No ID in this resource -> Always return true.
     * @return bool
     */
    public function exists()
    {
        return true;
    }

    /**
     *
     */
    public function transformItemConfigs()
    {
        if (array_key_exists('state', $this->data) && $this->hasItemConfigs($this->data['state'])) {
            foreach ($this->data['state'][static::FIELD_DESKTOP][static::FIELD_ITEMCONFIGS] as &$itemConfig) {
                $itemConfig = new ItemConfig($itemConfig);
            }
        }
    }

    public function setData(array $data)
    {
        $return = parent::setData($data);
        $this->transformItemConfigs();
        return $return;
    }

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
        return array_key_exists('state', $this->data) ? $this->state : null;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    public function addItemConfig(ItemConfig $itemConfig)
    {
        if (!$this->hasItemConfigs($this->getState())) {
            $this->initItemConfigs();
        }

        $state = $this->getState();
        $state[static::FIELD_DESKTOP][static::FIELD_ITEMCONFIGS][] = $itemConfig;
        $this->setState($state);
        return $this;
    }

    public function setColumns($columns)
    {
        if (array_key_exists('state', $this->data)) {
            $state = $this->getState();
            $desktop = array_key_exists(static::FIELD_DESKTOP, $state) ? $state[static::FIELD_DESKTOP] : [];
            $desktop['cols'] = $columns;
            $desktop['colWidths'] = array_fill(0, $columns, 'auto');
            $state[static::FIELD_DESKTOP] = $desktop;
            $this->setState($state);
        }
    }

    /**
     * @return ItemConfig[]
     */
    public function getItemConfigs()
    {
        if (!$this->hasItemConfigs($this->getState())) {
            return null;
        }
        return $this->getState()[static::FIELD_DESKTOP][static::FIELD_ITEMCONFIGS];
    }

    protected function initItemConfigs()
    {
        $this->setState([
                static::FIELD_DESKTOP => [
                    static::FIELD_ITEMCONFIGS => []
                ]
            ]
        );
    }

    protected function hasItemConfigs($state)
    {
        return !empty($state) && array_key_exists(static::FIELD_DESKTOP, $state)
        && array_key_exists(static::FIELD_ITEMCONFIGS, $state[static::FIELD_DESKTOP])
        && is_array($state[static::FIELD_DESKTOP][static::FIELD_ITEMCONFIGS]);
    }
}