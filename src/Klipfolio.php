<?php namespace ExpandOnline\KlipfolioApi;

use ExpandOnline\KlipfolioApi\Connector\BaseApiConnector;
use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\BaseApiOperation;

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
     * @param BaseApiConnector $connector
     * @return BaseApiObject
     * @throws KlipfolioApiException
     */
    public function get(BaseApiConnector $connector)
    {
        if (!$connector->canRead()) {
            throw new KlipfolioApiException('Read is not allowed on object of type ' . get_class($connector));
        }

        $response = $this->client->sendRequest('GET', $connector->getEndpoint(), ['query' => $connector->getParams()]);


        return $connector->resolveResponse($response);
    }

    /**
     * @param BaseApiResourceConnector $connector
     * @return Response
     * @throws KlipfolioApiException
     */
    protected function create(BaseApiResourceConnector $connector)
    {
        if (!$connector->canCreate()) {
            throw new KlipfolioApiException('Create is not allowed on object of type ' . get_class($connector));
        }

        if(empty($connector->getResource()->getUpdatedDataForPost())){
            throw new KlipfolioApiException('Object in ' . get_class($connector) . ' has no fields to create');
        }

        return $this->client->sendRequest(
            'POST',
            $connector->getEndpoint(),
            ['body' => $connector->getResource()->getUpdatedDataForPost()]
        );
    }

    /**
     * @param BaseApiResourceConnector $connector
     * @return Response
     * @throws KlipfolioApiException
     */
    protected function update(BaseApiResourceConnector $connector)
    {
        if (!$connector->canUpdate()) {
            throw new KlipfolioApiException('Update is not allowed on object of type ' . get_class($connector));
        }

        if(empty($connector->getResource()->getUpdatedDataForPost())){
            throw new KlipfolioApiException('Object in ' . get_class($connector) . ' has no changed fields to update');
        }

        return $this->client->sendRequest(
            'PUT',
            $connector->getEndpoint(),
            ['body' => $connector->getResource()->getUpdatedDataForPost()]
        );
    }

    /**
     * @param BaseApiResourceConnector $connector
     * @return Response
     * @throws KlipfolioApiException
     */
    public function delete(BaseApiResourceConnector $connector)
    {
        if (!$connector->canDelete()) {
            throw new KlipfolioApiException('Delete is not allowed on object of type ' . get_class($connector));
        }
        return $this->client->sendRequest('DELETE', $connector->getEndpoint());
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
     * @param BaseApiResourceConnector $connector
     * @return Response
     * @throws KlipfolioApiException
     */
    public function save(BaseApiResourceConnector $connector)
    {
        if ($connector->getResource()->exists()) {
            return $this->update($connector);
        } else {
            return $this->create($connector);
        }
    }
}