<?php


namespace ExpandOnline\KlipfolioApi\Tests\Exception;

use ExpandOnline\KlipfolioApi\Exception\NotImplementedException;

class NotImplementedExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testIfExceptionCanBeThrown()
    {
        $this->setExpectedException(NotImplementedException::class);
        throw new NotImplementedException('test');
    }

}