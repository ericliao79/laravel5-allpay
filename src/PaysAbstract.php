<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 16:16
 */

namespace ericliao79\l5allpay;


abstract class PaysAbstract
{
    /**
     * @var 店家編號
     */
    protected $MerchantID;

    /**
     * @var HashKey
     */
    protected $HashKey;

    /**
     * @var HashIV
     */
    protected $HashIV;

    /**
     * @var 供應商 url
     */
    protected $ProviderUrl;

    /**
     * @var 付款方式
     */
    protected $PaymentMethod;

    /**
     * @var 語言設定
     */
    protected $LangType;

    /**
     * @var 供應商 api 版本
     */
    protected $Version;







    protected $InstFlag;
    protected $CheckValue;
    protected $TimeStamp;

    protected $RespondType;
    protected $TradeLimit;
    protected $ExpireDate;
    protected $ExpireTime;
    protected $OrderComment;
    protected $LoginType;
    protected $EmailModify;
    protected $ClientBackURL;
    protected $CustomerURL;
    protected $NotifyURL;
    protected $ReturnURL;
    protected $MerchantOrderNo;
    protected $ItemDesc;
    protected $Email;
    protected $Amt;
}
