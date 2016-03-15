<?php namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Response;

abstract class BaseApiResourceTest extends BaseApiObjectTest
{
    public function testValidCreate()
    {
        $this->setMock([], [
            'status' => 201,
            'location' => '/test/0123456789abcdefabcdef'
        ]);


        $connector = $this->getConnectorToTest();

        if ($connector->canCreate()) {
            $object = $this->getObjectToTest();

            foreach ($this->getTestData() as $key => $value) {
                if (!in_array($key, $object->getReadOnlyFieldNames())) {
                    $object->{$key} = $value;
                };
            }

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