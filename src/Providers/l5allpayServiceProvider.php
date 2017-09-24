<?php

namespace ericliao79\l5allpay\Providers;

use ericliao79\l5allpay\Opay;
use Illuminate\Support\ServiceProvider;

class l5allpayServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/allpay.php' => config_path('allpay.php')
        ], 'config');
    }

}
