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
        $city = DB::table('region')->where('superior_city','北京')->pluck('name')->toArray();
        $region = DB::table('region2')->join('region','region.name','=','region2.region')
            ->select('region2.*');
        $list = array();
        foreach ($city as $item) {
            var_dump($item);
            $region2 = $region
                ->where('region',$item)
                ->pluck('name');
            $response = [$item => $region2];
            array_push($list,$response);
        }

        return response()->json(['code' => 0, 'data' => ['北京'=>$list]]);

    }
}