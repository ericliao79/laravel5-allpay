<?php
namespace ericliao79\l5allpay\Validation;


use ericliao79\l5allpay\Exceptions\TradeException;
use ericliao79\l5allpay\Exceptions\UrlException;

trait BaseValidates
{
    function isValidOnNull($required, $data)
    {
        foreach ($required as $field)
            if ($data[$field] === null)
                throw new TradeException($field . ' is null.');
    }

    function isValidUrl()
    {
        if ($this->ProviderUrl === null)
            throw new UrlException('ProviderUrl is null.');

        if ($this->NotifyURL === null)
            throw new UrlException('NotifyURL is null.');

        $field = [
            $this->ProviderUrl,
            $this->ReturnURL,
            $this->CustomerURL,
            $this->NotifyURL,
        ];

        foreach ($field as $value) {
            if ($value != null )
                if (!(strpos($value, "http://") !== false or strpos($value, "https://") !== false))
                    throw new TradeException($value . ' must contain http or https port.');
        }
    }
}
