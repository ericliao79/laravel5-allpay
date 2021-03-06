<?php
namespace ericliao79\l5allpay\Validation;


trait OpayValidates
{
    use BaseValidates;

    function OrderValidates($data)
    {
        $required = [
            'MerchantID',
            'MerchantTradeNo',
            'MerchantTradeDate',
            'PaymentType',
            'TotalAmount',
            'TradeDesc',
            'ItemName',
            'ReturnURL',
            'ChoosePayment',
            'EncryptType',
            'CheckMacValue'
        ];

        $this->isValidOnNull($required, $data);

        $this->isValidUrl();

    }
}
