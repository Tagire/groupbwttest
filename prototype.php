<?php

$csv = array_map('str_getcsv', file('input.csv'));

function convertCurrency($from, $fromAmount, $to) {
    if ($from == $to) {
        return $fromAmount;
    }
    $rates = [
        'EUR' => 
            [
                'JPY' => 129.53,
                'USD' => 1.1497,
            ]
    ];

    if (!empty($rates[$from])) {
        return $rates[$from][$to] * $fromAmount;
    } else if (!empty($rates[$to])) {
        return $fromAmount * (1 / $rates[$to][$from]);
    }
}

function getFirstDayOfWeek($dateString) {
    $date = DateTime::createFromFormat('Y-m-d', $dateString);
    $date->modify('Last Monday');
    return $date->format('Y-m-d');
}

foreach ($csv as $arr) {
    $operationDate = $arr[0];
    $uid = $arr[1];
    $utype = $arr[2];
    $otype = $arr[3];
    $oamount = $arr[4];
    $currency = $arr[5];
    $usersOperations = [];
    
    $commissionFee = 0;
    switch ($otype) {
        case "deposit":
            $commissionFee = $oamount * 0.0003;
            break;
        case "withdraw":
            if ($utype == 'private') {
                $week = getFirstDayOfWeek($operationDate);
                @$weeklyUserOperations[$uid][$week] += 1;
                if ($weeklyUserOperations[$uid][$week] < 3) {
                    @$weeklyUserSum[$uid][$week] += convertCurrency($currency, $oamount, 'EUR');
                    if ($weeklyUserSum[$uid][$week] > 1000) {
                        $commissionFee = convertCurrency('EUR', $oamount * 0.003, $currency);
                    } else {
                        $commissionFee = 0; //just for visualisation
                    }
                } else {
                    $commissionFee = $oamount * 0.003;
                }
            } else if ($utype == 'business') {
                $commissionFee = $oamount * 0.005;
            }
         default:
            break;
    }
    echo $commissionFee . "\n";
}
print_r($weeklyUserSum);
print_r($weeklyUserOperations);

