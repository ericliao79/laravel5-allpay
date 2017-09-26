<?php

namespace ericliao79\l5allpay;

use ericliao79\l5allpay\Traits\BaseTrait;
use ericliao79\l5allpay\Traits\DebugTrait;
use ericliao79\l5allpay\Traits\Pay2goTrait;

class Pay2go extends PaysAbstract implements PaysInterface
{
    use BaseTrait, DebugTrait, Pay2goTrait;

    public function __construct($MerchantID = null, $HashKey = null, $HashIV = null)
    {
        $this->MerchantID = $MerchantID ?? config('allpay.MerchantID');
        $this->HashKey = $HashKey ?? config('allpay.HashKey');
        $this->HashIV = $HashIV ?? config('allpay.HashIV');
        $this->setPaymentMethod(config('allpay.paymentMethod'));
        $this->setVersion(config('allpay.Version'));
        $this->setLangType(config('allpay.LangType'));
        $this->setTimeStamp();

        $this->setProviderUrl(config('allpay.Debug'));
        $this->setReturnURL(config('allpay.ReturnURL'));
        $this->setNotifyURL(config('allpay.NotifyURL'));
        $this->setCustomerURL(config('allpay.CustomerURL'));
        $this->setClientBackURL(config('allpay.ClientBackURL'));

        $this->setExpireDate(config('allpay.ExpireDays'));
        $this->setExpireTime(config('allpay.ExpireTime'));
    }

    /**
     * 設定金流商網址
     * @param $debug_mode
     * @return mixed
     */
    function setProviderUrl($debug_mode)
    {
        if ($debug_mode)
            $this->ProviderUrl = 'https://ccore.spgateway.com/MPG/mpg_gateway/';
        else
            $this->ProviderUrl = 'https://core.spgateway.com/MPG/mpg_gateway/';
        return $this;
    }

    /**
     * 設定交易方式
     * @param $PaymentMethod
     * @return mixed
     */
    function setPaymentMethod($PaymentMethod)
    {
        //TODO: 交易方式
    }

    /**
     * @param $url
     * @return Pay2go
     */
    function setReturnURL($url): self
    {
        $this->ReturnURL = $url;

        return $this;
    }


    /**
     * 產生訂單
     * @param $order_id string 訂單編號
     * @param $TotalAmount int 總價
     * @param $ItemName array|string 商品名稱
     * @param $ItemDesc string 商品描述
     * @return mixed
     */
    function setOrder($order_id, $TotalAmount, $ItemName, $ItemDesc)
    {

    }

    /**
     * 發送訂單
     * @param $need_form bool 是否需要form
     * @return mixed
     */
    function submitOrder($need_form)
    {

    }

    /**
     * 設定 API 版本
     * @param $version
     * @return Pay2go
     */
    function setVersion($version): self
    {
        $this->Version = $version;

        return $this;
    }

    /**
     * 設定語言: 預設繁體中文
     * @param $lang
     * @return Pay2go
     */
    function setLangType($lang): self
    {
        $this->LangType = $lang;

        return $this;
    }

    /**
     * 設定交易通知連結
     *
     * @param $notify_url
     * @return $this
     */
    function setNotifyURL($notify_url)
    {

    }

    /**
     * 設定客製化連結
     *
     * @param $customer_url
     * @return $this
     */
    function setCustomerURL($customer_url)
    {

    }

    /**
     * 設定交易失敗連結
     *
     * @param $client_back_url
     * @return $this
     */
    function setClientBackURL($client_back_url)
    {

    }

    /**
     * 建立交易時間
     * @return mixed
     */
    function setTimeStamp()
    {

    }

    /**
     * 參數客製化
     * @return array
     */
    function OrderFormatter()
    {

    }

    function setExpireDate($ExpireDate)
    {
        // TODO: Implement setExpireDate() method.
    }


    function setExpireTime($ExpireTime)
    {
        // TODO: Implement setExpireTime() method.
    }

    function getTradeInfo($order)
    {
        // TODO: Implement getTradeInfo() method.
    }
}
