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
    /**
     * BaseApiResource constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        if (!array_key_exists('resources', $data)) {
            $this->resources = [];
        }
    }

    /**
     * @param string $name
     * @param string $value
     * @return $thisw
     */
    public function setResource($name, $value)
    {
        foreach ($this->data['resources'] as &$resource) {
            if ($resource['name'] === $name) {
                $resource['value'] = $value;
                return $this;
            }
        }
        $this->data['resources'][] = ['name' => $name, 'value' => $value];
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
        return array_search($name, array_column($this->getResources(), 'name'));
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setApiCallsPerSecond($value)
    {
        return $this->setResource('api.requests.perSecond', $value);
    }

    /**
     * @return mixed
     */
    public function getApiCallsPerSecond()
    {
        return $this->getResource('API Calls per Second');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setApiAppendDataSize($value)
    {
        return $this->setResource('api.append.data.size', $value);
    }

    /**
     * @return mixed
     */
    public function getApiAppendDataSize()
    {
        return $this->getResource('API Append Data Size (in KB)');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setKlipsPerDashboard($value)
    {
        return $this->setResource('dashboard.klips.perTab', $value);
    }

    /**
     * @return mixed
     */
    public function getKlipsPerDashboard()
    {
        return $this->getResource('Klips per Dashboard');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setViewableDashboards($value)
    {
        return $this->setResource('dashboard.tabs.perDashboard', $value);
    }

    /**
     * @return mixed
     */
    public function getViewableDashboards()
    {
        return $this->getResource('Maximum viewable Dashboards');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setTotalDashboards($value)
    {
        return $this->setResource('dashboard.tabs.total', $value);
    }

    /**
     * @return mixed
     */
    public function getTotalDashboards()
    {
        return $this->getResource('Dashboards');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setDatasourcesPerFormula($value)
    {
        return $this->setResource('workspace.datasources.perFormula', $value);
    }

    /**
     * @return mixed
     */
    public function getDatasourcesPerFormula()
    {
        return $this->getResource('Data Sources per Formula');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setUsers($value)
    {
        return $this->setResource('company.seats', $value);
    }

    /**
     * @return mixed
     */
    public function getUsers()
    {
        return $this->getResource('Users');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setConcurrentSessions($value)
    {
        return $this->setResource('sessions.concurrent', $value);
    }

    /**
     * @return mixed
     */
    public function getConcurrentSessions()
    {
        return $this->getResource('Concurrent Sessions');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setPrivateLinks($value)
    {
        return $this->setResource('published.private.links', $value);
    }

    /**
     * @return mixed
     */
    public function getPrivateLinks()
    {
        return $this->getResource('Private Links');
    }

    /**
     * @param $value
     * @return ClientResource
     */
    public function setPrivateLinkViewers($value)
    {
        return $this->setResource('published.private.concurrent', $value);
    }

    /**
     * @return mixed
     */
    public function getPrivateLinkViewers()
    {
        return $this->getResource('Private Link Viewers');
    }
}