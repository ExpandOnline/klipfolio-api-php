<?php namespace ExpandOnline\KlipfolioApi\Object;

/**
 * Class BaseApiOperation
 * @package ExpandOnline\KlipfolioApi\Object
 */
/**
 * Class BaseApiOperation
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class BaseApiOperation extends BaseApiObject
{
    /**
     * @var
     */
    protected $id;

    /**
     * BaseApiOperation constructor.
     * @param $id
     */
    public function __construct($id)
    {
        parent::__construct();
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    abstract public function getOperation();

    /**
     * @return mixed
     */
    abstract public function getEndpoint();
}