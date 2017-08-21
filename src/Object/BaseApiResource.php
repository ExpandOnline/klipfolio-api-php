<?php namespace ExpandOnline\KlipfolioApi\Object;

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
     * @param array $data
     */
    public function __construct($data = [])
    {
        parent::__construct();
        
        $this->data[static::FIELD_ID] = array_key_exists('id', $data) ? $data['id'] : null;

        foreach ($data as $key => $value) {
            if (!in_array($key, $this->getReadOnlyFieldNames())) {
                $this->{$key} = $value;
            }
        }
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
        if (!array_key_exists($name, $this->data) || $this->data[$name] !== $value) {
            $this->dataChanged[] = $name;
            parent::__set($name, $value);
        }
    }

    /**
     * @param array
     * @return $this
     */
    public function setData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function exists()
    {
        return isset($this->data[static::FIELD_ID]);
    }

    /**
     * @param $data
     */
    public function setDataWithoutTracking($data)
    {
        foreach($data as $key => $value ){
            $this->data[$key] = $value;
        }
    }

    /**
     * @return $this
     */
    public function createFreshCopy()
    {

        $copy = clone $this;
        unset($copy->id);
        return $copy;
    }

    /**
     * @return mixed
     */
    public function getMutableData()
    {
        $data = parent::getData();

        foreach ($data as &$value) {
            if ($value instanceof BaseApiResource) {
                $value = $value->getMutableData();
            } elseif ($value instanceof BaseObject) {
                $value = $value->getData();
            }
        }

        return array_diff_key($data, array_flip($this->getReadOnlyFieldNames()));
    }

    /**
     * @return mixed
     */
    public function getChanges()
    {
        return array_intersect_key($this->getMutableData(), array_flip($this->dataChanged));
    }

    /**
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();

        foreach ($data as &$value) {
            if ($value instanceof BaseObject) {
                $value = $value->getData();
            }
        }

        return $data;
    }
}