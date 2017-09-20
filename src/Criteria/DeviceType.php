<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/20
 * Time: 15:31
 */

namespace ericliao79\l5allpay\Criteria;


/**
 * 裝置
 */
abstract class DeviceType {
    /**
     * 桌機版付費頁面。
     */
    const PC = 'P';
    /**
     * 行動裝置版付費頁面。
     */
    const Mobile = 'M';
}
