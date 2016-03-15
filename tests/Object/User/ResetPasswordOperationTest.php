<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\User;

use ExpandOnline\KlipfolioApi\Object\User\ResetPasswordOperation;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;

class ResetPasswordOperationTest extends KlipfolioApiTestCase
{
    public function testOperation()
    {
        $this->setMock([]);

        $response = $this->kp->operate(
            new ResetPasswordOperation('test-id')
        );

        $this->assertInstanceOf(Response::class, $response);
    }
}