<?php

namespace Groupbwt\Service\BalanceOperation\Withdraw;

class Business
{
    const COMMISSION = 0.005;

    public static function calculate($uid, $odate, $amount)
    {
        return $amount * self::COMMISSION;
    }
}
