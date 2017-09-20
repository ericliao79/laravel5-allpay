<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 13:58
 */

namespace ericliao79\l5allpay\Criteria;

/**
 * 付款方式。
 */
abstract class PaymentMethod {
    /**
     * 不指定付款方式。
     */
    const ALL = 'ALL';
    /**
     * 信用卡付費。
     */
    const Credit = 'Credit';
    /**
     * 網路 ATM。
     */
    const WebATM = 'WebATM';
    /**
     * 自動櫃員機。
     */
    const ATM = 'ATM';
    /**
     * 超商代碼。
     */
    const CVS = 'CVS';
    /**
     * 財付通。
     */
    const Tenpay = 'Tenpay';
    /**
     * 儲值消費。
     */
    const TopUpUsed = 'TopUpUsed';
}
