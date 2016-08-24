<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource\Enum;


use ExpandOnline\KlipfolioApi\Util\Enum;

/**
 * Class DatasourceConnector
 * @package ExpandOnline\KlipfolioApi\Object\Datasource\Enum
 */
class DatasourceConnector extends Enum
{
    const CONNECTOR_BOX = 'box';
    const CONNECTOR_DROPBOX = 'dropbox';
    const CONNECTOR_DB = 'db';
    const CONNECTOR_FACEBOOK = 'facebook';
    const CONNECTOR_FTP = 'ftp';
    const CONNECTOR_GOOGLE_ANALYTICS = 'google_analytics';
    const CONNECTOR_GOOGLE_SPREADSHEETS = 'google_spreadsheets';
    const CONNECTOR_OMNITURE = 'omniture';
    const CONNECTOR_RADIAN6 = 'radian6';
    const CONNECTOR_SALESFORCE = 'salesforce';
    const CONNECTOR_SIMPLE_REST = 'simple_rest';
    const CONNECTOR_XMLA = 'xmla';
    const CONNECTOR_GOOGLE_ADWORDS = 'google_adwords';
}