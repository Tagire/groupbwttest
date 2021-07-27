<?php

namespace Groupbwt\Service\BalanceOperation\Withdraw;

use Groupbwt\Repository\CommissionRepository;
use Groupbwt\Service\Currency;
use Groupbwt\Model\Operation;

class Private
{
    const COMMISSION = 0.005;
    const FREE_AMOUNT = 1000;
    const FREE_CALCULATION_CURRENCY = Operation::EUR;

    public static function calculate($operation)
    {
        $amountInEur = convertCurrency($currency, $oamount, FREE_CALCULATION_CURRENCY);
        if ((!empty($weeklyUserSum[$uid][$week]) && $weeklyUserSum[$uid][$week] > 1000)) { 
            $commissionFee = convertCurrency('EUR', $oamount * 0.003, $currency);
        } else if ((!empty($weeklyUserSum[$uid][$week]) && $weeklyUserSum[$uid][$week] + $amountInEur > 1000) || $amountInEur > 1000) {
            @$weeklyUserSum[$uid][$week] += $amountInEur;
            $commissionFee = convertCurrency('EUR', ($weeklyUserSum[$uid][$week] - 1000) * 0.003, $currency);
        } else {
            @$weeklyUserSum[$uid][$week] += $amountInEur;
        }

        return $amount * self::COMMISSION;
    }
}
