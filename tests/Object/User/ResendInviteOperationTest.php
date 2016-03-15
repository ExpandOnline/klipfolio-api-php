<?php namespace ExpandOnline\KlipfolioApi\Tests\Object\User;

use ExpandOnline\KlipfolioApi\Object\User\ResendInviteOperation;
use ExpandOnline\KlipfolioApi\Response;
use ExpandOnline\KlipfolioApi\Tests\KlipfolioApiTestCase;

class ResendInviteOperationTest extends KlipfolioApiTestCase
{
    public function testOperation()
    {
        $this->setMock([]);

        $response = $this->kp->operate(
            new ResendInviteOperation('test-id')
        );

        $this->assertInstanceOf(Response::class, $response);
    }
}