<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/18
 * Time: 11:00
 */

namespace App\Http\Controllers;
use DB;
use Cache;
use Illuminate\Database\Eloquent\Model;

class getCity
{
    public function getCity(){
        if(Cache::has('city')){
            $rd = Cache::get('city');
        }else {
            $city = DB::table('region')->where('superior_city', '北京')->pluck('name')->toArray();
            $list = array();
            foreach ($city as $item) {
                $response = [$item => DB::table('region2')->join('region', 'region.name', '=', 'region2.region')
                    ->select('region2.*')
                    ->where('region', $item)
                    ->pluck('name')];
                array_push($list, $response);
            }
            $rd =$list;
            Cache::put('city', $rd, 10);
        }

        return response()->json(['code' => 0, 'data' => ['北京'=>$rd]]);

    }
}