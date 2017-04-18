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
        //$city = DB::table('region')->where('superior_city','北京')->pluck('name');
        $region = DB::table('region2')->join('region', 'region2.region', '=', 'region.name')->where('region','朝阳')->pluck('name');
        return response()->json(['code' => 0, 'data' => ['北京'=>$region]]);

    }
}