<?php

return [
    // 測試模式
    'Debug' => env('ALLPAY_DEBUG_MODE', false),

    //歐付寶商店代號
    'MerchantID' => env('ALLPAY_STORE_ID'),

    //歐付寶 HashKey
    'HashKey' => env('ALLPAY_HASH_KEY'),

    //歐付寶 HashKey
    'HashIV' => env('ALLPAY_HASH_IV'),

    /*
     * 回傳格式
     *
     * json | html
     */
    'RespondType' => 'JSON',

    /*
     * 串接版本
     */
    'Version' => 'V5',

    /*
     * 語系
     * zh-tw | en
     */
    'LangType' => 'zh-tw',

    /*
     * 是否需要登入智付寶會員
     */
    'LoginType' => false,

    /*
     * 交易秒數限制
     *
     * default: null
     * null: 不限制
     * 秒數下限為 60 秒，當秒數介於 1~59 秒時，會以 60 秒計算
     */
    'TradeLimit' => null,

    /*
     * 繳費-有效天數
     *
     * default: 7
     * maxValue: 180
     */
    'ExpireDays' => 7,
    /*
     * 繳費-有效時間(僅適用超商代碼交易)
     *
     * default: 235959
     * 格式為 date('His') ，例：235959
     */
    'ExpireTime' => '235959',

    /*
     * 付款完成-後導向頁面
     *
     * 僅接受 port 80 or 443
     */
    'ReturnURL' => env('ALLPAY_ReturnUrl') != null ? env('APP_URL') . env('ALLPAY_ReturnUrl') : null,
    /*
     * 付款完成-後的通知連結
     *
     * 以幕後方式回傳給商店相關支付結果資料
     * 僅接受 port 80 or 443
     */
    'NotifyURL' => env('ALLPAY_NotifyURL') != null ? env('APP_URL') . env('ALLPAY_NotifyURL') : null,
    /*
     * 商店取號網址
     *
     * 此參數若為空值，則會顯示取號結果在智付寶頁面。
     * default: null
     */
    'CustomerURL' => null,

    /*
     * 付款取消-返回商店網址
     *
     * default: null
     */
    'ClientBackURL' => env('CASH_Client_BackUrl') != null ? env('APP_URL') . env('CASH_Client_BackUrl') : null,
    /*
     * 付款人電子信箱是否開放修改
     *
     * default: false
     */
    'EmailModify' => false,
    /*
     * 商店備註
     *
     * 1.限制長度為 300 字。
     * 2.若有提供此參數，將會於 MPG 頁面呈現商店備註內容。
     * default: null
     */
    'OrderComment' => '商店備註',

    /**
     * 付款方式
     * ALL: 不指定
     * Credit: 信用卡
     * WebATM: WebATM
     * ATM: ATM
     * CVS: 超商代碼
     * Tenpay: 財付通
     * TopUpUsed: 儲值消費
     */

    'paymentMethod' => 'ALL',
    /*
     * 是否啟用自定義支付
     *
     * 1. 自訂支付是提供商店可新增自訂的支付方式選項於智付寶付款頁，讓付款人進行選擇。
     * 2. 新增自訂支付欄位需於智付寶平台/商店設定中進行設定，最多可啟用 5 個新增自訂支付欄位。
     * 3. 當此參數為 1 時，則表示啟用所有於平台設定為啟用的自訂支付。
     *
     * default: false
     */
    'CUSTOM' => false

];
