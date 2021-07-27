<?php

namespace Groupbwt\Request\Validator;

use Groupbwt\Model\Operation;
use Groupbwt\Exception\OperationCurrencyException;

class OperationCurrencyValidator implements ValidatorInterface
{
    function validate($data)
    {
        if (!Currency::isCurrencySupported($data)) {
            throw new OperationCurrencyException('Wrong currency format');
        }
    }
}
