<?php


namespace ExpandOnline\KlipfolioApi\Object\Datasource;

class DatasourceHttpTransformer
{

    protected $ds;

    /**
     * DatasourceHttpTransformer constructor.
     * @param Datasource $ds
     */
    public function __construct(Datasource $ds) {
        $this->ds = $ds;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getTransformed($data) {
        $data[Datasource::FIELD_PROPERTIES]['parameters'] = $this->getEncodedParameters();
        return $data;
    }

    /**
     * @return string
     */
    protected function getEncodedParameters()
    {
        $parameters = $this->ds->getProperties()->getParameters()->getData();
        return json_encode($parameters);
    }
}