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
        parent::__construct();

        foreach ($data as $key => $value) {
            if (!in_array($key, $this->getReadOnlyFieldNames())) {
                $this->{$key} = $value;
            }
        }
    }

}