<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource;

class DatasourceHttpTransformer
{
    /**
     * @param $data
     * @return mixed
     */
    public function getTransformed($data)
    {
        if ($this->parametersExists($data)) {
            $data[Datasource::FIELD_PROPERTIES]['parameters'] = $this->getEncodedParameters($data[Datasource::FIELD_PROPERTIES]['parameters']);
        }
        return $data;
    }

    /**
     * @return string
     */
    protected function getEncodedParameters($parameters)
    {
        return json_encode($parameters);
    }

    protected function parametersExists($data)
    {
        return array_key_exists(Datasource::FIELD_PROPERTIES, $data) &&
        is_array($data[Datasource::FIELD_PROPERTIES]) &&
        array_key_exists('parameters', $data[Datasource::FIELD_PROPERTIES]) &&
        is_array($data[Datasource::FIELD_PROPERTIES]['parameters']);
    }
}