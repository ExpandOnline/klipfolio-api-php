<?php namespace ExpandOnline\KlipfolioApi\Object;

/**
 * Class BaseApiCollection
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class BaseApiCollection extends BaseApiObject
{
    /**
     * @param $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->apiParams['limit'] = $limit;
        return $this;
    }

    /**
     * @param $offset
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->apiParams['offset'] = $offset;
        return $this;
    }
}