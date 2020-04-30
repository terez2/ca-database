<?php

namespace App\Utils\Filters;


class BasicFilters {

    public static function areNumbers($value){
        return preg_match('/\d+/', $value);
    }

}

