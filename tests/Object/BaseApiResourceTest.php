<?php


namespace ExpandOnline\KlipfolioApi\Tests\Object;

use ExpandOnline\KlipfolioApi\Object\BaseApiObject;
use ExpandOnline\KlipfolioApi\Object\BaseApiResource;
use ExpandOnline\KlipfolioApi\Response;

abstract class BaseApiResourceTest extends BaseApiObjectTest
{
    public function testCreateWithFlagOff()
    {
        $this->setExpectedException('\ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException');

        $badObject = $this->getMock(get_class($this->getObjectToTest()));
        $badObject->method('canCreate')->willReturn(false);


        /** @var BaseApiResource $badObject */
        $this->getKlipfolio()->save($badObject);
    }

    public function testReadWithFlagOff()
    {
        $this->setExpectedException('\ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException');

        $badObject = $this->getMock(get_class($this->getObjectToTest('test.id')));
        $badObject->method('canRead')->willReturn(false);

        /** @var BaseApiObject $badObject */
        $this->getKlipfolio()->get($badObject);
    }

    public function testUpdateWithFlagOff()
    {
        $this->setExpectedException('\ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException');

        $badObject = $this->getMock(get_class($this->getObjectToTest('test.id')));
        $badObject->method('canUpdate')->willReturn(false);


        /** @var BaseApiResource $badObject */
        $this->getKlipfolio()->save($badObject);
    }

    public function testDeleteWithFlagOff()
    {
        $this->setExpectedException('\ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException');

        $badObject = $this->getMock(get_class($this->getObjectToTest('test.id')));
        $badObject->method('canDelete')->willReturn(false);

        /** @var BaseApiResource $badObject */
        $this->getKlipfolio()->delete($badObject);
    }

    public function testValidCreate()
    {
        $this->setMock([], [
            'status' => 201,
            'location' => '/test/0123456789abcdefabcdef'
        ]);

        /** @var BaseApiResource $object */
        $object = $this->getObjectToTest();

        if ($object->canCreate()) {
            foreach ($this->getTestData() as $key => $value) {
                if (!in_array($key, $object->getReadOnlyFieldNames())) {
                    $object->{$key} = $value;
                };
            }


            $response = $this->getKlipfolio()->save($object);

            $this->assertInstanceOf(Response::class, $response);
        }
    }

    public function testValidRead()
    {
        $this->setMock($this->getTestData());

        /** @var BaseApiObject $object */
        $object = $this->getObjectToTest($this->getTestData()['id']);

        if ($object->canRead()) {
            $object = $this->getKlipfolio()->get($object);

            $this->assertInstanceOf(get_class($this->getObjectToTest()), $object);
        }
    }

    abstract public function testValidUpdate();

    abstract public function testValidDelete();

}