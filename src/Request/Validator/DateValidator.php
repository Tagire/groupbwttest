<?php

namespace Groupbwt\Request\Validator;

use Groupbwt\Exception\DateException;

class DateValidator implements ValidatorInterface
{
    private const FORMAT = 'Y-m-d';

    function validate($data)
    {
        $d = DateTime::createFromFormat(self::FORMAT, $date);
        if (!($d && $d->format($format) === $date)) {
            throw new DateException('Wrong date format');
        }
    }
}
