<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/21
 * Time: 16:16
 */

namespace ericliao79\l5allpay\Traits;


use ericliao79\l5allpay\Criteria\EncryptType;

trait OpayTrait
{
    protected $PaymentType = 'aio';


    /**
     * 自訂排序使用
     */
    protected static function merchantSort($a, $b)
    {
        return strcasecmp($a, $b);
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
