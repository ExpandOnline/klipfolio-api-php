<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource;


use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Object\BaseObject;

/**
 * Class DatasourcePropertiesParameters
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class DatasourcePropertiesParameters extends BaseObject
{

    const TYPE_HEADER = 'header';
    const KEY_NAME = 'name';
    const KEY_TYPE = 'type';
    const KEY_VALUE = 'value';


    /**
     * DatasourcePropertiesParameters constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct();
        $this->setData($data);
    }

    public function setHeader($name, $value)
    {
        foreach ($this->data as &$item) {
            if ($this->isHeaderArray($item) && $item[static::KEY_NAME] === $name) {
                $item[static::KEY_NAME] = $value;
                return $this;
            }
        }

        $this->data[] = $this->createNewHeader($name, $value);
        return $this;
    }

    protected function createNewHeader($name, $value)
    {
        return [
            static::KEY_NAME => $name,
            static::KEY_VALUE => $value,
            static::KEY_TYPE => static::TYPE_HEADER
        ];
    }

    public function getHeader($name)
    {
        foreach ($this->data as $item) {
            if ($this->isHeaderArray($item) && $item[static::KEY_NAME] === $name) {
                return $item[static::KEY_VALUE];
            }
        }

        return null;
    }

    protected function isHeaderArray(array $array)
    {
        return array_key_exists(static::KEY_TYPE, $array)
        && $array[static::KEY_TYPE] === static::TYPE_HEADER;
    }
}