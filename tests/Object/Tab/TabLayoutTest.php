<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\Tab;

use ExpandOnline\KlipfolioApi\Connector\Klip\KlipSchemaConnector;
use ExpandOnline\KlipfolioApi\Connector\Tab\TabLayoutConnector;
use ExpandOnline\KlipfolioApi\Object\Tab\Enum\TabLayoutType;
use ExpandOnline\KlipfolioApi\Object\Tab\ItemConfig;
use ExpandOnline\KlipfolioApi\Object\Tab\TabLayout;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\Object\BaseApiResourceTest;

/**
 * Class TabLayoutTest
 * @package ExpandOnline\KlipfolioApi\Tests\Object\Klip
 */
class TabLayoutTest extends BaseApiResourceTest
{

    /**
     * @param array $params
     * @return KlipSchemaConnector
     */
    protected function getConnectorToTest($params = [])
    {
        return new TabLayoutConnector($params);
    }

    /**
     * @return TabLayout
     */
    protected function getObjectToTest($data = [])
    {
        return new TabLayout($data);
    }

    /**
     * @return array
     */
    protected function getTestData()
    {
        return [
            'id' => 'test.id',
            'type' => TabLayoutType::TYPE_100,
            'state' => [
                TabLayout::FIELD_DESKTOP => [
                    TabLayout::FIELD_ITEMCONFIGS => [
                        [
                            'id' => 'test_itemconfig.id',
                            'minHeight' => '300',
                            'index' => [0, 0],
                            'colSpan' => 2
                        ]
                    ]
                ]
            ]
        ];
    }

    public function testValidCreate()
    {
        $this->assertFalse($this->getConnectorToTest()->canCreate());
    }

    public function testValidUpdate()
    {
        $this->setMock([], [
            'status' => 200,
            'success' => true
        ]);

        $connector = $this->getConnectorToTest();
        $layout = $this->getObjectToTest(['id' => $this->getTestData()['id']]);
        $layout->setType($this->getTestData()['type']);
        $connector->setResource($layout);
        $response = $this->getKlipfolio()->save($connector);

        $this->assertEquals('tabs/test.id/layout', $connector->getEndpoint());
        $this->assertEquals(['type' => $this->getTestData()['type']], $connector->getDataForUpdate());
        $this->assertInstanceOf(Response::class, $response);
    }

    public function testValidDelete()
    {
        $this->assertFalse($this->getConnectorToTest()->canDelete());
    }

    public function testIfItemConfigIsObjectAtConstruct()
    {
        $tabLayout = new TabLayout($this->getTestData());
        $this->assertInstanceOf(ItemConfig::class, $tabLayout->getState()[TabLayout::FIELD_DESKTOP][TabLayout::FIELD_ITEMCONFIGS][0]);
    }

    public function testIfItemConfigIsArrayOnGetData()
    {
        $tabLayout = new TabLayout($this->getTestData());
        $this->assertInternalType(
            'array',
            $tabLayout->getData()['state'][TabLayout::FIELD_DESKTOP][TabLayout::FIELD_ITEMCONFIGS][0]
        );
    }
}