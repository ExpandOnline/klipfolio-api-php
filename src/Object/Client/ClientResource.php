<?php namespace ExpandOnline\KlipfolioApi\Object\Client;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class ClientResource
 * @package ExpandOnline\KlipfolioApi\Object\ClientProprty
 *
 * @property array resources
 */
class ClientResource extends BaseApiResource
{
    const FIELD_RESOURCES = 'resources';

    const API_REQUESTS_PER_DAY = 'api.requests.perDay';
    const API_REQUESTS_PER_SECOND = 'api.requests.perSecond';
    const API_APPEND_DATA_SIZE = 'api.append.data.size';
    const DASHBOARD_KLIPS_PER_TAB = 'dashboard.klips.perTab';
    const DASHBOARD_TABS_PER_DASHBOARD = 'dashboard.tabs.perDashboard';
    const DASHBOARD_TABS_TOTAL = 'dashboard.tabs.total';
    const DATASOURCES_PER_FORMULA = 'workspace.datasources.perFormula';
    const USERS = 'company.seats';
    const SESSIONS_CONCURRENT = 'sessions.concurrent';
    const PRIVATE_LINKS = 'published.private.links';
    const PRIVATE_LINKS_VIEWERS = 'published.private.concurrent';

    protected $clientResourceFixer;


    /**
     * BaseApiResource constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->clientResourceFixer = new ClientResourceHttpTransformer();

        if (!array_key_exists(static::FIELD_RESOURCES, $data)) {
            $this->resources = [];
        }

        $this->data = $this->clientResourceFixer->transformGetToPut($this->data);
    }

    /**
     * Override to return getData since everything is mutable
     * @return array
     */
    public function getMutableData()
    {
        return $this->getData();
    }

    /**
     * Override to fix Klipfolio bug
     * @return array
     */
    public function getData()
    {
        $data = parent::getData();
        return $this->clientResourceFixer->withoutFalseyValues($data);
    }

    /**
     * @param string $name
     * @param string $value
     * @return $this
     */
    public function setResource($name, $value)
    {
        foreach ($this->data[static::FIELD_RESOURCES] as &$resource) {
            if ($resource['name'] === $name) {
                $resource['value'] = $value;
                return $this;
            }
        }
        $this->data[static::FIELD_RESOURCES][] = ['name' => $name, 'value' => $value];
        return $this;
    }

    /**
     * @return array
     */
    public function getResources()
    {
        return $this->resources;
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getResource($name)
    {
        return $this->data[static::FIELD_RESOURCES][array_search($name, array_column($this->getResources(), 'name'))]['value'];
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setApiCallsPerSecond($value)
    {
        return $this->setResource(static::API_REQUESTS_PER_SECOND, $value);
    }

    /**
     * @return mixed
     */
    public function getApiCallsPerSecond()
    {
        return $this->getResource(static::API_REQUESTS_PER_SECOND);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setApiAppendDataSize($value)
    {
        return $this->setResource(static::API_APPEND_DATA_SIZE, $value);
    }

    /**
     * @return mixed
     */
    public function getApiAppendDataSize()
    {
        return $this->getResource(static::API_APPEND_DATA_SIZE);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setKlipsPerDashboard($value)
    {
        return $this->setResource(static::DASHBOARD_KLIPS_PER_TAB, $value);
    }

    /**
     * @return mixed
     */
    public function getKlipsPerDashboard()
    {
        return $this->getResource(static::DASHBOARD_KLIPS_PER_TAB);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setViewableDashboards($value)
    {
        return $this->setResource(static::DASHBOARD_TABS_PER_DASHBOARD, $value);
    }

    /**
     * @return mixed
     */
    public function getViewableDashboards()
    {
        return $this->getResource(static::DASHBOARD_TABS_PER_DASHBOARD);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setTotalDashboards($value)
    {
        return $this->setResource(static::DASHBOARD_TABS_TOTAL, $value);
    }

    /**
     * @return mixed
     */
    public function getTotalDashboards()
    {
        return $this->getResource(static::DASHBOARD_TABS_TOTAL);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setDatasourcesPerFormula($value)
    {
        return $this->setResource(static::DATASOURCES_PER_FORMULA, $value);
    }

    /**
     * @return mixed
     */
    public function getDatasourcesPerFormula()
    {
        return $this->getResource(static::DATASOURCES_PER_FORMULA);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setUsers($value)
    {
        return $this->setResource(static::USERS, $value);
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->getResource(static::USERS);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setConcurrentSessions($value)
    {
        return $this->setResource(static::SESSIONS_CONCURRENT, $value);
    }

    /**
     * @return mixed
     */
    public function getConcurrentSessions()
    {
        return $this->getResource(static::SESSIONS_CONCURRENT);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setPrivateLinks($value)
    {
        return $this->setResource(static::PRIVATE_LINKS, $value);
    }

    /**
     * @return mixed
     */
    public function getPrivateLinks()
    {
        return $this->getResource(static::PRIVATE_LINKS);
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setPrivateLinkViewers($value)
    {
        return $this->setResource(static::PRIVATE_LINKS_VIEWERS, $value);
    }

    /**
     * @return mixed
     */
    public function getPrivateLinkViewers()
    {
        return $this->getResource(static::PRIVATE_LINKS_VIEWERS);
    }
}