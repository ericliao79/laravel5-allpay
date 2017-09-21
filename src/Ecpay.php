<?php

namespace ericliao79\l5allpay;

use ericliao79\l5allpay\Criteria\LangType;
use ericliao79\l5allpay\Criteria\PaymentMethod;
use ericliao79\l5allpay\Exceptions\PaymentMethodException;
use ericliao79\l5allpay\Traits\DebugTrait;
use ericliao79\l5allpay\Traits\EcpayTrait;

/**
 * Class Ecpay
 * @property  PaysAbstract MerchantID
 * @property  PaysAbstract HashKey
 * @property  PaysAbstract HashIV
 * @package ericliao79\l5allpay
 */
class Ecpay extends PaysAbstract implements PaysInterface
{
    use EcpayTrait, DebugTrait;

    public function __construct($MerchantID, $HashKey, $HashIV)
    {
        $this->MerchantID = $MerchantID ?? config('allpay.MerchantID');
        $this->HashKey = $HashKey ?? config('allpay.HashKey');
        $this->HashIV = $HashIV ?? config('allpay.HashIV');
        $this->setProviderUrl(config('allpay.Debug'));
        $this->setReturnURL(config('allpay.ReturnURL'));
        $this->setPaymentMethod(config('allpay.paymentMethod'));
        $this->setVersion(config('allpay.Version'));
        $this->setLangType(config('allpay.LangType'));

//        $this->setExpireDate(config('allpay.ExpireDays'));
//        $this->setExpireTime(config('allpay.ExpireTime'));
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

    function __get($name)
    {
        if (!$this->debug) {
            return;
        }

        return $this->$name;
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

    function setPaymentMethod($pay): self
    {
        $fix = [
            PaymentMethod::ALL,
            PaymentMethod::ATM,
            PaymentMethod::WebATM,
            PaymentMethod::Credit,
            PaymentMethod::CVS,
        ];

        if (in_array($pay, $fix)) {
            $this->PaymentMethod = $pay;
        } else {
            throw new PaymentMethodException();
        }

        return $this;
    }

    function setVersion($version): self
    {
        $this->Version = $version;

        return $this;
    }

    function setLangType($lang): self
    {
         $fix = [
            LangType::CHI,
            LangType::ENG,
            LangType::JPN,
            LangType::KOR
        ];

         if (in_array($lang, $fix)) {
             $this->LangType = $lang;
         } else {
             $this->LangType = '';
         }

         return $this;
    }

    function CheckOut()
    {
        if ($this->debug) return;
    }
}
