<?php


namespace ExpandOnline\KlipfolioApi\Tests\Exception;


use ExpandOnline\KlipfolioApi\Exception\KlipfolioApiException;

class KlipfolioApiExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testIfExceptionCanBeThrown()
    {
        $this->setExpectedException(KlipfolioApiException::class);
        throw new KlipfolioApiException('test');
    }

}