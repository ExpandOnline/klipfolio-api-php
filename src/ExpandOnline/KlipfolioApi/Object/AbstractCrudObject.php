<?php

namespace ExpandOnline\KlipfolioApi\Object;

use ExpandOnline\KlipfolioApi\Client;
use ExpandOnline\KlipfolioApi\Request;

/**
 * Class AbstractCrudObject
 * @package ExpandOnline\KlipfolioApi\Object
 */
abstract class AbstractCrudObject extends AbstractObject
{

    const FIELD_ID = 'id';

    /**
     * @var Client
     */
    private $client;

    /**
     * AbstractCrudObject constructor.
     * @param null $id
     * @param Client|null $client
     */
    public function __construct($id = null, Client $client = null)
    {
        parent::__construct();
        $this->_data[static::FIELD_ID] = $id;
        $this->client = $client;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->_data[static::FIELD_ID] = $id;
    }


    /**
     * @param Client $client The Client instance this object should use to make calls
     */
    public function setClient(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient()
    {
        return $this->client;
    }

    /**
     * @return string
     */
    abstract protected function getEndpoint();

    /**
     * Create function for the object.
     *
     * @param array $params Additional parameters to include in the request
     * @return $this
     * @throws \Exception
     */
    public function create(array $params = array())
    {
        if ($this->_data[static::FIELD_ID]) {
            throw new \Exception("Can't create object that already exists");
        }

        $request = ''; // TODO: Request voor shit posten

        $response = $this->getClient()->sendRequest(new Request(
            $path = $this->getEndpoint(),
            $method = 'POST'
        ));

        $data = $response->getContent();


        $id = is_string($data) ? $data : $data[static::FIELD_ID];
        $this->_data[static::FIELD_ID] = $id;

        return $this;
    }


    /**
     * Read object data from the graph
     *
     * @param string[] $fields Fields to request
     * @param array $params Additional request parameters
     * @return $this
     */
    public function read(array $fields = array(), array $params = array())
    {

        $response = $this->getClient()->sendRequest(new Request(
            $path = $this->getEndpoint() . '/' . $this->_data[static::FIELD_ID],
            $method = 'GET'
        ));

        $this->__set('statusCode', $response->getStatusCode());
        $this->setData($response->getContent());

        return $this;
    }


    /**
     * Update the object. Function parameters are similar with the create function
     *
     * @param array $params Update parameters in assoc
     * @return $this
     */
    public function update(array $params = array())
    {
        $response = $this->getClient()->sendRequest(new Request(
            $path = $this->getEndpoint() . '/' . $this->_data[static::FIELD_ID],
            $method = 'GET'
        )); // TODO: Request voor shit updaten
        return $this;
    }

    /**
     * Delete this object from the graph
     *
     * @param array $params
     * @return void
     */
    public function delete(array $params = array())
    {
        $response = $this->getClient()->sendRequest(new Request(
            $path = $this->getEndpoint() . '/' . $this->_data[static::FIELD_ID],
            $method = 'GET'
        )); // TODO: Request voor shit deleten
    }

    /**
     * Perform object upsert
     *
     * Helper function which determines whether an object should be created or
     * updated
     *
     * @param array $params
     * @return $this
     */
    public function save(array $params = array())
    {
        if ($this->_data[static::FIELD_ID]) {
            return $this->update($params);
        } else {
            return $this->create($params);
        }
    }

}