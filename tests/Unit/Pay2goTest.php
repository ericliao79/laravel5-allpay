<?php
namespace Tests\Unit;

use ericliao79\l5allpay\Pay2go;
use Tests\TestCase;

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
    public function setProviderUrl_Test()
    {
        /** arrange */
        $ProviderUrl = 'https://core.spgateway.com/MPG/mpg_gateway/';
        $ProviderUrl_debug = 'https://ccore.spgateway.com/MPG/mpg_gateway/';

        /** act */
        $target = $this->CreateTarget();
        $target->setProviderUrl(false);
        $this->assertSame($ProviderUrl, $target->ProviderUrl);

        $target->setProviderUrl(true);
        $this->assertSame($ProviderUrl_debug, $target->ProviderUrl);

        /** assert */
        $this->assertInstanceOf(Pay2go::class, $target);
    }

    /**
     * @test
     */
    public function ReturnURL()
    {
        /** arrange */
        $ReturnURL = 'http://allpay.dev/return/';

        /** act */
        $target = $this->CreateTarget();
        $target = $target->setReturnURL($ReturnURL);
        /** assert */
        $this->assertInstanceOf(Pay2go::class, $target);
        $this->assertSame($ReturnURL, $target->ReturnURL);
    }

    /**
     * @test
     */
    public function Version()
    {
        /** arrange */
        $ver = 'V1.2';

        /** act */
        $target = $this->CreateTarget();
        $target = $target->setVersion($ver);

        /** assert */
        $this->assertInstanceOf(Pay2go::class, $target);
        $this->assertSame($ver, $target->Version);
    }

    /**
     * @test
     */
    public function LangType()
    {
        $target = $this->CreateTarget();

        $lang = "zh-tw";
        $target->setLangType($lang);

        $this->assertSame($lang, $target->LangType);
        $this->assertInstanceOf(Pay2go::class, $target);
    }
}
