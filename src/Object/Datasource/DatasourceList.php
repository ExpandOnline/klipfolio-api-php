<?php namespace ExpandOnline\KlipfolioApi\Object\Datasource;

use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

/**
 * Class KlipList
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class DatasourceList extends BaseApiCollection
{
    /**
     * @param array $data
     * @return $this|void
     */
    public function setData($data)
    {
        foreach ($data['datasources'] as $item) {
            $user = new Datasource($item[Datasource::FIELD_ID]);
            $user->setData($item);
            $this->data[] = $user;
        }
    }
}