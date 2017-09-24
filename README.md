# laravel5-allpay
[![CircleCI](https://circleci.com/gh/ericliao79/laravel5-allpay.svg?style=shield)](https://circleci.com/gh/ericliao79/laravel5-allpay)

Taiwan's Third-Party Payment SDK all-in-one for Laravel.

This package is not stable.

## Requirements

* PHP 7.1 or later
* Laravel: 5.5 or later

## examlp
[l5-allpay-example](https://github.com/ericliao79/l5-allpay-examlp)

## Installation
add to composer.json
```
"ericliao79/laravel5-allpay": "^0.0.1"
```
or
```
composer require ericliao79/laravel5-allpay
```

In config/app.php add providers
```
ericliao79\l5allpay\Providers\l5allpayServiceProvider::class
```

In .env add, you can register on
```
ALLPAY_DEBUG_MODE=false
ALLPAY_STORE_ID=xxxxx
ALLPAY_HASH_KEY=xxxxxxxxx
ALLPAY_HASH_IV=xxxxxxxxxxxx

### default return url
ALLPAY_ReturnUrl=/return
ALLPAY_NotifyURL=/callback
```

And publish config
```
php artisan vendor:publish
```

## ToDo
 - [ ] Opay
 - [ ] pay2go
