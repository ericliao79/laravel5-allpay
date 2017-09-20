<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 15:43
 */

namespace ericliao79\l5allpay\Criteria;

/**
 * 定期定額的週期種類。
 */
abstract class PeriodType {
    /**
     * 無
     */
    const None = '';
    /**
     * 年
     */
    const Year = 'Y';
    /**
     * 月
     */
    const Month = 'M';
    /**
     * 日
     */
    const Day = 'D';
}
