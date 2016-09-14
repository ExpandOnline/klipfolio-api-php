<?php


namespace Object\Tab;


use ExpandOnline\KlipfolioApi\Object\BaseObject;

/**
 * @property string id
 * @property int minHeight
 * @property array index
 * @property int colSpan
 */
class ItemConfig extends BaseObject
{
    public function __construct($data = ['index' => [0, 0]])
    {
        parent::__construct();
        $this->data = $data;
    }


    public function setKlipInstanceId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->minHeight;
    }

    /**
     * @param $height
     * @return ItemConfig
     */
    public function setHeight($height)
    {
        $this->minHeight = $height;
        return $this;
    }

    /**
     * @return int
     */
    public function getRegion()
    {
        return $this->getIndex()[1];
    }

    /**
     * @param int $region
     * @return ItemConfig
     */
    public function setRegion($region)
    {
        $this->setIndex($this->getPosition(), $region);
        return $this;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->getIndex()[0];
    }

    /**
     * @param mixed $position
     * @return ItemConfig
     */
    public function setPosition($position)
    {
        $this->setIndex($position, $this->getRegion());
        return $this;
    }

    /**
     * @return int
     */
    public function getColumnSpan()
    {
        return $this->colSpan;
    }

    /**
     * @param int $columnSpan
     * @return ItemConfig
     */
    public function setColumnSpan($columnSpan)
    {
        $this->colSpan = $columnSpan;
        return $this;
    }

    /**
     * @param int $position
     * @param int $region
     */
    protected function setIndex($position, $region)
    {
        $this->index = [$position, $region];
    }

    /**
     * @return array
     */
    protected function getIndex()
    {
        return $this->index;
    }
}