<?php

namespace ExpandOnline\KlipfolioApi\Tests\Object\Datasource;


use ExpandOnline\KlipfolioApi\Object\Datasource\Datasource;
use ExpandOnline\KlipfolioApi\Object\Datasource\DatasourceHttpTransformer;

class DatasourceHttpTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testIfGetTransformsToPut()
    {
        $testData = [
            'input' => [
                Datasource::FIELD_PROPERTIES => [
                    'parameters' => ['test' => 'yes']
                ]
            ],
            'expected' => [
                Datasource::FIELD_PROPERTIES => [
                    'parameters' => json_encode(['test' => 'yes'])
                ]
            ]
        ];

        $transformer = new DatasourceHttpTransformer();
        $result = $transformer->getTransformed($testData['input']);
        $this->assertSame($testData['expected'], $result);
    }
}