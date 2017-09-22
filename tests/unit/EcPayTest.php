<?php
namespace Tests\unit;

use ericliao79\l5allpay\Ecpay;
use ericliao79\l5allpay\Criteria\LangType;
use ericliao79\l5allpay\Criteria\PaymentMethod;
use ericliao79\l5allpay\Exceptions\PaymentMethodException;
use ericliao79\l5allpay\Exceptions\TradeException;
use PHPUnit\Framework\TestCase;

class EcPayTest extends TestCase
{
    private function CreateTarget()
    {
        $MerchantID = '2000132';
        $HashKey = '5294y06JbISpM5x9';
        $HashIV = 'v77hoKGq4kWxNNIS';

        $target = new Ecpay($MerchantID, $HashKey, $HashIV);
        $target->debug();

        return $target;
    }

    /**
     * @test
     */
    public function Pcpay_aio()
    {
        $target = $this->CreateTarget();

        $this->assertSame('aio', $target->PaymentType);
    }

    /**
     * @test
     */
    public function setProviderUrl_Test()
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
    public function ReturnURL()
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
    public function setVersion()
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
    public function setLangType()
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
    public function setPaymentMethod()
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

    /**
     * @test
     */
    public function setOrder()
    {
        $order_id = str_random(16);
        $total = 5000;
        $item = '手機殼';
        $desc = '測試';
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);

        $this->assertSame($order_id, $target->MerchantOrderNo);
        $this->assertSame($total, $target->TotalAmount);
        $this->assertSame($item, $target->ItemName);
        $this->assertSame($desc, $target->ItemDesc);

        $this->assertInstanceOf(Ecpay::class, $order);
    }

    /**
     * @test
     * @group submitOrder
     */
    public function submitOrder()
    {
        $order_id = str_random(16);
        $total = 5000;
        $item = '手機殼';
        $desc = '測試';
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);
        $actual = $order->submitOrder();

        $fx = stripos($actual, 'form') != false ? true : false;
        $this->assertInternalType('string', $actual);
        $this->assertTrue($fx);
    }

    /**
     * @test
     * @group submitOrder
     */
    public function submitOrder_return_array()
    {
        $order_id = str_random(16);
        $total = 5000;
        $item = '手機殼';
        $desc = '測試';
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);
        $actual = $order->submitOrder(false);

        $subset = [
            'url' => 'https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5',
            'data' => [
                'MerchantID' => '2000132',
                'MerchantTradeNo' => $order_id,
                'MerchantTradeDate' => date('Y/m/d H:i:s', $order->TimeStamp),
                'PaymentType' => 'aio',
                'TotalAmount' => $total,
                'TradeDesc' => $desc,
                'ItemName' => $item,
                'ReturnURL' => 'http://allpay.dev/return/',
                'ChoosePayment' => 'ALL',
                'EncryptType' => 1,
            ]
        ];

        $this->assertArrayHasKey('url', $actual);
        $this->assertArrayHasKey('data', $actual);
        $this->assertArrayHasKey('CheckMacValue', $actual['data']);
        $this->assertArraySubset($subset, $actual);
    }

    /**
     * @test
     * @group submitOrder
     */
    public function submitOrder_with_TradeException_MerchantTradeNo()
    {
        $order_id = null;
        $total = 5000;
        $item = '手機殼';
        $desc = '測試';
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);

        // throw TradeException
        $this->expectException(TradeException::class);
        $this->expectExceptionMessage('MerchantTradeNo is null.');
        $actual = $order->submitOrder(false);
    }

    /**
     * @test
     * @group submitOrder
     */
    public function submitOrder_with_TradeException_TotalAmount()
    {
        $order_id = str_random(16);
        $total = null;
        $item = '手機殼';
        $desc = '測試';
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);

        // throw TradeException
        $this->expectException(TradeException::class);
        $this->expectExceptionMessage('TotalAmount is null.');
        $actual = $order->submitOrder(false);
    }

    /**
     * @test
     * @group submitOrder
     */
    public function submitOrder_with_TradeException_ItemName()
    {
        $order_id = str_random(16);
        $total = 5000;
        $item = null;
        $desc = '測試';
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);

        // throw TradeException
        $this->expectException(TradeException::class);
        $this->expectExceptionMessage('ItemName is null.');
        $actual = $order->submitOrder(false);
    }

    /**
     * @test
     * @group submitOrder
     */
    public function submitOrder_with_TradeException()
    {
        $order_id = str_random(16);
        $total = 5000;
        $item = '手機殼';
        $desc = null;
        $target = $this->CreateTarget();
        $order = $target->setOrder($order_id, $total, $item, $desc);

        // throw TradeException
        $this->expectException(TradeException::class);
        $this->expectExceptionMessage('TradeDesc is null.');
        $actual = $order->submitOrder(false);
    }
}
