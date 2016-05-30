<?php namespace ExpandOnline\KlipfolioApi\Object\Klip;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class KlipSchema
 * @package ExpandOnline\KlipfolioApi\Object\Klip
 */
class KlipSchema extends BaseApiResource
{
    const FIELD_TITLE = 'title';
    const FIELD_WORKSPACE = 'workspace';
    const FIELD_COMPONENTS = 'components';

    const FIELD_DATASOURCES = 'datasources';


    /**
     * BaseApiResource constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        parent::__construct($data);


        if (!isset($this->{static::FIELD_WORKSPACE})) {
            $this->{static::FIELD_WORKSPACE} = [];
        }

        // Add empty datasource array to object if it doesn't exist yet
        if (!array_key_exists(static::FIELD_DATASOURCES, $this->getWorkspace()) || !is_array($this->getWorkspace()[static::FIELD_DATASOURCES])) {
            $workspace = $this->getWorkspace();
            $workspace[static::FIELD_DATASOURCES] = [];
            $this->setWorkspace($workspace);
        }
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->data[static::FIELD_TITLE];
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->{static::FIELD_TITLE} = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWorkspace()
    {
        return $this->data[static::FIELD_WORKSPACE];
    }

    /**
     * @param $workspace
     * @return $this
     */
    public function setWorkspace($workspace)
    {
        $this->{static::FIELD_WORKSPACE} = $workspace;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getComponents()
    {
        return $this->{static::FIELD_COMPONENTS};
    }

    /**
     * @param $components
     * @return $this
     */
    public function setComponents($components)
    {
        $this->{static::FIELD_COMPONENTS} = $components;

        return $this;
    }

    /**
     * @param $oldDatasourceId
     * @param $newDatasourceId
     */
    public function replaceDatasource($oldDatasourceId, $newDatasourceId)
    {
        return $this->replaceDatasources([$oldDatasourceId => $newDatasourceId]);
    }

    /**
     * @param array $mapping A mapping of $oldValue => $newValue
     */
    public function replaceDatasources($mapping)
    {
        $dataString = json_encode($this->data);
        foreach ($mapping as $old => $new) {
            $dataString = str_replace($old, $new, $dataString);
        }
        $this->data = json_decode($dataString, true);
    }

    /**
     * @param $datasourceId
     * @return $this
     */
    public function addDatasource($datasourceId)
    {
        $datasources = $this->getDatasources();
        $datasources[] = $datasourceId;
        $this->setDatasources($datasources);

        return $this;
    }

    /**
     * @param $datasourceId
     * @return $this
     */
    public function removeDatasource($datasourceId)
    {
        $datasources = $this->getDatasources();
        if (in_array($datasourceId, $datasources)) {
            unset($datasources[array_search($datasourceId, $this->{static::FIELD_WORKSPACE}[static::FIELD_DATASOURCES])]);
            $this->setDatasources($datasources);
        }

        return $this;
    }

    /**
     * @param $datasources
     * @return $this
     */
    public function setDatasources(array $datasources)
    {
        $workspace = $this->getWorkspace();
        $workspace[static::FIELD_DATASOURCES] = $datasources;
        $this->setWorkspace($workspace);

        return $this;
    }

    /**
     * @return array
     */
    public function getDatasources()
    {
        return $this->getWorkspace()[static::FIELD_DATASOURCES];
    }
}