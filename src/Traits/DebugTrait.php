<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/21
 * Time: 16:24
 */

namespace ericliao79\l5allpay\Traits;

trait DebugTrait
{
    protected $debug;

    function debug()
    {
        $this->debug = true;
    }
}
