<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 16:16
 */

namespace ericliao79\l5allpay;

/**
 * Class PaysAbstract
 * @package ericliao79\l5allpay
 * @property  string MerchantID
 * @property  string HashKey
 * @property  string HashIV
 * @property string ClientBackURL
 * @property string ProviderUrl
 * @property string PaymentMethod
 * @property string MerchantOrderNo
 * @property int TotalAmount
 * @property string ItemName
 * @property string ItemDesc
 * @property string ReturnURL
 * @property string Version
 * @property string LangType
 * @property string TimeStamp
 */
abstract class PaysAbstract
{
    /**
     * @var string 店家編號
     */
    protected $MerchantID;

    /**
     * @var string HashKey
     */
    protected $HashKey;

    /**
     * @var string HashIV
     */
    protected $HashIV;

    /**
     * @var string 供應商 url
     */
    protected $ProviderUrl;

    /**
     * @var string 付款方式
     */
    protected $PaymentMethod;

    /**
     * @var string 語言設定
     */
    protected $LangType;

    /**
     * @var string 供應商 api 版本
     */
    protected $Version;

    /**
     * @var string 訂單編號
     */
    protected $MerchantOrderNo;

    /**
     * @var string 訂單名稱
     */
    protected $ItemName;

    /**
     * @var string 訂單資訊
     */
    protected $ItemDesc;

    /**
     * @var int 訂單總價
     */
    protected $TotalAmount;

    /**
     * @var string 檢查碼
     */
    protected $CheckValue;


    protected $InstFlag;
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
    protected $Email;
}
