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

    public function getData()
    {
        $data = parent::getData();
        if ($this->hasItemConfigs($data['state'])) {
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