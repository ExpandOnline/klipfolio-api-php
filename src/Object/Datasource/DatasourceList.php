<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

/**
 * Class KlipList
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 *
 * @property array $datasources
 */
class DatasourceList extends BaseApiCollection
{
    /**
     * BaseApiCollection constructor.
     * @param array $data
     */
    public function __construct($data = []) {
        $this->data['datasources'] = [];
        $this->setData($data);
    }

    /**
     * @return mixed
     */
    public function getDatasources() {
        return $this->data['datasources'];
    }

    /**
     * @param array $data
     * @return $this|void
     */
    public function setData(array $data)
    {
        foreach ($data['datasources'] as $item) {
            $user = new Datasource($item);
            $this->data['datasources'][] = $user;
        }
    }
}