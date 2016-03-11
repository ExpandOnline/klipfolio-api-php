<?php


namespace ExpandOnline\KlipfolioApi\Object;



/**
 * Class BaseApiResource
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class BaseApiResource extends BaseApiObject
{
    /**
     *
     */
    const FIELD_ID = 'id';

    /**
     * @var array
     */
    protected $dataChanged = [];

    /**
     * BaseApiResource constructor.
     * @param null $id
     */
    public function __construct($id = null){
        parent::__construct();

        $this->data[static::FIELD_ID] = $id;
    }

    /**
     * @return array
     */
    public function getUpdatedDataForPost(){

        return array_intersect_key($this->data, array_flip($this->dataChanged));
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->data[static::FIELD_ID];
    }


    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if(!array_key_exists($name, $this->data) || $this->data[$name] !== $value){
            $this->dataChanged[] = $name;
            parent::__set($name, $value);
        }
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return isset($this->data[static::FIELD_ID]);
    }

}