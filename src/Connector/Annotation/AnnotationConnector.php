<?php namespace ExpandOnline\KlipfolioApi\Connector\Client;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\Annotation\Annotation;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;


class AnnotationConnector extends BaseApiResourceConnector {

    /**
     * @var string
     */
    private $klipId;

    /**
     * @param string $option
     * @return string
     */
    public function getEndpoint($option = '') {
        if (empty($this->klipId)) {
            throw new \InvalidArgumentException('Missing required klipId field. Use ->setKlipId to set it.');
        }
        if ($option == 'id') {
            return 'klips/' . $this->getKlipId() . '/annotations/' . $this->getId();
        }

        return 'klips/' . $this->getKlipId() . '/annotations';
    }

    /**
     * @return BaseApiObject
     */
    protected function getObjectName() {
        return Annotation::class;
    }

    /**
     * @return bool
     */
    public function canRead() {
        return true;
    }

    /**
     * @return bool
     */
    public function canCreate() {
        return true;
    }

    /**
     * @return bool
     */
    public function canDelete() {
        return true;
    }

    /**
     * @return bool
     */
    public function canUpdate() {
        return true;
    }

    /**
     * @return string
     */
    public function getKlipId() {
        return $this->klipId;
    }

    /**
     * @param string $klipId
     * @return $this
     */
    public function setKlipId($klipId) {
        $this->klipId = $klipId;
        return $this;
    }
}