<?php namespace ExpandOnline\KlipfolioApi\Connector;

/**
 * Class BaseApiCollectionConnector
 * @package ExpandOnline\KlipfolioApi\Connector
 */
abstract class BaseApiCollectionConnector extends BaseApiConnector
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

    /**
     * @return bool
     */
    public function canRead()
    {
        return true;
    }

}