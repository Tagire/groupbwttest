<?php

namespace Groupbwt\Request\Validator;

use Groupbwt\Model\Operation;
use Groupbwt\Exception\UidException;

class UidValidator implements ValidatorInterface
{
    function validate($data)
    {
        if (!filter_var($data, FILTER_VALIDATE_INT)) {
            throw new UidException('Wrong user id type');
        }
    }
}
