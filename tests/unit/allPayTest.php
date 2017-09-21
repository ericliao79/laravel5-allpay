<?php
namespace Tests;

use ericliao79\l5allpay\allpay;
use PHPUnit\Framework\TestCase;

class allPayTest extends TestCase
{
    /**
     * @test
     */
    public function 測試發送訂單()
    {
        $mock = $this->createMock(allpay::class);
        $mock->expects($this->once())
            ->method('calculateFee')
            ->withAnyParameters();
            //->willReturn(110);





        $this->assertTrue(true);
    }
}
