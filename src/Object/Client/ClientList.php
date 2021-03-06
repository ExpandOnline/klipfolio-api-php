<?php namespace ExpandOnline\KlipfolioApi\Object\Client;

use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;
use ExpandOnline\KlipfolioApi\Object\Client\Client;

/**
 * Class KlipList
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class ClientList extends BaseApiCollection
{
    /**
     * @param array $data
     * @return $this|void
     */
    public function setData($data)
    {
        foreach ($data['clients'] as $item) {
            $user = new Client($item[Client::FIELD_ID]);
            $user->setData($item);
            $this->data[] = $user;
        }
    }
}