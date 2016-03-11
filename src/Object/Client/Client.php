<?php


namespace ExpandOnline\KlipfolioApi\Object\Client;


use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Datasource
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class Client extends BaseApiResource
{

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'clients/' . $this->getId();
        }

        return 'clients';
    }


    /**
     * @return bool
     */
    public function canRead(){
        return true;
    }

}