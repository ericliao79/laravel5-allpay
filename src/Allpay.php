<?php
namespace ericliao79\l5allpay;

use ReflectionClass;

class Allpay
{
    public static function create($Provider = '')
    {

        switch ($Provider) {
            case 'Opay':
                $Provider = Opay::class;
                break;
            case 'Pay2go':
                $Provider = Pay2go::class;
                break;
            default:
                throw new \Exception($Provider . "isn't supported");
        }


        $ref = new ReflectionClass($Provider);
        $inst = $ref->newInstanceArgs();

        return new $inst;
    }
}
