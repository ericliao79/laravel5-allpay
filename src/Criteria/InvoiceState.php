<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 15:44
 */

namespace ericliao79\l5allpay\Criteria;


/**
 * 電子發票開立註記。
 */
abstract class InvoiceState {
    /**
     * 需要開立電子發票。
     */
    const Yes = 'Y';
    /**
     * 不需要開立電子發票。
     */
    const No = '';
}
