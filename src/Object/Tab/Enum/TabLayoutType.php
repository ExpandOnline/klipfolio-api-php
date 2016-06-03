<?php


namespace ExpandOnline\KlipfolioApi\Object\Tab\Enum;


use ExpandOnline\KlipfolioApi\Util\Enum;

/**
 * Class TabLayoutType
 *
 * Defines a Layout Type for use in a Tab
 * @see http://apidocs.klipfolio.com/docs/tab-layout#put-tabsidlayout
 *
 *
 * @package ExpandOnline\KlipfolioApi\Object\Tab\Enum
 */
class TabLayoutType extends Enum
{
    const TYPE_100 = '100';
    const TYPE_50_50 = '50_50';
    const TYPE_30_60 = '30_60';
    const TYPE_60_30 = '60_30';
    const TYPE_30_30_30 = '30_30_30';
    const TYPE_100_50_50 = '100_50_50';
    const TYPE_100_30_60 = '100_30_60';
    const TYPE_100_60_30 = '100_60_30';
    const TYPE_100_30_30_30 = '100_30_30_30';
    const TYPE_50_50_100 = '50_50_100';
    const TYPE_30_60_100 = '30_60_100';
    const TYPE_60_30_100 = '60_30_100';
    const TYPE_30_30_30_100 = '30_30_30_100';
    const TYPE_100_50_50_100 = '100_50_50_100';
    const TYPE_100_30_60_100 = '100_30_60_100';
    const TYPE_100_60_30_100 = '100_60_30_100';
    const TYPE_100_30_30_30_100 = '100_30_30_30_100';
}