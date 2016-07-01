<?php namespace ExpandOnline\KlipfolioApi\Object;

/**
 * Class BaseApiCollection
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class BaseApiCollection extends BaseApiObject
{
    /**
     * BaseApiCollection constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->setData($data);
    }

}