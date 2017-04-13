<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/11
 * Time: 16:41
 */

namespace App\Http\Controllers;


class calibrationCookie
{
    public function calibrationCookie()
    {

        if (!empty($_COOKIE['time'])) {
            $time = $_COOKIE['time'];
            if ($time=="wow") {
//            $time = $time*72.92;
//            if (time() - $time < 120) {
                return true;
            }
//            }
        }
//        return false;
    }
}