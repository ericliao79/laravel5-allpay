<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 15:58
 */

namespace ericliao79\l5allpay;


interface PaysInterface
{
    /**
     * 設定金流商網址
     * @param $debug_mode
     * @return mixed
     */
    function setProviderUrl($debug_mode);

    /**
     * 設定交易方式
     * @param $PaymentMethod
     * @return mixed
     */
    function setPaymentMethod($PaymentMethod);

    /**
     * @param $url
     * @return mixed
     */
    function setReturnURL($url);


    /**
     * 產生訂單
     * @param $order_id string 訂單編號
     * @param $TotalAmount int 總價
     * @param $ItemName array|string 商品名稱
     * @param $ItemDesc string 商品描述
     * @return mixed
     */
    function setOrder($order_id, $TotalAmount, $ItemName, $ItemDesc);

    /**
     * 發送訂單
     * @param $need_form bool 是否需要form
     * @return mixed
     */
    function submitOrder($need_form);

    function setVersion($version);

    /**
     * 設定語言: 預設繁體中文
     * @param $lang
     * @return mixed
     */
    function setLangType($lang);

    /**
     * 設定交易通知連結
     *
     * @param $notify_url
     * @return $this
     */
    function setNotifyURL($notify_url);

    /**
     * 設定客製化連結
     *
     * @param $customer_url
     * @return $this
     */
    function setCustomerURL($customer_url);

    /**
     * 設定交易失敗連結
     *
     * @param $client_back_url
     * @return $this
     */
    function setClientBackURL($client_back_url);

    /**
     * 建立交易時間
     * @return mixed
     */
    function setTimeStamp();

    function OrderFormatter();

    function setCheckValue($data);
}
