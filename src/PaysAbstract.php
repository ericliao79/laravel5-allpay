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
    protected $CreditRed;
    protected $InstFlag;
    protected $CheckValue;
    protected $MerchantID;
    protected $HashKey;
    protected $HashIV;

    protected $ProviderUrl;
    protected $PaymentMethod;

    protected $Version;
    protected $CREDIT;
    protected $TimeStamp;
    protected $UNIONPAY;
    protected $WEBATM;
    protected $VACC;
    protected $BARCODE;
    protected $CVS;
    protected $CUSTOM;
    protected $LangType;
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
