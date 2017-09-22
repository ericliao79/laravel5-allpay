<?php
namespace ericliao79\l5allpay\Validation;


use ericliao79\l5allpay\Exceptions\TradeException;

trait BaseValidates
{
    function isValidOnNull($required, $data)
    {
        foreach ($required as $field)
            if ($data[$field] === null)
                throw new TradeException($field . ' is null.');
    }
}
