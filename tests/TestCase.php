<?php
namespace Tests;

class TestCase extends \Orchestra\Testbench\TestCase
{
    //

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('allpay.Debug', true);
        $app['config']->set('allpay.MerchantID', '2000132');
        $app['config']->set('allpay.HashKey', '2000132');
        $app['config']->set('allpay.HashIV', 'v77hoKGq4kWxNNIS');

        $app['config']->set('allpay.Version', 'V5');
        $app['config']->set('allpay.LangType', 'zh-tw');
        $app['config']->set('allpay.ExpireDays', 7);
        $app['config']->set('allpay.ReturnURL', 'http://allpay.dev/return/');
        $app['config']->set('allpay.NotifyURL', 'http://allpay.dev/callback/');
        $app['config']->set('allpay.ClientBackURL', 'http://allpay.dev/ClientBackUrl/');
        $app['config']->set('allpay.paymentMethod', 'ALL');

    }
}
