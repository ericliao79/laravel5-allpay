<?php

namespace ericliao79\l5allpay\Criteria;

/**
 * 通關方式
 */
abstract class ClearanceMark {
    // 經海關出口
    const Yes = '1';

    // 非經海關出口
    const No = '2';
}
