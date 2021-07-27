<?php

namespace Groupbwt\Request\Validator;

use Groupbwt\Model\Operation;
use Groupbwt\Exception\OperationTypeException;

class OperationTypeValidator implements ValidatorInterface
{
    function validate($data)
    {
        if (!in_array($data, Operation::$supportedOperationTypes)) {
            throw new OperationTypeException('Operation type is not supported');
        }
    }
}
