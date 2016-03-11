<?php

namespace ExpandOnline\KlipfolioApi;


use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Klipfolio
 * @package ExpandOnline\KlipfolioApi
 */
class Klipfolio
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * Klipfolio constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param BaseApiObject $object
     * @return BaseApiObject
     * @throws KlipfolioApiException
     */
    public function get(BaseApiObject $object)
    {
        if (!$object->canRead()) {
            throw new KlipfolioApiException('Read is not allowed on object of type ' . get_class($object));
        }

        $response = $this->client->sendRequest('GET', $object->getEndpoint('id'), ['query' => $object->getParams()]);
        $object->setData($response->getContent());

        return $object;

    }

    /**
     * @param BaseApiResource $object
     * @return Response
     * @throws KlipfolioApiException
     */
    protected function create(BaseApiResource $object)
    {
        if (!$object->canCreate()) {
            throw new KlipfolioApiException('Create is not allowed on object of type ' . get_class($object));
        }
        return $this->client->sendRequest('POST', $object->getEndpoint(), ['body' => $object->getUpdatedDataForPost()]);

    }

    /**
     * @param BaseApiResource $object
     * @return Response
     * @throws KlipfolioApiException
     */
    protected function update(BaseApiResource $object)
    {
        if (!$object->canUpdate()) {
            throw new KlipfolioApiException('Update is not allowed on object of type ' . get_class($object));
        }
        return $this->client->sendRequest('PUT', $object->getEndpoint('id'), ['body' => $object->getUpdatedDataForPost()]);
    }

    /**
     * @param BaseApiObject $object
     * @return Response
     * @throws KlipfolioApiException
     */
    public function delete(BaseApiObject $object)
    {
        if (!$object->canDelete()) {
            throw new KlipfolioApiException('Delete is not allowed on object of type ' . get_class($object));
        }
        return $this->client->sendRequest('DELETE', $object->getEndpoint('id'));

    }

    /**
     * @param BaseApiOperation $operation
     * @return mixed
     */
    public function operate(BaseApiOperation $operation)
    {
        return $this->client->sendRequest('POST', $operation->getEndpoint() . '/@/' . $operation->getOperation());
    }

    /**
     * @param BaseApiResource $object
     * @return Response
     * @throws KlipfolioApiException
     */
    public function save(BaseApiResource $object)
    {
        if ($object->exists()) {
            return $this->update($object);
        } else {
            return $this->create($object);
        }
    }


}