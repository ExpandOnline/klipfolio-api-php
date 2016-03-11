<?php


namespace ExpandOnline\KlipfolioApi\Object\Klip;


use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Klip
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class Klip extends BaseApiResource
{

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'klips/' . $this->getId();
        }

        return 'klips';
    }


    /**
     * @return bool
     */
    public function canRead(){
        return true;
    }
    /**
     * @return bool
     */
    public function canCreate(){
        return true;
    }
    /**
     * @return bool
     */
    public function canUpdate(){
        return true;
    }

}