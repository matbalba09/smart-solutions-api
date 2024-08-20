<?php

namespace App\Helper;

use DateTimeZone;
use Illuminate\Support\Carbon;

class Helper
{
    public static function generateRandomString($length)
    {
        $alpha = "QWERTYUIOPASDFGHJKLZXCVBNM";
        $returnData = "";
        for ($i = 0; $i < $length; $i++) {
            $returnData .= $alpha[rand(0, strlen($alpha) - 1)];
        }
        return $returnData;
    }

    public static function generateRandomNumber($length)
    {
        $returnData = "";
        for ($i = 0; $i < $length; $i++) {
            $returnData .= rand(0, 9);
        }
        return $returnData;
    }

    public static function getDateNow()
    {
        return Carbon::now('+08:00')->format('Y-m-d H:i:s');
        // return Carbon::now()->addHours(7)->format('Y-m-d H:i:s');
    }

    public static function getDateNowIso()
    {
        return Carbon::now()->addHours(8)->toISOString();
        // return Carbon::now()->addHours(7)->format('Y-m-d H:i:s');
    }
}
