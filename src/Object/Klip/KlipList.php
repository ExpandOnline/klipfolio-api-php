<?php


namespace ExpandOnline\KlipfolioApi\Object\Klip;


use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;

/**
 * Class KlipList
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class KlipList extends BaseApiCollection
{

    /**
     * @param null $option
     * @return string
     */
    public function getEndpoint($option = null)
    {
        return 'klips';
    }

    /**
     * @param array $data
     * @return $this|void
     */
    public function setData($data)
    {
        foreach ($data['klips'] as $item) {
            $user = new Klip($item[Klip::FIELD_ID]);
            $user->setData($item);
            $this->data[] = $user;
        }
    }

    /**
     * @return bool
     */
    public function canRead(){
        return true;
    }

}