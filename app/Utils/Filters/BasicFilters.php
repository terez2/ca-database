<?php
/**
 * Created by PhpStorm.
 * User: Falcon
 * Date: 16.7.2016
 * Time: 12:08
 */

namespace App\Utils\Filters;


class BasicFilters {


    public static function common($filter, $value)
    {
        if (method_exists(__CLASS__, $filter)) {
            $args = func_get_args();
            array_shift($args);
            return call_user_func_array(array(__CLASS__, $filter), $args);
        }
    }


    public static function phone($value)
    {
        $number = str_replace( "+", "",$value);

        $formattedNumber = number_format($number, 0, "", " ");
        return "+{$formattedNumber}";
    }

    public static function areNumbers($value){
        return preg_match('/\d+/', $value);
    }


}

