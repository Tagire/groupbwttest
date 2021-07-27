<?php

namespace Groupbwt/Service;

use Groupbwt/Model/Operation;
use Groupbwt/ServiceBalanceOperation/Withdraw/Private as WithdrawPrivate;
use Groupbwt/ServiceBalanceOperation/Withdraw/Business as WithdrawBusiness;
use Groupbwt/ServiceBalanceOperation/Deposit/Private as DepositPrivate;
use Groupbwt/ServiceBalanceOperation/Deposit/Business as DepositBusiness;

class OperationService
{
    public function makeFromCsv(array $csv)
    {
        $operation = new Operation();
        $operation->date = $csv[0];
        $operation->uid = $csv[1];
        $operation->utype = $csv[2];
        $operation->otype = $csv[3];
        $operation->oamount = $csv[4];
        $operation->currency = $csv[5];

        return $operation;
    }

    public function process(Operation $operation)
    {
        switch ($operation->otype) {
            case Operation::WITHDRAW:
                switch ($operation->utype) {
                    case User:PRIVATE:
                        return WithdrawPrivate::calculate($operation);
                        break;
                    case User:BUSINESS:
                        return WithdrawBusiness::calculate($operation);
                        break;
                    default:
                        throw new Exception(); 
                }
                break;
            case Operation::DEPOSIT:
                switch ($operation->utype) {
                    case User:PRIVATE:
                        return DepositPrivate::calculate($operation);
                        break;
                    case User:BUSINESS:
                        return DepositBusiness::calculate($operation);
                        break;
                    default:
                        throw new Exception(); 
                }
                break;
            default:
                throw new Exception();
        }
    }
}
