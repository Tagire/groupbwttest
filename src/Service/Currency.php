<?php

namespace Groupbwt\Service;

use GuzzleHttp\Client;
use Groupbwt\Model\Operation;
use Groupbwt\Service\Api\ExchangeratesApiClient;

class Currency 
{
    public static function convert(string $from, string $to) 
    {
        /**
        $client = new Client();
        $res = $client->request('GET', 'https://api.github.com/user', [
                'auth' => ['user', 'pass']
                ]);
        echo $res->getStatusCode();
        // "200"
        echo $res->getHeader('content-type')[0];
        // 'application/json; charset=utf8'
        echo $res->getBody();
        // {"type":"User"...'
        */
        //TODO: change to service
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
}
