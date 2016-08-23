<?php namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Connector\BaseApiConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;

/**
 * Class BaseApiObjectTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object
 */
abstract class BaseApiObjectTest extends KlipfolioApiTestCase
{
    /** @return BaseApiObject */
    abstract protected function getObjectToTest();

    /**
     * @param null $id
     * @return BaseApiConnector
     */
    abstract protected function getConnectorToTest($id = null);

    abstract protected function getTestData();

    public function testInvalidFields()
    {
        /** @var BaseApiObject $object */
        $object = $this->getObjectToTest();

        if (!empty($object->getReadOnlyFieldNames())) {
            $this->setExpectedException('\ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException');

            foreach ($object->getReadOnlyFieldNames() as $fieldName) {
                $object->{$fieldName} = 'test_if_field_can_not_be_set';
            }
        }
    }
}