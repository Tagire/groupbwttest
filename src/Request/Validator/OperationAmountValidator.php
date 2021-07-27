<?php

namespace Groupbwt\Request\Validator;

use Groupbwt\Exception\OperationAmountException;

class OperationAmountValidator implements ValidatorInterface
{
    function validate($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_FLOAT)) {
            throw new OperationAmountException('Wrong operation amount format');
        }
    }
}
