<?php
namespace Tests\unit;

use ericliao79\l5allpay\Ecpay;
use ericliao79\l5allpay\Criteria\LangType;
use ericliao79\l5allpay\Criteria\PaymentMethod;
use ericliao79\l5allpay\Exceptions\PaymentMethodException;
use PHPUnit\Framework\TestCase;

class allPayTest extends TestCase
{
    private function CreateTarget()
    {
        $MerchantID = '0001';
        $HashKey = 'mai';
        $HashIV = 'eric';

        $target = new Ecpay($MerchantID, $HashKey, $HashIV);
        $target->debug();

        return $target;
    }

    /**
     * @test
     */
    public function 設定服務商API網址()
    {
        /** arrange */
        $ProviderUrl = 'https://payment.ecpay.com.tw/Cashier/';
        $ProviderUrl_debug = 'https://payment-stage.ecpay.com.tw/Cashier/';

        /** act */
        $target = $this->CreateTarget();
        $target->setProviderUrl(true);
        $this->assertSame($ProviderUrl, $target->ProviderUrl);

        $target->setProviderUrl(false);
        $this->assertSame($ProviderUrl_debug, $target->ProviderUrl);

        /** assert */
        $this->assertInstanceOf(Ecpay::class, $target);
    }

    /**
     * @test
     */
    public function 設定付費完成返回網址()
    {
        /** arrange */
        $ReturnURL = 'http://allpay.dev/return/';

        /** act */
        $target = $this->CreateTarget();
        $target->ReturnURL;
        /** assert */
        $this->assertInstanceOf(Ecpay::class, $target);
        $this->assertSame($ReturnURL, $target->ReturnURL);
    }

    /**
     * @test
     */
    public function 版本設置()
    {
        /** arrange */
        $version = "V5";

        /** act */
        $target = $this->CreateTarget();
        $target->setVersion('V5');

        /** assert */
        $this->assertInstanceOf(Ecpay::class, $target);
        $this->assertSame($version, $target->Version);
    }

    /**
     * @test
     */
    public function 語系()
    {
        $target = $this->CreateTarget();

        $target->setLangType('');
        $this->assertSame('', $target->LangType);

        $target->setLangType('ENG');
        $this->assertSame(LangType::ENG, $target->LangType);

        $target->setLangType('KOR');
        $this->assertSame(LangType::KOR, $target->LangType);

        $target->setLangType('JPN');
        $this->assertSame(LangType::JPN, $target->LangType);

        $target->setLangType('CHI');
        $this->assertSame(LangType::CHI, $target->LangType);

        $target->setLangType('CH');
        $this->assertSame('', $target->LangType);

        $this->assertInstanceOf(Ecpay::class, $target);
    }

    /**
     * @test
     */
    public function 付款方式()
    {
        $target = $this->CreateTarget();

        $target->setPaymentMethod('ALL');
        $this->assertSame(PaymentMethod::ALL, $target->PaymentMethod);

        $target->setPaymentMethod('ATM');
        $this->assertSame(PaymentMethod::ATM, $target->PaymentMethod);

        $target->setPaymentMethod('WebATM');
        $this->assertSame(PaymentMethod::WebATM, $target->PaymentMethod);

        $target->setPaymentMethod('CVS');
        $this->assertSame(PaymentMethod::CVS, $target->PaymentMethod);

        $target->setPaymentMethod('Credit');
        $this->assertSame(PaymentMethod::Credit, $target->PaymentMethod);

        //throw PaymentMethodException
        $this->expectException(PaymentMethodException::class);
        $target->setPaymentMethod('TopUpUsed');

        $this->assertInstanceOf(Ecpay::class, $target);
    }

}
