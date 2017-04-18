<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/18
 * Time: 11:00
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
class getCity
{
    public function getCity(){
        $query = DB::table('region')->select('name as region')
           ->where('superior_city','北京')->get();
        return Response::json(['code' => 0, 'data' => ['info' => $query]]);

    }
}