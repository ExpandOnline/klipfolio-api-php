<?php namespace ExpandOnline\KlipfolioApi\Object\TabKlipInstance;

use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\BaseApiCollection;

/**
 * Class TabKlipInstanceList
 * @package ExpandOnline\KlipfolioApi\Object\TabKlipInstance
 */
class TabKlipInstanceList extends BaseApiCollection
{
    /**
     * @param array $data
     * @return $this|void
     * @throws KlipfolioApiException
     */
    public function setData(array $data)
    {
        if (!array_key_exists('klip_instances', $data)) {
            throw new KlipfolioApiException('No klip instances found in data! Data array: ' . json_encode($data));
        }
        foreach ($data['klip_instances'] as $item) {
            $klipInstance = new TabKlipInstance($item[TabKlipInstance::FIELD_ID]);
            $klipInstance->setData($item);
            $this->data[] = $klipInstance;
        }
    }
}