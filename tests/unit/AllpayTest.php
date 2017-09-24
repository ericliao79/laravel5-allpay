<?php
require_once __DIR__ . '/../../tools.php';

use ericliao79\l5allpay\Allpay;
use ericliao79\l5allpay\Opay;
use ericliao79\l5allpay\Pay2go;
use PHPUnit\Framework\TestCase;

class AllpayTest extends TestCase
{
    /**
     * @test
     * @group now
     */
    public function TestCreateOpay()
    {
        $inst = Allpay::create('Opay');

        $this->assertInstanceOf(Opay::class, $inst);
    }

    /**
     * @test
     * @group now
     */
    public function TestCreatePay2go()
    {
        $inst = Allpay::create('Pay2go');

        $this->assertInstanceOf(Pay2go::class, $inst);
    }
}
