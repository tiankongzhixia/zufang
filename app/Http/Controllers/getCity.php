<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/18
 * Time: 11:00
 */

namespace App\Http\Controllers;
use DB;

class getCity
{
    public function getCity(){
        $query = DB::table('region')->where('superior_city','北京')->pluck('name');

        return response()->json(['code' => 0, 'data' => ['北京'=>$query]]);

    }
}