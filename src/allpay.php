<?php
namespace ericliao79\l5allpay;

use ericliao79\l5allpay\Criteria\PaymentMethod;

/**
 * Class allpay
 * @property  PaysAbstract MerchantID
 * @property  PaysAbstract HashKey
 * @property  PaysAbstract HashIV
 * @package ericliao79\l5allpay
 */
class allpay extends PaysAbstract implements PaysInterface
{
    public function __construct($MerchantID, $HashKey, $HashIV)
    {
        $this->MerchantID = $MerchantID ?? config('allpay.MerchantID');
        $this->HashKey = $HashKey ?? config('allpay.HashKey');
        $this->HashIV = $HashIV ?? config('allpay.HashIV');
        $this->setProviderUrl(config('allpay.Debug'));
        $this->setReturnURL(config('allpay.ReturnURL'));
        $this->setPaymentMethod(config('allpay.paymentMethod'));


//
//
//
//        $this->setExpireDate(config('allpay.ExpireDays'));
//        $this->setExpireTime(config('allpay.ExpireTime'));
//        $this->setVersion(config('allpay.Version'));
//        $this->setLangType(config('allpay.LangType'));
//        $this->setRespondType(config('allpay.RespondType'));
//        $this->setEmailModify(config('allpay.EmailModify'));
//        $this->setTradeLimit(config('allpay.TradeLimit'));
//        $this->setOrderComment(config('allpay.OrderComment'));
//        $this->setClientBackURL(config('allpay.ClientBackURL'));
//        $this->setCustomerURL(config('allpay.CustomerURL'));
//        $this->setNotifyURL(config('allpay.NotifyURL'));
//        $this->setTimeStamp();
    }

    function setProviderUrl($debug_mode): self
    {
        if ($debug_mode)
            $this->ProviderUrl = 'https://payment.ecpay.com.tw/Cashier/';
        else
            $this->ProviderUrl = 'https://payment-stage.ecpay.com.tw/Cashier/';
        return $this;
    }


    function setReturnURL($url): self
    {
        $this->ReturnURL = $url;

        return $this;
    }

    function setPaymentMethod($pay = PaymentMethod::ALL): self
    {
        switch ($pay) {
            case PaymentMethod::ALL:
                $this->PaymentMethod = $pay;
                break;
            case PaymentMethod::ATM:
                $this->PaymentMethod = $pay;
                break;
            case PaymentMethod::Credit:
                $this->PaymentMethod = $pay;
                break;
            case PaymentMethod::CVS:
                $this->PaymentMethod = $pay;
                break;
            case PaymentMethod::Tenpay:
                $this->PaymentMethod = $pay;
                break;
            case PaymentMethod::WebATM:
                $this->PaymentMethod = $pay;
                break;
            case PaymentMethod::TopUpUsed:
                $this->PaymentMethod = $pay;
                break;
            default:
                throw new \Exception();
        }

        return $this;
    }



    function CheckOut($target = "_self")
    {

    }

    public function test()
    {
    }
}
