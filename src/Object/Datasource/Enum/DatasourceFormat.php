<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource\Enum;


use ExpandOnline\KlipfolioApi\Util\Enum;

/**
 * Class DatasourceFormat
 * @package ExpandOnline\KlipfolioApi\Object\Datasource\Enum
 */
class DatasourceFormat extends Enum
{
    const FORMAT_CSV = 'csv';
    const FORMAT_XML = 'xml';
    const FORMAT_XLS = 'xls';
    const FORMAT_JSON = 'json';
}