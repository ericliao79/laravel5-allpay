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

    function setPaymentMethod($PaymentMethod);

    function setReturnURL($url);

    /**
     * 產生訂單
     * @return mixed
     */
    function CheckOut();
}
