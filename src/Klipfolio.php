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

        if ($response->hasError()) {
            throw new KlipfolioApiException($response->getError());
        }

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

        return $this->client->sendRequest(
            'POST',
            $connector->getEndpoint(),
            ['body' => $connector->getDataForPost()]
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

        $this->isValidUpdate($connector);
        return $this->client->sendRequest(
            'PUT',
            $connector->getEndpoint(),
            ['body' => $connector->getDataForUpdate()]
        );
    }


    /**
     * @param BaseApiResourceConnector $connector
     * @return bool
     * @throws KlipfolioApiException
     */
    protected function isValidUpdate(BaseApiResourceConnector $connector)
    {
        if (!$connector->isValidUpdate()) {
            throw new KlipfolioApiException('Object in ' . get_class($connector) . ' is not a valid object to be updated.');
        }

        return true;
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
        if ($connector->resourceExists()) {
            return $this->update($connector);
        }

        return $this->create($connector);
    }
}