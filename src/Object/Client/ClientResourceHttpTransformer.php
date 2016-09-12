<?php


namespace Object\Client;


use ExpandOnline\KlipfolioApi\Object\Client\ClientResource;

class ClientResourceHttpTransformer
{
    protected $map = [
        ClientResource::API_REQUESTS_PER_DAY => 'API Calls per Day',
        ClientResource::API_REQUESTS_PER_SECOND => 'API Calls per Second',
        ClientResource::API_APPEND_DATA_SIZE => 'API Append Data Size (in KB)',
        ClientResource::DASHBOARD_KLIPS_PER_TAB => 'Klips per Dashboard',
        ClientResource::DASHBOARD_TABS_PER_DASHBOARD => 'Maximum viewable Dashboards',
        ClientResource::DASHBOARD_TABS_TOTAL => 'Dashboards',
        ClientResource::DATASOURCES_PER_FORMULA => 'Data Sources per Formula',
        ClientResource::USERS => 'Users',
        ClientResource::SESSIONS_CONCURRENT => 'Concurrent Sessions',
        ClientResource::PRIVATE_LINKS => 'Private Links',
        ClientResource::PRIVATE_LINKS_VIEWERS => 'Private Link Viewers'
    ];

    /**
     * Replaces GET strings like "Private Links" with PUT strings (published.private.links)
     *
     * $data looks like [
     *      ['name' => 'Something from $map', 'value' => '']...
     * ]
     *
     * @param $data
     * @return array
     */
    public function transformGetToPut($data)
    {
        // Fix ridiculous klipfolio GET/PUT difference
        foreach ($data[ClientResource::FIELD_RESOURCES] as &$resource) {
            if (in_array($resource['name'], $this->map)) {
                $resource['name'] = array_search($resource['name'], $this->map);
            }
        }
        return $data;
    }

    /**
     * KLIPFOLIO BUG!
     * When value of ClientResource resource is falsey (0), Klipfolio gives an API error.
     *
     * $data looks like [
     *      ['name' => '', 'value' => '']...
     * ]
     *
     * @param $data
     * @return mixed
     */
    public function withoutFalseyValues($data)
    {
        for ($i = 0; $i < count($data[ClientResource::FIELD_RESOURCES]); $i++) {
            if (!$data[ClientResource::FIELD_RESOURCES][$i]['value']) {
                unset($data[ClientResource::FIELD_RESOURCES][$i]);
            }
        }

        // Resort array
        $data[ClientResource::FIELD_RESOURCES] = array_values($data[ClientResource::FIELD_RESOURCES]);

        return $data;
    }
}