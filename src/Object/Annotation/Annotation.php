<?php
namespace ExpandOnline\KlipfolioApi\Object\Annotation;

use ExpandOnline\KlipfolioApi\Object\BaseApiResource;

/**
 * Class Annotation
 * @package ExpandOnline\KlipfolioApi\Object\Annotation
 *
 * @property string body
 * @property-read string $date_created
 * @property-read array $createdBy
 */
class Annotation extends BaseApiResource {

    protected $readOnlyFieldNames = [
        'id', 'createdBy', 'date_created'
    ];

    /**
     * @return string
     */
    public function getBody() {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body) {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * @return array
     */
    public function getCreatedBy() {
        return $this->createdBy;
    }
}