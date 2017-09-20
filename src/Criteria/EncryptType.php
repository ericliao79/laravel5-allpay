<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 15:27
 */

namespace ericliao79\l5allpay\Criteria;


abstract class EncryptType {
    // MD5(預設)
    const ENC_MD5 = 0;

    // SHA256
    const ENC_SHA256 = 1;
}
