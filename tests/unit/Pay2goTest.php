<?php
require_once __DIR__ . '/../../tools.php';

use ericliao79\l5allpay\Pay2go;
use PHPUnit\Framework\TestCase;

class Pay2goTest extends TestCase
{
    private function CreateTarget()
    {
        $MerchantID = '2000132';
        $HashKey = '5294y06JbISpM5x9';
        $HashIV = 'v77hoKGq4kWxNNIS';

        $target = new Pay2go($MerchantID, $HashKey, $HashIV);
        $target->debug();

        return $target;
    }

    /**
     * @test
     */
    public function Start()
    {
        $this->assertTrue(true);
    }
}
