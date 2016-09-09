<?php namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Connector\BaseApiResourceConnector;
use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Response;

abstract class BaseApiResourceTest extends BaseApiObjectTest
{
    public function testValidCreate()
    {
        $this->setMock([], [
            'status' => 201,
            'location' => '/test/0123456789abcdefabcdef'
        ]);

        /** @var BaseApiResourceConnector $connector */
        $connector = $this->getConnectorToTest();

        if ($connector->canCreate()) {
            /** @var BaseApiResource $object */
            $object = $this->getObjectToTest();

            $object->setData(array_diff_key($this->getTestData(), array_flip($object->getReadOnlyFieldNames())));

            $connector->setResource($object);
            $response = $this->getKlipfolio()->save($connector);

            $this->assertInstanceOf(Response::class, $response);
        }
    }

    public function testValidRead()
    {
        $this->setMock($this->getTestData());

        /** @var BaseApiObject $object */
        $connector = $this->getConnectorToTest(['id' => $this->getTestData()['id']]);

        if ($connector->canRead()) {
            $object = $this->getKlipfolio()->get($connector);

            $this->assertInstanceOf(get_class($this->getObjectToTest()), $object);
        }
    }

    abstract public function testValidUpdate();

    abstract public function testValidDelete();
}