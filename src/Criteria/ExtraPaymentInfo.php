<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 15:29
 */

namespace ericliao79\l5allpay\Criteria;

/**
 * 額外付款資訊。
 */
abstract class ExtraPaymentInfo {
    /**
     * 需要額外付款資訊。
     */
    const Yes = 'Y';
    /**
     * 不需要額外付款資訊。
     */
    const No = 'N';
}
