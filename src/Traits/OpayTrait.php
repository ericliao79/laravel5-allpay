<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/21
 * Time: 16:16
 */

namespace ericliao79\l5allpay\Traits;


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
}
