<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/18
 * Time: 11:00
 */

namespace App\Http\Controllers;


class getCity
{
    public function getCity(){
        $query = DB::table('region')->select('superior_city as city','name as region')->get();
        return $query;
    }
}