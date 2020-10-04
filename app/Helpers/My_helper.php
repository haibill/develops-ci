<?php

function formatCode($code, $number, $central = 'striped')
{
    if ($central == 'striped') {
        $operator = '-';
    } elseif ($central == 'underscores') {
        $operator = '_';
    } elseif ($central == 'spaces') {
        $operator = ' ';
    }
    $amount = strlen($number);
    switch ($amount) {
        case 1:
            return $code . $operator . '000' . $number;
            break;
        case 2:
            return $code . $operator . '00' . $number;
            break;
        case 3:
            return $code . $operator . '0' . $number;
            break;
        default:
            return $number;
            break;
    }
}
