<?php

namespace Groupbwt\Request\Validator;

use Groupbwt\Model\Operation;
use Groupbwt\Exception\UserTypeException;

class UserTypeValidator implements ValidatorInterface
{
    function validate($data)
    {
        if (!in_array($data, Operation::$supportedUserTypes)) {
            throw new UserTypeException('User type is not supported');
        }
    }
}
