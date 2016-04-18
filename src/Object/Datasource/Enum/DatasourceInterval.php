<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource\Enum;


use ExpandOnline\KlipfolioApi\Util\Enum;

/**
 * Class DatasourceInterval
 * @package ExpandOnline\KlipfolioApi\Object\Datasource\Enum
 */
class DatasourceInterval extends Enum
{
    const INTERVAL_NONE = 0;
    const INTERVAL_MINUTE = 60;
    const INTERVAL_5_MINUTES = 300;
    const INTERVAL_15_MINUTES = 900;
    const INTERVAL_HALF_HOUR = 1800;
    const INTERVAL_HOUR = 3600;
    const INTERVAL_2_HOURS = 7200;
    const INTERVAL_4_HOURS = 14400;
    const INTERVAL_12_HOURS = 43200;
    const INTERVAL_DAY = 86400;
}