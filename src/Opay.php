<?php

namespace ericliao79\l5allpay;

use ericliao79\l5allpay\Criteria\EncryptType;
use ericliao79\l5allpay\Criteria\LangType;
use ericliao79\l5allpay\Criteria\PaymentMethod;
use ericliao79\l5allpay\Exceptions\PaymentMethodException;
use ericliao79\l5allpay\Traits\BaseTrait;
use ericliao79\l5allpay\Traits\DebugTrait;
use ericliao79\l5allpay\Traits\OpayTrait;
use ericliao79\l5allpay\Validation\OpayValidates;

/**
 * Class OPay
 * @property  PaysAbstract MerchantID
 * @property  PaysAbstract HashKey
 * @property  PaysAbstract HashIV
 * @package ericliao79\l5allpay
 */
class Opay extends PaysAbstract implements PaysInterface
{
    use BaseTrait, OpayTrait, DebugTrait, OpayValidates;

    public function __construct($MerchantID = null, $HashKey = null, $HashIV = null)
    {
        $this->MerchantID = $MerchantID ?? config('allpay.MerchantID');
        $this->HashKey = $HashKey ?? config('allpay.HashKey');
        $this->HashIV = $HashIV ?? config('allpay.HashIV');
        $this->setProviderUrl(config('allpay.Debug'));
        $this->setReturnURL(config('allpay.ReturnURL'));
        $this->setPaymentMethod(config('allpay.paymentMethod'));
        $this->setVersion(config('allpay.Version'));
        $this->setLangType(config('allpay.LangType'));
        $this->setTimeStamp();

//        $this->setExpireDate(config('allpay.ExpireDays'));
//        $this->setExpireTime(config('allpay.ExpireTime'));
//        $this->setRespondType(config('allpay.RespondType'));
//        $this->setEmailModify(config('allpay.EmailModify'));
//        $this->setTradeLimit(config('allpay.TradeLimit'));
//        $this->setOrderComment(config('allpay.OrderComment'));
//        $this->setClientBackURL(config('allpay.ClientBackURL'));
//        $this->setCustomerURL(config('allpay.CustomerURL'));
//        $this->setNotifyURL(config('allpay.NotifyURL'));
//
    }

    function __get($name)
    {
        if (!$this->debug) {
            return;
        }

        return $this->$name;
    }

    public function setProviderUrl($debug_mode): self
    {
        if ($debug_mode)
            $this->ProviderUrl = 'https://payment-stage.ecpay.com.tw/Cashier/';
        else
            $this->ProviderUrl = 'https://payment.ecpay.com.tw/Cashier/';
        return $this;
    }

    public function setReturnURL($url): self
    {
        $this->ReturnURL = $url;

        return $this;
    }

    public function setPaymentMethod($pay): self
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

    public function setVersion($version): self
    {
        $this->Version = $version;

        return $this;
    }

    public function setLangType($lang): self
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

    public function setNotifyURL($notify_url)
    {
        if ($notify_url != null)
            $this->NotifyURL = $notify_url;
        return $this;
    }

    public function setCustomerURL($customer_url)
    {
        if ($customer_url != null)
            $this->CustomerURL = $customer_url;
        return $this;
    }

    public function setClientBackURL($client_back_url)
    {
        if ($client_back_url != null)
            $this->ClientBackURL = $client_back_url;
        return $this;
    }

    function setOrder($order_id, $TotalAmount, $ItemName, $ItemDesc): self
    {
        if (is_array($ItemName)) {
            $temp = '';
            foreach ($ItemName as $value) {
                $temp .= $value . '#';
            }
            $ItemName = $temp;
        }

        $this->MerchantOrderNo = $order_id;
        $this->TotalAmount = $TotalAmount;
        $this->ItemName = $ItemName;
        $this->ItemDesc = $ItemDesc;

        return $this;
    }

    public function submitOrder($need_form = true)
    {
        $url = $this->ProviderUrl . 'AioCheckOut/' . $this->Version;

        $data = $this->OrderFormatter();

        $data = array_merge($data, [
            'CheckMacValue' => $this->setCheckValue($data)
        ]);

        // 驗證欄位是否正確設置
        $this->OrderValidates($data);

        if ($need_form) {
            $result = $this->setOrderSubmitForm($url, $data);
            return $result;
        }

        return [
            'url' => $url,
            'data' => $data
        ];
    }

    public function setTimeStamp()
    {
        $this->TimeStamp = time();
    }

    function OrderFormatter(): array
    {
        return [
            'MerchantID' => $this->MerchantID,
            'MerchantTradeNo' => $this->MerchantOrderNo,
            'MerchantTradeDate' => date('Y/m/d H:i:s', $this->TimeStamp),
            'PaymentType' => $this->PaymentType,
            'TotalAmount' => $this->TotalAmount,
            'TradeDesc' => $this->ItemDesc,
            'ItemName' => $this->ItemName,
            'ReturnURL' => $this->ReturnURL,
            'ChoosePayment' => $this->PaymentMethod,
            'EncryptType' => EncryptType::ENC_SHA256
        ];
    }

    public function setCheckValue($arParameters): string
    {
        $sMacValue = '';

        if (isset($arParameters)) {
            unset($arParameters['CheckMacValue']);
            uksort($arParameters, array('self', 'merchantSort'));

            // 組合字串
            $sMacValue = 'HashKey=' . $this->HashKey;
            foreach ($arParameters as $key => $value) {
                $sMacValue .= '&' . $key . '=' . $value;
            }

            $sMacValue .= '&HashIV=' . $this->HashIV;

            // URL Encode編碼
            $sMacValue = urlencode($sMacValue);

            // 轉成小寫
            $sMacValue = strtolower($sMacValue);

            // 取代為與 dotNet 相符的字元
            $sMacValue = str_replace('%2d', '-', $sMacValue);
            $sMacValue = str_replace('%5f', '_', $sMacValue);
            $sMacValue = str_replace('%2e', '.', $sMacValue);
            $sMacValue = str_replace('%21', '!', $sMacValue);
            $sMacValue = str_replace('%2a', '*', $sMacValue);
            $sMacValue = str_replace('%28', '(', $sMacValue);
            $sMacValue = str_replace('%29', ')', $sMacValue);

            // 編碼
            switch ($arParameters['EncryptType']) {
                case EncryptType::ENC_SHA256:
                    // SHA256 編碼
                    $sMacValue = hash('sha256', $sMacValue);
                    break;

                case EncryptType::ENC_MD5:
                default:
                    // MD5 編碼
                    $sMacValue = md5($sMacValue);
            }
            $sMacValue = strtoupper($sMacValue);
        }

        return $sMacValue;
    }
}
