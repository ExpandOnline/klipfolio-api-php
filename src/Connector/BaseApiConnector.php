<?php namespace ExpandOnline\KlipfolioApi\Connector;

use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Response;

abstract class BaseApiConnector
{
    /**
     * @var array
     */
    protected $apiParams = [];

    /**
     * @param null $option
     * @return mixed
     */
    abstract public function getEndpoint($option = null);


    abstract protected function getObjectName();

    /**
     * @param Response $response
     * @return BaseApiObject
     */
    public function resolveResponse(Response $response)
    {
        $content = $response->getContent();

        $objectName = $this->getObjectName();

        /** @var BaseApiObject $object */
        $object = new $objectName();
        $object->setData($content);

        return $object;
    }

    /**
     * @param $id
     */
    public function setClientId($id)
    {
        $this->setParam('client_id', $id);
    }

    protected function setParam($key, $value)
    {
        $this->apiParams[$key] = $value;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->apiParams;
    }

    /**
     * @return bool
     */
    public function canRead()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canDelete()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canCreate()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function canUpdate()
    {
        return false;
    }
}