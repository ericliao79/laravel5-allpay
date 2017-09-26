<?php
namespace Tests\Unit;

use ericliao79\l5allpay\Allpay;
use ericliao79\l5allpay\Opay;
use ericliao79\l5allpay\Pay2go;
use Tests\TestCase;

class AllpayTest extends TestCase
{
    /**
     * @test
     * @group now
     */
    public function TestCreateOpay()
    {
        $target = $this->app->make(Allpay::class);
        $inst= $target::create('Opay');

        $this->assertInstanceOf(Allpay::class, $target);
        $this->assertInstanceOf(Opay::class, $inst);
    }

    /**
     * @test
     * @group now
     */
    public function TestCreatePay2go()
    {
        $target = $this->app->make(Allpay::class);
        $inst= $target::create('Pay2go');

        $this->assertInstanceOf(Allpay::class, $target);
        $this->assertInstanceOf(Pay2go::class, $inst);
    }
}
