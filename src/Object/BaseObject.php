<?php namespace ExpandOnline\KlipfolioApi\Object;

abstract class BaseObject
{
    /**
     * @var array
     */
    protected $data = [];

    /**
     * @var mixed[] set of key value pairs representing data
     */
    public function __construct()
    {
        $this->data = [];
    }

    /**
     * @param string $name
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function __get($name)
    {

        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        } else {
            throw new \InvalidArgumentException(
                $name . ' is not a field of ' . get_class($this));
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * @param string $name
     * @return boolean
     */
    public function __isset($name)
    {
        return array_key_exists($name, $this->data);
    }

    /**
     * @param array
     * @return $this
     */
    public function setData(array $data)
    {
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }
}