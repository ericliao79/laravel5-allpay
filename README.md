# laravel5-allpay
[![Latest Stable Version](https://poser.pugx.org/ericliao79/laravel5-allpay/v/stable)](https://packagist.org/packages/ericliao79/laravel5-allpay)
[![Build Status](https://travis-ci.org/ericliao79/laravel5-allpay.svg?branch=master)](https://travis-ci.org/ericliao79/laravel5-allpay)
[![CircleCI](https://circleci.com/gh/ericliao79/laravel5-allpay.svg?style=shield)](https://circleci.com/gh/ericliao79/laravel5-allpay)
[![Coverage Status](https://coveralls.io/repos/github/ericliao79/laravel5-allpay/badge.svg?branch=master)](https://coveralls.io/github/ericliao79/laravel5-allpay?branch=master)
[![License](https://poser.pugx.org/ericliao79/laravel5-allpay/license)](https://packagist.org/packages/ericliao79/laravel5-allpay)

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
