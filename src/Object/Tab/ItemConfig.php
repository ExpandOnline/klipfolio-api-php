<?php


namespace ExpandOnline\KlipfolioApi\Object\Tab;


use ExpandOnline\KlipfolioApi\Object\BaseObject;

/**
 * @property string id
 * @property int minHeight
 * @property array index
 * @property int colSpan
 * @property int height
 */
class ItemConfig extends BaseObject
{
    public function __construct($data = ['index' => [0, 0]])
    {
        parent::__construct();
        $this->setData($data);
    }


    /**
     * @return array
     */
    public function getData()
    {
        $data = $this->data;
        $data['id'] = 'gridklip-' . $data['id'];
        return $data;
    }

    public function setData(array $data)
    {
        if (array_key_exists('id', $data)) {
            $data['id'] = substr($data['id'], 9);
        }
        return parent::setData($data);
    }

    /**
     * @param $id
     * @return $this
     */
    public function setKlipInstanceId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getKlipInstanceId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        if(array_key_exists('height', $this->data)) {
            return $this->height;
        }
        return $this->minHeight;
    }

    /**
     * @param $height
     * @return ItemConfig
     */
    public function setHeight($height)
    {
        $this->height = $height;
        $this->minHeight = $height - 1;
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