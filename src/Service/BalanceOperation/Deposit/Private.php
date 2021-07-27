<?php

namespace Groupbwt\Service\BalanceOperation\Deposit;

class Private 
{
    const COMMISSION = 0.0003;

    public static function calculate($uid, $odate, $amount)
    {
        return $amount * self::COMMISSION;
    }
}
