<?php

namespace Groupbwt\Model;

class Operation 
{
    const USD = 'USD';
    const JPY = 'JPY';
    const EUR = 'EUR';

    public static $supportedCurrencies = [
        self::USD,
        self::JPY,
        self::EUR,
    ];

    const OPERATION_TYPE_WITHDRAW = 'withdraw';
    const OPERATION_TYPE_DEPOSIT = 'deposit';

    public static $supportedOperationTypes = [
        self::OPERATION_TYPE_WITHDRAW,
        self::OPERATION_TYPE_DEPOSIT,
    ];

    const USER_TYPE_PRIVATE = 'private';
    const USER_TYPE_BUSINESS = 'business';

    public static $supportedUserTypes = [
        self::USER_TYPE_PRIVATE,
        self::USER_TYPE_BUSINESS,
    ];

    public string $date;
    public int $uid;
    public string $utype;
    public string $otype;
    public string $oamount;
    public string $currency;

    public static function getSupportedCurrencies()
    {
        return self::$supportedCurrencies;
    }

    public static function getSupportedOperationTypes()
    {
        return self::$supportedOperationTypes;
    }

    public static function getSupportedUserTypes()
    {
        return self::$supportedUserTypes;
    }
}
