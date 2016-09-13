<?php
namespace ExpandOnline\KlipfolioApi\Tests\Object\UserTabInstance;

use ExpandOnline\KlipfolioApi\Connector\TabKlipInstance\TabKlipInstanceConnector;
use ExpandOnline\KlipfolioApi\Connector\UserTabInstance\UserTabInstanceConnector;
use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;
use ExpandOnline\KlipfolioApi\Object\UserTabInstance\UserTabInstance;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;
use ExpandOnline\KlipfolioApi\Object\TabKlipInstance\TabKlipInstance;

/**
 * Class UserTabInstanceTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\UserTabInstance
 */
class UserTabInstanceTest extends BaseApiResourceTest
{

    /**
     * @param array $params
     * @return UserTabInstanceConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new UserTabInstanceConnector($params);
    }

    /**
     * @return UserTabInstance
     */
    protected function getObjectToTest()
    {
        return new UserTabInstance();
    }

    /**
     *
     */
    public function testValidUpdate()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock($this->getTestData(), $metaData);

        $connector = $this->getConnectorToTest()->setUserId('23348f02a135a64b4ebcbecd66301118');
        $connector->setResource($this->getObjectToTest()->setTabIds([1]));

        $response = $this->getKlipfolio()->save($connector);
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     *
     */
    public function testValidCreate()
    {
        $this->setMock($this->getTestData());

        $this->setExpectedException(\InvalidArgumentException::class);
        $this->getKlipfolio()->save($this->getConnectorToTest([
            'resource' => $this->getObjectToTest()->addTabId(1)
        ]));
    }

    /**
     *
     */
    public function testValidDelete()
    {
        $metaData = [
            'status' => 200,
            'success' => true
        ];
        $this->setMock($this->getTestData(), $metaData);

        $response = $this->getKlipfolio()->delete($this->getConnectorToTest([
            'id' => 1
        ])->setUserId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(Response::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     *
     */
    public function testValidRead()
    {
        $this->setMock($this->getTestData());

        $response = $this->getKlipfolio()->get($this->getConnectorToTest([
            'id' => 1
        ])->setUserId('23348f02a135a64b4ebcbecd66301118'));
        $this->assertInstanceOf(get_class($this->getObjectToTest()), $response);
    }

    /**
     *
     */
    protected function getTestData()
    {
        return [];
    }


}