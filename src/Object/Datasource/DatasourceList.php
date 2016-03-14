<?php namespace ExpandOnline\KlipfolioApi\Object\Klip;

use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;
use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;

/**
 * Class KlipList
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class DatasourceList extends BaseApiCollection
{
    /**
     * @param null $option
     * @return string
     */
    public function getEndpoint($option = null)
    {
        return 'datasources';
    }

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

    /**
     * @return bool
     */
    public function canRead()
    {
        return true;
    }
}