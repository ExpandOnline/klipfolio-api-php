<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource;


use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Datasource
 * @package ExpandOnline\KlipfolioApi\Object\Datasource
 */
class Datasource extends BaseApiResource
{

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '')
    {
        if ($option == 'id') {
            return 'datasources/' . $this->getId();
        }

        return 'datasources';
    }


    /**
     * @return bool
     */
    public function canRead(){
        return true;
    }

}