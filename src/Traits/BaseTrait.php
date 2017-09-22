<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 2017/9/22
 * Time: 12:07
 */

namespace ericliao79\l5allpay\Traits;


trait BaseTrait
{
    /**
     * 設置訂單新增的表單
     *
     * @param $url
     * @param $data
     * @return string
     */
     function setOrderSubmitForm($url, $data)
    {
        $result = '<form name="allpay" id="order_form" method="post" action=' . $url . '>';
        foreach ($data as $key => $value) {
            $result .= '<input type="hidden" name="' . $key . '" value="' . $value . '">';
        }
        $result .= '</form><script type="text/javascript">document.getElementById(\'order_form\').submit();</script>';
        return $result;
    }
}
